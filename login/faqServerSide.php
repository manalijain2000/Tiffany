<?php


class FreqAskedQuestion {
    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'faq_id',
            1 => 'question',
            2 => 'answer',
            3 => 'category',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(faq_id) as records_total FROM faq_section")->fetch_assoc();
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
            $searchQuery = " AND (question LIKE '%$searchValue%' OR answer LIKE '%$searchValue%' OR category LIKE '%$searchValue%')";
        }

        // Fetch records
        $sql = "SELECT faq_id, question, answer, category FROM faq_section WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['faq_id'] = $row['faq_id'];
            $subdata['question'] = $row['question'];
            $subdata['answer'] = $row['answer'];
            $subdata['category'] = $row['category'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal(\'edit\', ' . $row['faq_id'] . ')" data-id="' . $row['faq_id'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn  btn-sm deleteBtn" onclick="deleteFAQ('. $row['faq_id'] . ')"  data-id="' . $row['faq_id'] . '"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }

        // Get total filtered records
        $sql = "SELECT COUNT(faq_id) as records_filtered FROM faq_section WHERE 1 $searchQuery";
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

    public function addFaq() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = isset($_POST['question']) ? trim($_POST['question']) : '';
            $answer = isset($_POST['answer']) ? trim($_POST['answer']) : '';
            $category = isset($_POST['category']) ? trim($_POST['category']) : '';
            $created_at = date('Y-m-d H:i:s');
            include('../db_connection.php');
            $sql = "INSERT INTO faq_section (question, answer, category, created_at) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $question, $answer, $category, $created_at);
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'FAQ added successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to add FAQ'));
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
            $stmt = $conn->prepare("SELECT * FROM faq_section WHERE faq_id = ?");
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

    public function updateFaq() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $faq_id = isset($_POST['faq_id']) ? intval($_POST['faq_id']) : 0;
            $question = isset($_POST['question']) ? trim($_POST['question']) : '';
            $answer = isset($_POST['answer']) ? trim($_POST['answer']) : '';
            $category = isset($_POST['category']) ? trim($_POST['category']) : '';
            if ($faq_id > 0) {
                include('../db_connection.php');
                $sql = "UPDATE faq_section SET question = ?, answer = ?, category = ? WHERE faq_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssi', $question, $answer, $category, $faq_id);
                
                if ($stmt->execute()) {
                    echo json_encode(array('success' => true, 'message' => 'FAQ updated successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Failed to update FAQ'));
                }
                
                $stmt->close();
                $conn->close();
            } else {
                echo json_encode(array('success' => false, 'message' => 'Invalid faq_id'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    public function deleteFaq() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Check if the faq_id key exists in the $_POST array
            if (isset($_GET['faq_id'])) {
                $faq_id = intval($_GET['faq_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM faq_section WHERE faq_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $faq_id);
    
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

$FreqAskedQuestionInstance = new FreqAskedQuestion();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $FreqAskedQuestionInstance->index();
    exit; // Stop execution to prevent DataTables from processing other data
}elseif (isset($_GET['action']) && $_GET['action'] == 'add') {
    $FreqAskedQuestionInstance->addFaq();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $FreqAskedQuestionInstance->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $FreqAskedQuestionInstance->updateFaq();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $FreqAskedQuestionInstance->deleteFaq();
    exit; 
}

?>
