<?php


class Gallary {
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'gallary_id',
            1 => 'gallery_image',
            2 => 'created_at',
        );
    
        // Get total records
        $totalData = $conn->query("SELECT COUNT(gallary_id) as records_total FROM gallery_photos")->fetch_assoc();
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
            $searchQuery = " AND (gallery_image LIKE '%$searchValue%' OR created_at LIKE '%$searchValue%')";
        }
    
        // Fetch records
        $sql = "SELECT gallary_id, gallery_image, created_at FROM gallery_photos WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['gallary_id'] = $row['gallary_id'];
            $subdata['gallery_image'] = '<img src="' .'../'.$row['gallery_image']. '" alt="Gallery Image" class="img-thumbnail" style="width:50px;height:50px;">';
            $subdata['created_at'] = $row['created_at'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="adddEditGallaryPhoto(' . $row['gallary_id'] . ', \'edit\', )" data-id="' . $row['gallary_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteGalleryPhoto('. $row['gallary_id'] . ')"  data-id="' . $row['gallary_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(gallary_id) as records_filtered FROM gallery_photos WHERE 1 $searchQuery";
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

    public function addGalleryPhoto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
    
            // Check if the file is uploaded successfully
            if (isset($_FILES['galleryImage']) && $_FILES['galleryImage']['error'] === UPLOAD_ERR_OK) {
                $uploadDirectory = 'uploads/gallery/';
                $uploadDirectoryStorage = '../uploads/gallery/';
                $allowedFileTypes = array('jpg', 'jpeg', 'png');
    
                $uploadedFile = $uploadDirectoryStorage . basename($_FILES['galleryImage']['name']);
                $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['galleryImage']['name']);
                $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
                // Check if the file type is allowed
                if (in_array($fileType, $allowedFileTypes)) {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES['galleryImage']['tmp_name'], $uploadedFile)) {
                        // Insert gallery data into the database
                        $sql = "INSERT INTO gallery_photos (gallery_image, created_at) VALUES (?, NOW())";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('s', $uploadedFileLocationInDb);
    
                        if ($stmt->execute()) {
                            echo json_encode(array('success' => true, 'message' => 'Gallery image added successfully'));
                        } else {
                            echo json_encode(array('success' => false, 'message' => 'Failed to add gallery image to the database'));
                        }
    
                        $stmt->close();
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'Failed to move the uploaded file'));
                    }
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Invalid file type. Only jpg, jpeg, and png files are allowed.'));
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'No file uploaded'));
            }
    
            // Close the database connection
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function updateGalleryPhoto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            $gallary_id = isset($_POST['gallery_id']) ? $_POST['gallery_id'] : '';
            $sql_select = "SELECT * FROM gallery_photos WHERE gallary_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $gallary_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (isset($_FILES['galleryImage']) && $_FILES['galleryImage']['error'] === UPLOAD_ERR_OK) {
                    $preFixLOc = '../';
                    $previousFilePath = '../' . $row['gallery_image'];
                    if (file_exists($previousFilePath) && $preFixLOc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
                    $uploadDirectory = 'uploads/gallery/';
                    $uploadDirectoryStorage = '../uploads/gallery/';
                    $allowedFileTypes = array('jpg', 'jpeg', 'png');
                    $uploadedFile = $uploadDirectoryStorage . basename($_FILES['galleryImage']['name']);
                    $uploadedFileLocationInDb = $uploadDirectory . basename($_FILES['galleryImage']['name']);
                    $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
                    if (in_array($fileType, $allowedFileTypes)) {
                        $newFileStoragePath = $uploadDirectoryStorage . basename($_FILES['galleryImage']['name']);
                        move_uploaded_file($_FILES['galleryImage']['tmp_name'], $newFileStoragePath);
                    }
    
                    $sql_update = "UPDATE gallery_photos SET gallery_image = ? WHERE gallary_id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param('si', $uploadedFileLocationInDb, $gallary_id);
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Gallery Photo. No image provided.'));
                    exit;
                }
    
                if ($stmt_update->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'Gallery Photo updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update Gallery Photo'));
                }
    
                $stmt_update->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Gallery Photo not found'));
            }
            $stmt_select->close();
            $conn->close();    
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }
    

    public function deleteGalleryPhoto() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['gallary_id'])) {
                $gallary_id = intval($_GET['gallary_id']);
                include('../db_connection.php');
    
                // Step 1: Retrieve data of the bank partner with the specified gallary_id
                $sql_select = "SELECT * FROM gallery_photos WHERE gallary_id = ?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param('i', $gallary_id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Step 2: Delete the associated image file
                    $prefixLoc = '../';
                    $previousFilePath = $prefixLoc . $row['gallery_image'];
                    if (file_exists($previousFilePath) && $prefixLoc != $previousFilePath) {
                        unlink($previousFilePath);
                    }
                    // Step 3: Delete the bank partner entry
                    $sql_delete = "DELETE FROM gallery_photos WHERE gallary_id = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param('i', $gallary_id);
    
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
                // Handle the case where gallary_id is not set
                echo json_encode(array('success' => false, 'message' => 'gallary_id is not set'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    } 
}

$gallaryInstance = new Gallary();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $gallaryInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $gallaryInstance->addGalleryPhoto();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $gallaryInstance->updateGalleryPhoto();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $gallaryInstance->deleteGalleryPhoto();
    exit; 
}

?>
