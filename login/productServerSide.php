<?php


class Prodcuts {
    public function index() {
        include('../db_connection.php');
        // Define columns
        $columns = array(
            0 => 'product_id',
            1 => 'product_description',
            2 => 'product_title',
            3 => 'product_url',
            4 => 'loan_category',
        );
        
        // Get total records
        $totalData = $conn->query("SELECT COUNT(product_id) as records_total FROM products")->fetch_assoc();
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
            $searchQuery = " AND (product_description LIKE '%$searchValue%' OR product_title LIKE '%$searchValue%' OR product_url LIKE '%$searchValue%')";
        }
        
        // Fetch records
        $sql = "SELECT product_id, product_description, loan_category, product_title, product_url FROM products WHERE 1 $searchQuery ORDER BY $columnName $order LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
        
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['product_id'] = $row['product_id'];
            $subdata['product_description'] = $row['product_description'];
            $subdata['product_title'] = $row['product_title'];
            $subdata['product_url'] = '<img src="' .'../'.$row['product_url']. '" alt="Product Image" class="img-thumbnail" style="width:50px;height:50px;">';
            $subdata['loan_category'] = $row['loan_category'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(\'edit\', ' . $row['product_id'] . ')" data-id="' . $row['product_id'] . '"><i class="far fa-edit"></i></a>';
            $data[] = $subdata;
        }
        
        // Get total filtered records
        $sql = "SELECT COUNT(product_id) as records_filtered FROM products WHERE 1 $searchQuery";
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
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
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
    
    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
    
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    
            $sql_select = "SELECT * FROM products WHERE product_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $product_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
    
                if (isset($_FILES['product_url']) && $_FILES['product_url']['error'] === UPLOAD_ERR_OK) {
                    $backLoc = '../';
                    $previousFilePath = $backLoc . $row['product_url'];
                    if (file_exists($previousFilePath) && $backLoc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
    
                    $uploadDirectory = 'uploads/products/';
                    $uploadDirectoryStorage = '../uploads/products/';
                    $allowedFileTypes = array('jpg', 'jpeg', 'png');
    
                    $fileType = strtolower(pathinfo($_FILES['product_url']['name'], PATHINFO_EXTENSION));
                    $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['product_url']['name']);
    
                    if (in_array($fileType, $allowedFileTypes)) {
                        $newFileStoragePath = $uploadDirectoryStorage . basename($_FILES['product_url']['name']);
                        move_uploaded_file($_FILES['product_url']['tmp_name'], $newFileStoragePath);
                    }

                    $sql_update = "UPDATE products SET product_title = ?, product_description = ?, product_url = ? WHERE product_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('sssi', $_POST['product_title'], $_POST['product_description'], $uploadedFileLocationInDb, $product_id);
                } else {
                    $sql_update = "UPDATE products SET product_title = ?, product_description = ? WHERE product_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('ssi', $_POST['product_title'], $_POST['product_description'], $product_id);
                }
    
                // Update the SQL statement based on your actual table structure
                
    
                if ($stmt_update->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Product updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Product'));
                }
    
                $stmt_update->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Product not found'));
            }
    
            $stmt_select->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    
}

$productInstance = new Prodcuts();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $productInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $productInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $productInstance->updateProduct();
    exit; 
}
?>
