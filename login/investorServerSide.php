<?php
class Investors {
    public function index() {
        // Define columns for the investors table
        include('../db_connection.php');
        $columns = array(
            0 => 'investor_id',
            1 => 'first_name',
            2 => 'email',
            3 => 'contact_number',
            4 => 'status',
            5 => 'AcceptTermsNCondtion',
            6 => 'city',
            7 => 'know_about_us',
            8 => 'pincode',
            9 => 'last_name',
            10 => 'state',
        );
    
        // Get total records for the investors table
        $totalData = $conn->query("SELECT COUNT(investor_id) as records_total FROM investors")->fetch_assoc();
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
            $searchQuery = " AND (first_name LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR contact_number LIKE '%$searchValue%')";
        }
    
        // Fetch records from the investors table
        $sql = "SELECT investor_id, first_name, email, contact_number, status, AcceptTermsNCondtion, city, know_about_us, pincode, last_name, state FROM investors WHERE 1 $searchQuery ORDER BY $columnName $order" . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['investor_id'] = $row['investor_id'];
            $subdata['name'] = $row['first_name'] . ($row['last_name'] ? ' ' . $row['last_name'] : '');
            $subdata['email'] = $row['email'];
            $subdata['contact_number'] = $row['contact_number'];
            $subdata['status'] = $row['status'];
            $subdata['AcceptTermsNCondtion'] = $row['AcceptTermsNCondtion'];
            $subdata['city'] = $row['city'];
            $subdata['know_about_us'] = $row['know_about_us'];
            $subdata['pincode'] = $row['pincode'];
            $subdata['state'] = $row['state'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(' . $row['investor_id'] . ', \'edit\',)" data-id="' . $row['investor_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm deleteBtn" onclick="deleteInvestor('. $row['investor_id'] . ')" data-id="' . $row['investor_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(investor_id) as records_filtered FROM investors WHERE 1 $searchQuery";
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
    public function insertInvestor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
            $last_name = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
            $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $investor_AcceptTermsNCondtion = isset($_POST['investor_AcceptTermsNCondtion']) ? trim($_POST['investor_AcceptTermsNCondtion']) : '';
            $investor_know_about_us = isset($_POST['investor_know_about_us']) ? trim($_POST['investor_know_about_us']) : '';
            $status = isset($_POST['investor_is_active']) ? trim($_POST['investor_is_active']) : '';
    
            include('../db_connection.php');
    
            // Assuming your table structure, adjust the column names accordingly
            $sql = "INSERT INTO investors (first_name, last_name, email, contact_number, pincode, state, city, AcceptTermsNCondtion, know_about_us, status)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssssss', $first_name, $last_name, $email, $contact, $pincode, $state, $city, $investor_AcceptTermsNCondtion, $investor_know_about_us, $status);
    
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Investor added successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to add Investor'));
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
            $stmt = $conn->prepare("SELECT * FROM investors  WHERE investor_id = ?");
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
    public function updateInvestor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $investor_id = isset($_POST['investor_id']) ? intval($_POST['investor_id']) : 0;
            $first_name = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
            $last_name = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
            $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $investor_AcceptTermsNCondtion = isset($_POST['investor_AcceptTermsNCondtion']) ? trim($_POST['investor_AcceptTermsNCondtion']) : '';
            $investor_know_about_us = isset($_POST['investor_know_about_us']) ? trim($_POST['investor_know_about_us']) : '';
            $status = isset($_POST['investor_is_active']) ? trim($_POST['investor_is_active']) : '';

            if ($investor_id > 0) {
                include('../db_connection.php');
    
                $sql = "UPDATE investors SET
                        first_name = ?,
                        last_name = ?,
                        email = ?,
                        contact_number = ?,
                        status = ?,  -- Assuming status is one of the columns
                        AcceptTermsNCondtion = ?,  -- Assuming AcceptTermsNCondtion is one of the columns
                        city = ?,
                        know_about_us = ?,  -- Assuming know_about_us is one of the columns
                        pincode = ?,  -- Assuming pincode is one of the columns
                        state = ?
                        WHERE investor_id = ?";
    
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssssssi', $first_name, $last_name, $email, $contact, $status, $investor_AcceptTermsNCondtion, $city, $investor_know_about_us, $pincode, $state, $investor_id);
    
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Investor updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Investor'));
                }
    
                $stmt->close();
                $conn->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Invalid investor_id'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    public function deleteInvestor() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Check if the faq_id key exists in the $_POST array
            if (isset($_GET['investor_id'])) {
                $investor_id = intval($_GET['investor_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM investors WHERE investor_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $investor_id);
    
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
                echo json_encode(array('success' => false, 'message' => 'investor_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    // Add more functions as needed
}

$investorInstance = new Investors();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $investorInstance->index();
    exit;
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $investorInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $investorInstance->insertInvestor();
    exit; 
}
elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $investorInstance->updateInvestor();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $investorInstance->deleteInvestor();
    exit; 
}
?>
