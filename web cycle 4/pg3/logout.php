<?php
// Clear cookies
setcookie('student_id', '', time() - 3600, "/");
setcookie('student_email', '', time() - 3600, "/");

header('Location: login.php');  // Redirect to login page
exit();
?>

