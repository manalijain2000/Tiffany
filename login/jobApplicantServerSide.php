<?php


class JobApplicants {
    function addJobApplicant() {
        include('../db_connection.php'); // Include your database connection script
        // Get form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $current_designation = $_POST['current_designation'];
        $last_current_company = $_POST['last_current_company'];
        $designation_applying_for = $_POST['designation_applying_for'];
        $preferred_location = $_POST['preferred_location'];
        $current_ctc = $_POST['current_ctc'];

        // Handle file upload
        $uploadDirectory = '../uploads/resumes/';
        $uploadDirectoryDb = 'uploads/resumes/';

        $uploadedFile = $uploadDirectory . basename($_FILES['resume_location']['name']);
        $uploadedFileDb = $uploadDirectoryDb . basename($_FILES['resume_location']['name']);
        move_uploaded_file($_FILES['resume_location']['tmp_name'], $uploadedFile);
        $resume_location = $uploadedFileDb;

        // Insert data into database
        $sql = "INSERT INTO job_applicants (first_name, last_name, phone, email, current_designation, last_current_company, designation_applying_for, preferred_location, current_ctc, resume_location) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssss', $first_name, $last_name, $phone, $email, $current_designation, $last_current_company, $designation_applying_for, $preferred_location, $current_ctc, $resume_location);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Application submitted successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to submit application'));
        }

        $stmt->close();
        $conn->close();
    }

    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'job_applicant_id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'phone',
            4 => 'email',
            5 => 'current_designation',
            6 => 'last_current_company',
            7 => 'designation_applying_for',
            8 => 'preferred_location',
            9 => 'current_ctc',
            10 => 'resume_location',
            15 => 'created_at',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(job_applicant_id) as records_total FROM job_applicants")->fetch_assoc();
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
            $searchQuery = " AND (first_name LIKE '%$searchValue%' OR last_name LIKE '%$searchValue%' OR phone LIKE '%$searchValue%' OR email LIKE '%$searchValue%')";
        }
    
        // Fetch records
        $sql = "SELECT job_applicant_id, first_name, last_name, phone, email, current_designation, last_current_company, designation_applying_for, preferred_location, current_ctc, resume_location, created_at FROM job_applicants WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['job_applicant_id'] = $row['job_applicant_id'];
            $subdata['full_name'] = $row['first_name'] . ' ' . ($row['last_name'] ? $row['last_name'] : '');
            $subdata['phone'] = $row['phone'];
            $subdata['email'] = $row['email'];
            $subdata['current_designation'] = $row['current_designation'];
            $subdata['last_current_company'] = $row['last_current_company'];
            $subdata['designation_applying_for'] = $row['designation_applying_for'];
            $subdata['preferred_location'] = $row['preferred_location'];
            $subdata['current_ctc'] = $row['current_ctc'];
            $subdata['resume_location'] = $row['resume_location'];
            $subdata['created_at'] = $row['created_at'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="addEditModal('. $row['job_applicant_id'] . ', \'edit\')"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm deleteBtn" onclick="deleteJobApplicant(' . $row['job_applicant_id'] . ')"><i class="far fa-trash-alt"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm viewBtn"  onclick="viewLoanApplicant(' . htmlspecialchars(json_encode($row['resume_location']), ENT_QUOTES, 'UTF-8') . ')"><i class="far fa-eye"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(job_applicant_id) as records_filtered FROM job_applicants WHERE 1 $searchQuery";
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

    function getSignleRecord() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include('../db_connection.php');
            $stmt = $conn->prepare("SELECT * FROM job_applicants WHERE job_applicant_id = ?");
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
    
    function updateJobApplicant() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
            
            // Retrieve data from POST request
            $job_applicant_id = isset($_POST['job_applicant_id']) ? $_POST['job_applicant_id'] : '';
            $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $current_designation = isset($_POST['current_designation']) ? $_POST['current_designation'] : '';
            $last_current_company = isset($_POST['last_current_company']) ? $_POST['last_current_company'] : '';
            $designation_applying_for = isset($_POST['designation_applying_for']) ? $_POST['designation_applying_for'] : '';
            $preferred_location = isset($_POST['preferred_location']) ? $_POST['preferred_location'] : '';
            $current_ctc = isset($_POST['current_ctc']) ? $_POST['current_ctc'] : '';
        
            // Update data in the database
            $stmt = $conn->prepare("UPDATE job_applicants SET 
                first_name = ?, 
                last_name = ?, 
                phone = ?, 
                email = ?, 
                current_designation = ?, 
                last_current_company = ?, 
                designation_applying_for = ?, 
                preferred_location = ?, 
                current_ctc = ? 
                WHERE job_applicant_id = ?");
        
            $stmt->bind_param('sssssssssi', 
                $first_name, $last_name, $phone, $email, $current_designation, 
                $last_current_company, $designation_applying_for, $preferred_location, 
                $current_ctc, $job_applicant_id);
        
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Job applicant updated successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to update job applicant'));
            }
        
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
        
    }

    function deleteJobApplicant() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['job_applicant_id'])) {
                $job_applicant_id = intval($_GET['job_applicant_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM job_applicants  WHERE job_applicant_id  = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $job_applicant_id);
    
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
    
}


$jobApplicants = new JobApplicants();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'addJobApplicant') {
    $jobApplicants->addJobApplicant();
    exit;
}elseif (isset($_GET['action']) && $_GET['action'] == 'index') {
    $jobApplicants->index();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $jobApplicants->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $jobApplicants->updateJobApplicant();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $jobApplicants->deleteJobApplicant();
    exit; 
}

?>
