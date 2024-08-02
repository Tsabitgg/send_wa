<?php
$servername = "localhost:3306";
$dbname = "sendwa";
$username = "root";
$password = "Smartpay1ct";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
