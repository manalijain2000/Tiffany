<?php


class LoanApplicants {
    function addLoanApplicant() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $loan_type = isset($_POST['loan_type']) ? $_POST['loan_type'] : '';
            $desired_loan_amount = isset($_POST['desired_loan_amount']) ? $_POST['desired_loan_amount'] : '';
            $annual_income = isset($_POST['annual_income']) ? $_POST['annual_income'] : '';
            $birth_date = isset($_POST['birth_date']) ? $_POST['birth_date'] : '';
            $marital_status = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $present_employer = isset($_POST['present_employer']) ? $_POST['present_employer'] : '';
            $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
            $loan_status = isset($_POST['loan_status']) ? $_POST['loan_status'] : '';
            $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
            $created_at = date('Y-m-d H:i:s');

            if (isEmailUnique($email)) {
                insertIntoDatabase($first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at);
                echo json_encode(array('success' => true, 'message' => 'Loan applicant added successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Email already exists'));
            }
        } else {
            echo "Invalid request method";
        }
    }

    public function index() {
        // Define columns
        include('../db_connection.php');
        $columns = array(
            0 => 'loan_applicant_id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'phone',
            4 => 'email',
            5 => 'loan_type',
            6 => 'desired_loan_amount',
            7 => 'annual_income',
            8 => 'birth_date',
            9 => 'marital_status',
            10 => 'address',
            11 => 'present_employer',
            12 => 'occupation',
            13 => 'comments',
            14 => 'loan_status',
            15 => 'created_at',
        );
        // Get total records
        $totalData = $conn->query("SELECT COUNT(loan_applicant_id) as records_total FROM loan_applicants")->fetch_assoc();
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
        $sql = "SELECT loan_applicant_id, first_name, last_name, phone, email, loan_type, desired_loan_amount, annual_income, birth_date, marital_status, address, present_employer, occupation, comments, loan_status, created_at FROM loan_applicants WHERE 1 $searchQuery ORDER BY " . ($columnName ? "$columnName $order" : "created_at DESC") . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['loan_applicant_id'] = $row['loan_applicant_id'];
            $subdata['full_name'] = $row['first_name'] . ' ' . ($row['last_name'] ? $row['last_name'] : '');
            $subdata['phone'] = $row['phone'];
            $subdata['email'] = $row['email'];
            $subdata['loan_type'] = $row['loan_type'];
            $subdata['desired_loan_amount'] = $row['desired_loan_amount'];
            $subdata['annual_income'] = $row['annual_income'];
            $subdata['birth_date'] = $row['birth_date'];
            $subdata['marital_status'] = $row['marital_status'];
            $subdata['address'] = $row['address'];
            $subdata['present_employer'] = $row['present_employer'];
            $subdata['occupation'] = $row['occupation'];
            $subdata['comments'] = $row['comments'];
            $subdata['loan_status'] = $row['loan_status'];
            $subdata['created_at'] = $row['created_at'];
            $subdata['action'] = '<a href="javascript:void(0)" class="btn btn-sm editBtn" onclick="applyForLoanApplication(\'\', ' . $row['loan_applicant_id'] . ', \'edit\')"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm deleteBtn" onclick="deleteLoanApplicant(' . $row['loan_applicant_id'] . ')"><i class="far fa-trash-alt"></i></a>';
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(loan_applicant_id) as records_filtered FROM loan_applicants WHERE 1 $searchQuery";
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
            $stmt = $conn->prepare("SELECT * FROM loan_applicants WHERE loan_applicant_id = ?");
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
    
    function updateLoanApplicant() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('../db_connection.php');
    
            // Retrieve data from POST request
            $loan_applicant_id = isset($_POST['loan_applicant_id']) ? $_POST['loan_applicant_id'] : '';
            $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $loan_type = isset($_POST['loan_type']) ? $_POST['loan_type'] : '';
            $desired_loan_amount = isset($_POST['desired_loan_amount']) ? $_POST['desired_loan_amount'] : '';
            $annual_income = isset($_POST['annual_income']) ? $_POST['annual_income'] : '';
            $birth_date = isset($_POST['birth_date']) ? $_POST['birth_date'] : '';
            $marital_status = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $present_employer = isset($_POST['present_employer']) ? $_POST['present_employer'] : '';
            $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
            $loan_status = isset($_POST['loan_status']) ? $_POST['loan_status'] : '';
            $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
    
            // Update data in the database
            $stmt = $conn->prepare("UPDATE loan_applicants SET 
                first_name = ?, 
                last_name = ?, 
                phone = ?, 
                email = ?, 
                loan_type = ?, 
                desired_loan_amount = ?, 
                annual_income = ?, 
                birth_date = ?, 
                marital_status = ?, 
                address = ?, 
                present_employer = ?, 
                occupation = ?, 
                loan_status = ?, 
                comments = ? 
                WHERE loan_applicant_id = ?");
    
            $stmt->bind_param('ssssssssssssssi', 
                $first_name, $last_name, $phone, $email, $loan_type, 
                $desired_loan_amount, $annual_income, $birth_date, 
                $marital_status, $address, $present_employer, $occupation, 
                $loan_status, $comments, $loan_applicant_id);
    
            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Loan applicant updated successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to update loan applicant'));
            }
    
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    function deleteLoanApplicant() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['loan_applicant_id'])) {
                $loan_applicant_id = intval($_GET['loan_applicant_id']);
                include('../db_connection.php');
                // Prepare and execute the DELETE query
                $sql = "DELETE FROM loan_applicants  WHERE loan_applicant_id  = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $loan_applicant_id);
    
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

function isEmailUnique($email) {
    include('../db_connection.php');
    $result = $conn->query("SELECT COUNT(*) as count FROM loan_applicants WHERE email = '$email'");
    $count = $result->fetch_assoc()['count'];
    $conn->close();
    return $count == 0;
}

function insertIntoDatabase( $first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at) {
    include('../db_connection.php');
    $stmt = $conn->prepare("INSERT INTO loan_applicants (first_name, last_name, email, phone, loan_type, desired_loan_amount, annual_income, birth_date, marital_status, address, present_employer, occupation, loan_status, comments, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssssssss',  $first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

$LoanApplicants = new LoanApplicants();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'addLoanApplicant') {
    $LoanApplicants->addLoanApplicant();
    exit;
}elseif (isset($_GET['action']) && $_GET['action'] == 'index') {
    $LoanApplicants->index();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'getSignleRecord') {
    $LoanApplicants->getSignleRecord();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $LoanApplicants->updateLoanApplicant();
    exit; 
}elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $LoanApplicants->deleteLoanApplicant();
    exit; 
}

?>
