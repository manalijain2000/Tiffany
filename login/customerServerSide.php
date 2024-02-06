<?php


class CustomerReview {
    public function index() {
        // Include database connection
        include('../db_connection.php');
    
        // Define columns
        $columns = array(
            0 => 'customer_id',
            1 => 'customer_name',
            2 => 'customer_email',
            3 => 'customer_image',
            4 => 'customer_review',
        );
    
        // Get total records
        $totalData = $conn->query("SELECT COUNT(customer_id) as records_total FROM customer_reviews")->fetch_assoc();
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
            $searchQuery = " AND (customer_name LIKE '%$searchValue%' OR customer_email LIKE '%$searchValue%' OR customer_review LIKE '%$searchValue%')";
        }
    
        // Fetch records
        $sql = "SELECT customer_id, customer_name, customer_email, customer_image, customer_review FROM customer_reviews WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['customer_id'] = $row['customer_id'];
            $subdata['customer_name'] = $row['customer_name'];
            $subdata['customer_email'] = $row['customer_email'];
            $subdata['customer_image'] = '<img src="' .'../'.$row['customer_image']. '" alt="Customer Image" class="img-thumbnail" style="width:50px;height:50px;">';
            $subdata['customer_review'] = $row['customer_review'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditCustomerReview(' . $row['customer_id'] . ', \'edit\', )" data-id="' . $row['customer_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm deleteBtn" onclick="deleteCustomerReview('. $row['customer_id'] . ')"  data-id="' . $row['customer_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(customer_id) as records_filtered FROM customer_reviews WHERE 1 $searchQuery";
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

    public function addCustomerReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
    
            $customerName = isset($_POST['customerName']) ? trim($_POST['customerName']) : '';
            $customerReview = isset($_POST['customerReview']) ? trim($_POST['customerReview']) : '';
            $customerEmail = isset($_POST['customerEmail']) ? trim($_POST['customerEmail']) : '';
    
            // Check if the file is uploaded successfully
            if (isset($_FILES['customerImage']) && $_FILES['customerImage']['error'] === UPLOAD_ERR_OK) {
                $uploadDirectory = 'uploads/customerReview/';
                $uploadDirectoryStorage = '../uploads/customerReview/';
                $allowedFileTypes = array('jpg', 'jpeg', 'png');
    
                $uploadedFile = $uploadDirectoryStorage . basename($_FILES['customerImage']['name']);
                $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['customerImage']['name']);
                $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
                // Check if the file type is allowed
                if (in_array($fileType, $allowedFileTypes)) {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES['customerImage']['tmp_name'], $uploadedFile)) {
                        $createdAt = date('Y-m-d H:i:s');
    
                        // Insert customer review into the database with image
                        $sql = "INSERT INTO customer_reviews (customer_name, customer_review, customer_email, customer_image, created_at) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('sssss', $customerName, $customerReview, $customerEmail, $uploadedFileLocationInDb, $createdAt);
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
                // Insert customer review into the database without image
                $sql = "INSERT INTO customer_reviews (customer_name, customer_review, customer_email, created_at) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssss', $customerName, $customerReview, $customerEmail, $createdAt);
            }
    
            $createdAt = date('Y-m-d H:i:s');
    
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Customer review added successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to add customer review to the database'));
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
            $stmt = $conn->prepare("SELECT * FROM customer_reviews WHERE customer_id = ?");
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

    public function updateCustomerReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            $customer_id = isset($_POST['customerId']) ? $_POST['customerId'] : '';
            $sql_select = "SELECT * FROM customer_reviews WHERE customer_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $customer_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                // Check if a new file is uploaded
                if (isset($_FILES['customerImage']) && $_FILES['customerImage']['error'] === UPLOAD_ERR_OK) {
                    $previousFilePath = '../' . $row['customer_image'];
                    if (file_exists($previousFilePath)) {
                        unlink($previousFilePath);
                    }
    
                    $uploadDirectory = 'uploads/customerReview/';
                    $uploadDirectoryStorage = '../uploads/customerReview/';
                    $allowedFileTypes = array('jpg', 'jpeg', 'png');
                    $uploadedFile = $uploadDirectoryStorage . basename($_FILES['customerImage']['name']);
                    $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['customerImage']['name']);
                    $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
                    
                    if (in_array($fileType, $allowedFileTypes)) {
                        $newFileStoragePath = $uploadDirectoryStorage . basename($_FILES['customerImage']['name']);
                        move_uploaded_file($_FILES['customerImage']['tmp_name'], $newFileStoragePath);
                    }
    
                    // Update customer review with new file
                    $sql_update = "UPDATE customer_reviews SET customer_name = ?, customer_review = ?, customer_email = ?, customer_image = ? WHERE customer_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('ssssi', $_POST['customerName'], $_POST['customerReview'], $_POST['customerEmail'], $uploadedFileLocationInDb, $customer_id);
                } else {
                    // Update customer review without changing the file
                    $sql_update = "UPDATE customer_reviews SET customer_name = ?, customer_review = ?, customer_email = ? WHERE customer_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('sssi', $_POST['customerName'], $_POST['customerReview'], $_POST['customerEmail'], $customer_id);
                }
    
                if ($stmt_update->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Customer Review updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Customer Review'));
                }
    
                $stmt_update->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Customer Review not found'));
            }
    
            $stmt_select->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
    public function deleteCustomerReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['customer_id'])) {
                $customer_id = intval($_GET['customer_id']);
                include('../db_connection.php');
    
                // Step 1: Retrieve data of the bank partner with the specified customer_id
                $sql_select = "SELECT * FROM customer_reviews WHERE customer_id = ?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param('i', $customer_id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Step 2: Delete the associated image file if it exists
                    $prefixLoc = '../';
                    $previousFilePath = '../' . $row['customer_image'];
                    if (file_exists($previousFilePath) && $prefixLoc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
    
                    // Step 3: Delete the bank partner entry
                    $sql_delete = "DELETE FROM customer_reviews WHERE customer_id = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param('i', $customer_id);
    
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

$customerReviewInstance = new CustomerReview();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $customerReviewInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $customerReviewInstance->addCustomerReview();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $customerReviewInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $customerReviewInstance->updateCustomerReview();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $customerReviewInstance->deleteCustomerReview();
    exit; 
}

?>
