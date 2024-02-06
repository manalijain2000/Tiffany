<?php


class ComplaintClients {
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'complaint_id',
            1 => 'name',
            2 => 'email',
            3 => 'phone_number',
            4 => 'loan_acc_number',
            5 => 'state',
            6 => 'city',
            7 => 'message',
            8 => 'created_at',
            9 => 'status',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(complaint_id) as records_total FROM complaints")->fetch_assoc();
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
            $searchQuery = " AND (name LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR phone_number LIKE '%$searchValue%' OR loan_acc_number LIKE '%$searchValue%')";
        }

        // Fetch records
        $sql = "SELECT complaint_id, name, email, phone_number, loan_acc_number, state, city, message, status FROM complaints WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['complaint_id'] = $row['complaint_id'];
            $subdata['name'] = $row['name'];
            $subdata['email'] = $row['email'];
            $subdata['phone_number'] = $row['phone_number'];
            $subdata['loan_acc_number'] = $row['loan_acc_number'];
            $subdata['state'] = $row['state'];
            $subdata['city'] = $row['city'];
            $subdata['message'] = $row['message'];
            $subdata['status'] = $row['status'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(\'edit\', ' . $row['complaint_id'] . ')" data-id="' . $row['complaint_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteComplaint('. $row['complaint_id'] . ')"  data-id="' . $row['complaint_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }

        // Get total filtered records
        $sql = "SELECT COUNT(complaint_id) as records_filtered FROM complaints WHERE 1 $searchQuery";
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

    public function getSignleRecord() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include('../db_connection.php');
            $stmt = $conn->prepare("SELECT * FROM complaints  WHERE complaint_id = ?");
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

    public function updateComplaint() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $complaint_id = isset($_POST['complaint_id']) ? intval($_POST['complaint_id']) : 0;
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
            if ($complaint_id > 0) {
                include('../db_connection.php');
    
                // Assuming your status field is a VARCHAR(50) in the database
                $sql = "UPDATE complaints SET
                        name = ?,
                        email = ?,
                        phone_number = ?,
                        loan_acc_number = ?,
                        state = ?,
                        city = ?,
                        status = ?,
                        message = ?
                        WHERE complaint_id = ?";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssssi', $name, $email, $phone_number, $loan_acc_number, $state, $city, $status, $message, $complaint_id);
                
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Complaint updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Complaint'));
                }
                
                $stmt->close();
                $conn->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Invalid complaint_id'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function deleteComplaint() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Check if the faq_id key exists in the $_POST array
            if (isset($_GET['complaint_id'])) {
                $complaint_id = intval($_GET['complaint_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM complaints WHERE complaint_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $complaint_id);
    
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'success_code' => 200, 'message' => 'FAQ deleted successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to delete FAQ'));
                }
    
                // Close the database connection
                $stmt->close();
                $conn->close();
            } else {
                // Handle the case where faq_id is not set
                echo json_encode(array('success' => false, 'message' => 'complaint_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
    // Add more functions as needed
}

$complaintInstance = new ComplaintClients();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $complaintInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $complaintInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $complaintInstance->updateComplaint();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $complaintInstance->deleteComplaint();
    exit; 
}

?>
