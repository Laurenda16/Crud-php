

<?php
// Connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'crudoperation';

// Create connection
$con = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set character set
mysqli_set_charset($con, "utf8");
?>
