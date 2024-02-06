<?php


class TeamServerSide {
    
    public function index() {
        // Include database connection
        include('../db_connection.php');
    
        // Define columns
        $columns = array(
            'member_id',
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'designation',
            'description',
            'member_image',
            'gender',
        );
    
        // Get total records
        $totalData = $conn->query("SELECT COUNT(member_id) as records_total FROM members")->fetch_assoc();
        $totalFiltered = $totalData['records_total'];
    
        // Set limit and offset for server-side pagination
        $start = isset($_POST['start']) ? $_POST['start'] : 0;
        $length = isset($_POST["length"]) ? $_POST["length"] : 10;
    
        // Set order parameters
        $columnIndex = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 1;
        $columnName = $columns[$columnIndex];
        $order = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'ASC';
    
        // Set search parameters
        $searchValue = $_POST['search']['value'];
        $searchQuery = '';
    
        if (!empty($searchValue)) {
            $searchConditions = array();
            foreach ($columns as $column) {
                $searchConditions[] = "$column LIKE '%$searchValue%'";
            }
            $searchQuery = " AND (" . implode(' OR ', $searchConditions) . ")";
        }
    
        // Fetch records
        $sql = "SELECT " . implode(', ', $columns) . " FROM members WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            foreach ($columns as $column) {
                if ($column == 'member_image') {
                    $subdata[$column] = '<img src="' .'../'.$row[$column]. '" alt="Member Image " class="img-thumbnail rounded-circle" style="width:50px;height:50px;">';
                } else {
                    $subdata[$column] = $row[$column];
                }
            }
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditTeamModal(' . $row['member_id'] . ', \'edit\', )" data-id="' . $row['member_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm deleteBtn" onclick="deleteTeamMember('. $row['member_id'] . ')"  data-id="' . $row['member_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(member_id) as records_filtered FROM members WHERE 1 $searchQuery";
        $result = $conn->query($sql);
        $totalFiltered = $result->fetch_assoc()['records_filtered'];
    
        $json_data = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => intval($totalData['records_total']),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
    
        echo json_encode($json_data);
    
        // Close the database connection
        $conn->close();
    }
    

    public function addTeamMember() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
    
            $memberFirstName = isset($_POST['memberFirstName']) ? trim($_POST['memberFirstName']) : '';
            $memberMiddleName = isset($_POST['memberMiddleName']) ? trim($_POST['memberMiddleName']) : '';
            $memberLastName = isset($_POST['memberLastName']) ? trim($_POST['memberLastName']) : '';
            $memberEmail = isset($_POST['memberEmail']) ? trim($_POST['memberEmail']) : '';
            $memberDesignation = isset($_POST['memberDesignation']) ? trim($_POST['memberDesignation']) : '';
            $memberGender = isset($_POST['memberGender']) ? trim($_POST['memberGender']) : '';
            $memberIntrodunction = isset($_POST['memberIntrodunction']) ? trim($_POST['memberIntrodunction']) : '';
            $memberImage = isset($_FILES['memberImage']) ? $_FILES['memberImage'] : null;
    
            // Check if the file is uploaded successfully
            if ($memberImage && $memberImage['error'] === UPLOAD_ERR_OK) {
                $uploadDirectory = 'uploads/members/';
                $uploadDirectoryStorage = '../uploads/members/';
                $allowedFileTypes = array('jpg', 'jpeg', 'png');
    
                $uploadedFile = $uploadDirectoryStorage . basename($memberImage['name']);
                $uploadedFileLocationInDb = $uploadDirectory . basename($memberImage['name']);
                $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
                // Check if the file type is allowed
                if (in_array($fileType, $allowedFileTypes)) {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($memberImage['tmp_name'], $uploadedFile)) {
                        $createdAt = date('Y-m-d H:i:s');
    
                        // Insert member into the database with image
                        $sql = "INSERT INTO members (first_name, middle_name, last_name, email, designation, description, gender, member_image, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('sssssssss', $memberFirstName, $memberMiddleName, $memberLastName, $memberEmail, $memberDesignation, $memberIntrodunction, $memberGender, $uploadedFileLocationInDb, $createdAt);
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'Failed to move the uploaded file'));
                        $conn->close();
                        return;
                    }
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Invalid file type. Only jpg, jpeg, and png files are allowed.'));
                    $conn->close();
                    return;
                }
            } else {
                // Insert member into the database without image
                $sql = "INSERT INTO members (first_name, middle_name, last_name, email, designation, description, gender, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssss', $memberFirstName, $memberMiddleName, $memberLastName, $memberEmail, $memberDesignation, $memberIntrodunction, $memberGender, $createdAt);
            }
    
            $createdAt = date('Y-m-d H:i:s');
    
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Team member added successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to add team member to the database'));
            }
    
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function getSignleRecord() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include('../db_connection.php');
            $stmt = $conn->prepare("SELECT * FROM members WHERE member_id = ?");
            $stmt->bind_param('i', $id); // Assuming id is an integer, adjust accordingly
            $stmt->execute();
            $result = $stmt->get_result();
            $record = $result->fetch_assoc();
            // Now you can use the $record variable to send back the data as a response
            echo json_encode(array('success' => true, 'success_code' => 200, 'data' => $record));
    
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(array('error' => 'No id provided'));
        }
    }

    public function updateTeamMember() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            $member_id = isset($_POST['memberId']) ? $_POST['memberId'] : '';
            $sql_select = "SELECT * FROM members WHERE member_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $member_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
    
                // Check if a new file is uploaded
                if (isset($_FILES['memberImage']) && $_FILES['memberImage']['error'] === UPLOAD_ERR_OK) {
                    $prefixLoc = '../';
                    $previousFilePath = $prefixLoc . $row['member_image'];
                    if (file_exists($previousFilePath) && $prefixLoc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
    
                    $uploadDirectory = 'uploads/members/';
                    $uploadDirectoryStorage = '../uploads/members/';
                    $allowedFileTypes = array('jpg', 'jpeg', 'png');
                    $uploadedFile = $uploadDirectoryStorage . basename($_FILES['memberImage']['name']);
                    $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['memberImage']['name']);
                    $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
                    if (in_array($fileType, $allowedFileTypes)) {
                        $newFileStoragePath = $uploadDirectoryStorage . basename($_FILES['memberImage']['name']);
                        move_uploaded_file($_FILES['memberImage']['tmp_name'], $newFileStoragePath);
                    }
    
                    // Update member with new file and payload data
                    $sql_update = "UPDATE members SET first_name = ?, middle_name = ?, last_name = ?, email = ?, designation = ?, member_image = ?, description = ? WHERE member_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('sssssssi', $_POST['memberFirstName'], $_POST['memberMiddleName'], $_POST['memberLastEmail'], $_POST['memberEmail'], $_POST['memberDesignation'], $uploadedFileLocationInDb, $_POST['memberIntrodunction'], $member_id);
                } else {
                    // Update member without changing the file, only update payload data
                    $sql_update = "UPDATE members SET first_name = ?, middle_name = ?, last_name = ?, email = ?, designation = ?, description = ? WHERE member_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('ssssssi', $_POST['memberFirstName'], $_POST['memberMiddleName'], $_POST['memberLastEmail'], $_POST['memberEmail'], $_POST['memberDesignation'], $_POST['memberIntrodunction'], $member_id);
                }
    
                if ($stmt_update->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Member updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Member'));
                }
    
                $stmt_update->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Member not found'));
            }
    
            $stmt_select->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
    public function deleteTeamMember() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['member_id'])) {
                $member_id = intval($_GET['member_id']);
                include('../db_connection.php');
    
                // Step 1: Retrieve data of the bank partner with the specified member_id
                $sql_select = "SELECT * FROM members WHERE member_id = ?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param('i', $member_id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Step 2: Delete the associated image file if it exists
                    $prefixLoc = '../';
                    $previousFilePath = '../' . $row['member_image'];
                    if (file_exists($previousFilePath) && $prefixLoc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
    
                    // Step 3: Delete the bank partner entry
                    $sql_delete = "DELETE FROM members WHERE member_id = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param('i', $member_id);
    
                    if ($stmt_delete->execute()) {
                        echo json_encode(array('success' => true, 'message' => 'Bank Partner deleted successfully'));
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'Failed to delete Bank Partner'));
                    }
    
                    $stmt_delete->close();
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Bank Partner not found'));
                }
    
                // Close the database connection
                $stmt_select->close();
                $conn->close();
            } else {
                // Handle the case where bank_id is not set
                echo json_encode(array('success' => false, 'message' => 'bank_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
}

$TeamServerInstance = new TeamServerSide();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $TeamServerInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $TeamServerInstance->addTeamMember();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $TeamServerInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $TeamServerInstance->updateTeamMember();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $TeamServerInstance->deleteTeamMember();
    exit; 
}

?>
