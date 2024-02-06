<?php
// Include the database connection file
include("../db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION[$username];
    $_SESSION[$password];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = 1;
        header("Location: applicant.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}
$conn->close();
?>
