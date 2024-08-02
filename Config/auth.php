<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

session_start();

header('Content-Type: application/json');

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (!$username || !$password) {
    echo json_encode(['success' => false, 'message' => 'Username and password are required']);
    exit;
}

// Query to get user data
$sql = "SELECT username, password, name FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log("Prepare statement failed: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Database error']);
    exit;
}

$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    error_log("No user found with username: $username");
    echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    exit;
}

$stmt->bind_result($dbUsername, $dbPassword, $dbName);
$stmt->fetch();

error_log("Fetched user: $dbUsername");

// Check if the password is correct
if ($password === $dbPassword) { // Direct comparison for plain text passwords
    $_SESSION['isAuthenticated'] = true;
    $_SESSION['username'] = $dbUsername;
    $_SESSION['name'] = $dbName;
    echo json_encode(['success' => true]);
} else {
    error_log("Password does not match for username: $username");
    echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
}

$stmt->close();
$conn->close();
?>
