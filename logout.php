<?php
session_start();
// Destroy all sessions
if (session_destroy()) {
    // Redirect to home page
    header("Location: index.php");
}
?>
