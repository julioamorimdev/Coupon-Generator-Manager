<?php
// Start session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>