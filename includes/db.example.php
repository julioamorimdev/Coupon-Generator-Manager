<?php
// Database configuration example
// Copy this file to db.php and update with your database credentials

// Enter your Host, username, password, database below.
$con = mysqli_connect("localhost","your_username","your_password","your_database_name");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?> 