<?php
include("header.php");


// Clear all session data
session_unset();
session_destroy();

// Prevent caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Redirect to the home page or any other page after logout
header("Location: login.php");
exit();
?>
<!-- Test Comment -->