<?php


class BankPartners {
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'bank_id',
            1 => 'bank_name',
            2 => 'bank_image',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(bank_id) as records_total FROM bank_partners")->fetch_assoc();
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
            // Adjust the search conditions based on your column names
            $searchQuery = " AND (bank_name LIKE '%$searchValue%')";
        }

        // Fetch records
        $sql = "SELECT bank_id, bank_name, bank_image FROM bank_partners WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['bank_id'] = $row['bank_id'];
            $subdata['bank_name'] = $row['bank_name'];
            $subdata['bank_image'] = '<img src="' .'../'.$row['bank_image']. '" alt="Bank Image" class="img-thumbnail" style="width:50px;height:50px;">';
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(\'edit\', ' . $row['bank_id'] . ')" data-id="' . $row['bank_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteBankPartner('. $row['bank_id'] . ')"  data-id="' . $row['bank_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }

        // Get total filtered records
        $sql = "SELECT COUNT(bank_id) as records_filtered FROM bank_partners WHERE 1 $searchQuery";
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

    public function addBankPartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            $bank_name = isset($_POST['bank_name']) ? trim($_POST['bank_name']) : '';
            if (isset($_FILES['bank_image']) && $_FILES['bank_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDirectory = 'uploads/bankPartner/';
                $uploadDirectoryStorage = '../uploads/bankPartner/';
                $allowedFileTypes = array('jpg', 'jpeg', 'png');
                $uploadedFile = $uploadDirectoryStorage . basename($_FILES['bank_image']['name']);
                $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['bank_image']['name']);
                $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
                if (in_array($fileType, $allowedFileTypes)) {
                    if (move_uploaded_file($_FILES['bank_image']['tmp_name'], $uploadedFile)) {
                        $created_at = date('Y-m-d H:i:s');
                        $sql = "INSERT INTO bank_partners (bank_name, bank_image, created_at) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('sss', $bank_name, $uploadedFileLocationInDb, $created_at);

                        if ($stmt->execute()) {
                            echo json_encode(array('success' => true, 'message' => 'Bank partner added successfully'));
                        } else {
                            echo json_encode(array('success' => false, 'message' => 'Failed to add bank partner to the database'));
                        }
                        $stmt->close();
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'Failed to move the uploaded file'));
                    }
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Invalid file type. Only jpg, jpeg, and png files are allowed.'));
                }
            }  else {
                echo json_encode(array('success' => false, 'message' => 'Invalid file upload'));
            }
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function getSignleRecord() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include('../db_connection.php');
            $stmt = $conn->prepare("SELECT * FROM bank_partners WHERE bank_id = ?");
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

    public function updateBankPartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            $bank_id = isset($_POST['bank_id']) ? $_POST['bank_id'] : '';
            $sql_select = "SELECT * FROM bank_partners WHERE bank_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $bank_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (isset($_FILES['bank_image']) && $_FILES['bank_image']['error'] === UPLOAD_ERR_OK) {
                    $previousFilePath = '../' . $row['bank_image'];
                    if (file_exists($previousFilePath)) {
                        unlink($previousFilePath);
                    }
                    $uploadDirectory = 'uploads/bankPartner/';
                    $uploadDirectoryStorage = '../uploads/bankPartner/';
                    $allowedFileTypes = array('jpg', 'jpeg', 'png');
                    $uploadedFile = $uploadDirectoryStorage . basename($_FILES['bank_image']['name']);
                    $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['bank_image']['name']);
                    $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
                    if (in_array($fileType, $allowedFileTypes)) {
                        $newFileStoragePath = $uploadDirectoryStorage . basename($_FILES['bank_image']['name']);
                        move_uploaded_file($_FILES['bank_image']['tmp_name'], $newFileStoragePath);
                    }

                    $sql_update = "UPDATE bank_partners SET bank_name = ?, bank_image = ? WHERE bank_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('ssi', $_POST['bank_name'], $uploadedFileLocationInDb, $bank_id);
                } else {
                    $sql_update = "UPDATE bank_partners SET bank_name = ? WHERE bank_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('si', $_POST['bank_name'], $bank_id);
                }

                if ($stmt_update->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Bank Partner updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Bank Partner'));
                }

                $stmt_update->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Bank Partner not found'));
            }
            $stmt_select->close();
            $conn->close();    
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function deleteBankPartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['bank_id'])) {
                $bank_id = intval($_GET['bank_id']);
                include('../db_connection.php');
    
                // Step 1: Retrieve data of the bank partner with the specified bank_id
                $sql_select = "SELECT * FROM bank_partners WHERE bank_id = ?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param('i', $bank_id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Step 2: Delete the associated image file
                    $previousFilePath = '../' . $row['bank_image'];
                    if (file_exists($previousFilePath)) {
                        unlink($previousFilePath);
                    }
                    // Step 3: Delete the bank partner entry
                    $sql_delete = "DELETE FROM bank_partners WHERE bank_id = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param('i', $bank_id);
    
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

$BankPartnerInstance = new BankPartners();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $BankPartnerInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $BankPartnerInstance->addBankPartner();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $BankPartnerInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $BankPartnerInstance->updateBankPartner();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $BankPartnerInstance->deleteBankPartner();
    exit; 
}

?>
