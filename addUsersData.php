<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

class AddUsersData
{
    function addLoanApplicant()
    {
        // Mail functionality start
        // $mail = new PHPMailer(true);
        // $mailer = 'Tiffany finance';
        // try {
        //     //Server settings
        //     $mail->SMTPDebug = 2;                                 
        //     $mail->isSMTP();                                      
        //     $mail->Host = 'smtp.gmail.com';                     
        //     $mail->SMTPAuth = true;                               
        //     $mail->Username = 'babeljainmb18@gmail.com';           
        //     $mail->Password = 'xliauglxxnyhwmwn';                    
        //     $mail->SMTPSecure = 'tls';                            
        //     $mail->Port = 587;                                    
        
        //     //Recipients
        //     $mail->setFrom('babeljainmb18@gmail.com', );
        //     $mail->addAddress('babeljainmb18@gmail.com', $mailer);  
        //     $mail->addReplyTo('babeljainmb18@gmail.com', 'Information');
    
        //     //Content
        //     $mail->isHTML(true);                                  // Set email format to HTML
        //     $mail->Subject = 'New Inquiry Received';
            
        //     $mail->Body    = $mail->Body    = <<<EOD
        //     <html>
        //         <head>
        //         <title>New Inquiry Notification</title>
        //         </head>
        //         <body>
        //         <h1>New Inquiry Received</h1>
        //         <p>Dear Administrator,</p>
        //         <p>We have received a new inquiry through our website. Here are the details:</p>
        //         <p>Please visit the administration panel to respond.</p>
        //         <p><a href="https://www.tiffanyfinance.com/">Click here to view the inquiry.</a></p>
        //         <p>Tiffany Finance</p>
        //         </body>
        //     </html>
        //     EOD;

        //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        //     $mail->send();
        //     echo 'Message has been sent';
        // } catch (Exception $e) {
        //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        // }
        // mail functionality end
        
        // Google recaptcha code.
        // localhost secret key kindly change for live 
        $secret_key = '6LcCncMpAAAAANnb097oGgZ9oQ2fiIUHlZGkozKz';

        $secret = $secret_key;
        // The response from reCAPTCHA
        $response = $_POST['recaptchaResponse'];
        // Verify the response
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
        $responseData = json_decode($verifyResponse);

        if($responseData->success == 1) {
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
                $address1 = isset($_POST['address1']) ? $_POST['address1'] : '';
                $city = isset($_POST['city']) ? $_POST['city'] : '';
                $district = isset($_POST['district']) ? $_POST['district'] : '';
                $state = isset($_POST['state']) ? $_POST['state'] : '';
                $referenceNumber = isset($_POST['referenceNumber']) ? $_POST['referenceNumber'] : '';
                $created_at = date('Y-m-d H:i:s');
    
                if (isEmailUnique($email)) {
                    insertIntoDatabase($first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at, $address1, $city, $district, $state, $referenceNumber);
                    echo json_encode(array('success' => true, 'message' => 'Loan applicant added successfully'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Email already exists'));
                }
            } else {
                echo "Invalid request method";
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'You are robot.'));
        }
    }
    function addUserComplaint()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';

            include('db_connection.php');

            // Assuming your status field is a VARCHAR(50) in the database
            $sql = "INSERT INTO complaints (name, email, phone_number, loan_acc_number, state, city, status, message, created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssss', $name, $email, $phone_number, $loan_acc_number, $state, $city, $status, $message);

            if ($stmt->execute()) {
                echo json_encode(array('success' => true, 'message' => 'Complaint inserted successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Failed to insert Complaint'));
            }

            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    function feedbackRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';

            include('db_connection.php');

            $sql = "INSERT INTO feedbacks (name, email, phone_number, loan_acc_number, state, city, feedback, created_at)
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

    function addContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
            $loan_acc_number = isset($_POST['loan_acc_number']) ? trim($_POST['loan_acc_number']) : '';
            $state = isset($_POST['state']) ? trim($_POST['state']) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';

            include('db_connection.php');

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

    function addJobApplicant()
    {
        include('db_connection.php'); // Include your database connection script
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
        $experienc_type = $_POST['experience_type'];

        // Handle file upload
        $uploadDirectory = 'uploads/resumes/';
        $uploadedFile = $uploadDirectory . basename($_FILES['resume_location']['name']);
        move_uploaded_file($_FILES['resume_location']['tmp_name'], $uploadedFile);
        $resume_location = $uploadedFile;

        // Insert data into database
        $sql = "INSERT INTO job_applicants (first_name, last_name, phone, email, current_designation, last_current_company, designation_applying_for, preferred_location, current_ctc, resume_location, experience_level) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssss', $first_name, $last_name, $phone, $email, $current_designation, $last_current_company, $designation_applying_for, $preferred_location, $current_ctc, $resume_location, $experienc_type);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Application submitted successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to submit application'));
        }

        $stmt->close();
        $conn->close();
    }

    function payLoan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get data from the POST request
            $upi_transaction_id = isset($_POST['upi_transaction_id']) ? $_POST['upi_transaction_id'] : '';
            $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
            $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
            $loan_account_number = isset($_POST['loan_account_number']) ? $_POST['loan_account_number'] : '';
            $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
            $status = 'paid';

            // Call your function to store the data in the database
            payLoanEMIQr($upi_transaction_id, $customer_name, $contact_number, $loan_account_number, $amount, $status);
        } else {
            // Handle invalid request method
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
        }
    }

    function addInvestorApplication()
    {
        include('db_connection.php'); // Include your database connection script

        // Get form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $AcceptTermsNCondtion = $_POST['AcceptTermsNCondtion'];
        $know_about_us = $_POST['know_about_us'];
        $status = 'Inactive';

        // Insert data into the database using prepared statement
        $sql = "INSERT INTO investors (first_name, last_name, email, contact_number, city, state, pincode, AcceptTermsNCondtion, know_about_us, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssiss', $first_name, $last_name, $email, $contact_number, $city, $state, $pincode, $AcceptTermsNCondtion, $know_about_us, $status);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Investor application submitted successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to submit investor application'));
        }

        $stmt->close();
        $conn->close();
    }

}

function isEmailUnique($email)
{
    include('db_connection.php');
    $result = $conn->query("SELECT COUNT(*) as count FROM loan_applicants WHERE email = '$email'");
    $count = $result->fetch_assoc()['count'];
    $conn->close();
    return $count == 0;
}

function insertIntoDatabase($first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at, $address2, $city, $district, $state, $reference_id)
{
    include('db_connection.php');

    $stmt = $conn->prepare("INSERT INTO loan_applicants (first_name, last_name, email, phone, loan_type, desired_loan_amount, annual_income, birth_date, marital_status, address, present_employer, occupation, loan_status, comments, created_at, address2, city, district, state, refrence_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Adjust data types in bind_param based on the actual data types of your columns
    $stmt->bind_param('ssssssssssssssssssss', $first_name, $last_name, $email, $phone, $loan_type, $desired_loan_amount, $annual_income, $birth_date, $marital_status, $address, $present_employer, $occupation, $loan_status, $comments, $created_at, $address2, $city, $district, $state, $reference_id);

    $stmt->execute();
    $stmt->close();
    $conn->close();
}



function payLoanEMIQr($upi_transaction_id, $customer_name, $contact_number, $loan_account_number, $amount, $status)
{
    include('db_connection.php');
    $sql = "INSERT INTO applicant_transactions (upi_transaction_id, customer_name, contact_number, loan_account_number, amount, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $upi_transaction_id, $customer_name, $contact_number, $loan_account_number, $amount, $status);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true, 'message' => 'Data inserted successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to insert data'));
    }

    $stmt->close();
    $conn->close();
}

$addUserDataInstance = new AddUsersData();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'addLoanApplicant') {
    $addUserDataInstance->addLoanApplicant();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'complaintRegister') {
    $addUserDataInstance->addUserComplaint();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'feedbackRegister') {
    $addUserDataInstance->feedbackRegister();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'addContact') {
    $addUserDataInstance->addContact();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'addJobApplicant') {
    $addUserDataInstance->addJobApplicant();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'payLoanEmi') {
    $addUserDataInstance->payLoan();
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'addInvestorApplication') {
    $addUserDataInstance->addInvestorApplication();
    exit;
}

?>