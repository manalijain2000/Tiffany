<?php


class Contacts {
    
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'contact_id',
            1 => 'name',
            2 => 'email',
            3 => 'phone_number',
            4 => 'loan_acc_number',
            5 => 'state',
            6 => 'city',
            7 => 'message',
            8 => 'created_at',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(contact_id) as records_total FROM contacts")->fetch_assoc();
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
        $sql = "SELECT contact_id, name, email, phone_number, loan_acc_number, state, city, message, created_at FROM contacts WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['contact_id'] = $row['contact_id'];
            $subdata['name'] = $row['name'];
            $subdata['email'] = $row['email'];
            $subdata['phone_number'] = $row['phone_number'];
            $subdata['loan_acc_number'] = $row['loan_acc_number'];
            $subdata['state'] = $row['state'];
            $subdata['city'] = $row['city'];
            $subdata['message'] = $row['message'];
            $subdata['created_at'] = $row['created_at'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(' . $row['contact_id'] . ', \'edit\',)" data-id="' . $row['contact_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteContact('. $row['contact_id'] . ')"  data-id="' . $row['contact_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(contact_id) as records_filtered FROM contacts WHERE 1 $searchQuery";
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
    
    function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
            include('../db_connection.php');
    
            $sql = "INSERT INTO contacts (name, email, phone_number, loan_acc_number, state, city, message, created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssss', $name, $email, $phone_number, $loan_acc_number, $state, $city, $message);
    
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Feedback inserted successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to insert Feedback'));
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
            $stmt = $conn->prepare("SELECT * FROM contacts  WHERE contact_id = ?");
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

    public function updateContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_id = isset($_POST['contact_id']) ? intval($_POST['contact_id']) : 0;
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : ''; // Fix variable name
    
            if ($contact_id > 0) {
                include('../db_connection.php');
    
                // Assuming your status field is a VARCHAR(50) in the database
                $sql = "UPDATE contacts SET
                        name = ?,
                        email = ?,
                        phone_number = ?,
                        loan_acc_number = ?,
                        state = ?,
                        city = ?,
                        message = ?
                        WHERE contact_id = ?";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssssssi', $name, $email, $phone_number, $loan_acc_number, $state, $city, $message, $contact_id); // Fix variable order
                
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Feedback updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Feedback'));
                }
    
                $stmt->close();
                $conn->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Invalid contact_id'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    

    public function deleteContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Check if the faq_id key exists in the $_POST array
            if (isset($_GET['contact_id'])) {
                $contact_id = intval($_GET['contact_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM contacts WHERE contact_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $contact_id);
    
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'success_code' => 200, 'message' => 'Feedback deleted successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to delete FAQ'));
                }
    
                // Close the database connection
                $stmt->close();
                $conn->close();
            } else {
                // Handle the case where faq_id is not set
                echo json_encode(array('success' => false, 'message' => 'contact_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
    // Add more functions as needed
}

$contactInstance = new Contacts();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $contactInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $contactInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $contactInstance->addContact();
    exit; 
}
elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $contactInstance->updateContact();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $contactInstance->deleteContact();
    exit; 
}

?>
