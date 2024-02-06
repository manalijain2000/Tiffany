<?php


class Transactions {
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'transaction_id',
            1 => 'upi_transaction_id',
            2 => 'customer_name',
            3 => 'contact_number',
            4 => 'loan_account_number',
            5 => 'amount',
            6 => 'status',
            7 => 'created_at',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(transaction_id) as records_total FROM applicant_transactions")->fetch_assoc();
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
            $searchQuery = " AND (upi_transaction_id LIKE '%$searchValue%' OR customer_name LIKE '%$searchValue%' OR contact_number LIKE '%$searchValue%' OR loan_account_number LIKE '%$searchValue%' OR amount LIKE '%$searchValue%' OR status LIKE '%$searchValue%')";
        }
    
        // Fetch records
        $sql = "SELECT transaction_id, upi_transaction_id, customer_name, contact_number, loan_account_number, amount, status, created_at FROM applicant_transactions WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['transaction_id'] = $row['transaction_id'];
            $subdata['upi_transaction_id'] = $row['upi_transaction_id'];
            $subdata['customer_name'] = $row['customer_name'];
            $subdata['contact_number'] = $row['contact_number'];
            $subdata['loan_account_number'] = $row['loan_account_number'];
            $subdata['amount'] = $row['amount'];
            $subdata['status'] = $row['status'];
            $subdata['created_at'] = date('d M Y h:i A', strtotime($row['created_at']));;
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(\'edit\', ' . $row['transaction_id'] . ')" data-id="' . $row['transaction_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteTransaction('. $row['transaction_id'] . ')"  data-id="' . $row['transaction_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(transaction_id) as records_filtered FROM applicant_transactions WHERE 1 $searchQuery";
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
            $stmt = $conn->prepare("SELECT * FROM applicant_transactions WHERE transaction_id = ?");
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

    public function updateTransaction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transaction_id = isset($_POST['transaction_id']) ? intval($_POST['transaction_id']) : 0;
            $upi_transaction_id = isset($_POST['upi_transaction_id']) ? trim($_POST['upi_transaction_id']) : '';
            $customer_name = isset($_POST['customer_name']) ? trim($_POST['customer_name']) : '';
            $contact_number = isset($_POST['contact_number']) ? trim($_POST['contact_number']) : '';
            $loan_account_number = isset($_POST['loan_account_number']) ? trim($_POST['loan_account_number']) : '';
            $amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';
    
            if ($transaction_id > 0) {
                include('../db_connection.php');
                $sql = "UPDATE applicant_transactions SET 
                            upi_transaction_id = ?, 
                            customer_name = ?, 
                            contact_number = ?, 
                            loan_account_number = ?, 
                            amount = ?, 
                            status = ? 
                        WHERE transaction_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssi', $upi_transaction_id, $customer_name, $contact_number, $loan_account_number, $amount, $status, $transaction_id);
    
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Transaction updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update transaction'));
                }
    
                $stmt->close();
                $conn->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Invalid transaction_id'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    

    public function deleteTransaction() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Check if the faq_id key exists in the $_POST array
            if (isset($_GET['transaction_id'])) {
                $transaction_id = intval($_GET['transaction_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM applicant_transactions WHERE transaction_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $transaction_id);
    
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
                echo json_encode(array('success' => false, 'message' => 'faq_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
    // Add more functions as needed
}

$transactionInstance = new Transactions();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $transactionInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $transactionInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $transactionInstance->updateTransaction();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $transactionInstance->deleteTransaction();
    exit; 
}

?>
