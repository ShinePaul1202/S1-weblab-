<?php
// Start session
session_start();

// Check if user is logged in (session is set)
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}

// Display student information from session
echo "<h2>Student Information</h2>";
echo "First Name: " . $_SESSION['student_first_name'] . "<br>";
echo "Email: " . $_SESSION['student_email'] . "<br>";
echo "Mobile Number: " . $_SESSION['student_mobile_number'] . "<br>";
echo "Gender: " . $_SESSION['student_gender'] . "<br>";

?>

<a href="logout.php">Logout</a>

