<?php
session_start();

// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "testlfc";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to check if the user exists in the database
    $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, redirect to the shop page (shop.html)
        $_SESSION['loggedin'] = true;
        header("Location: frame-9.html"); // Redirect to the shop page
        exit;
    } else {
        // Login failed, redirect back to login.html with an error message
        $_SESSION['login_error'] = "Invalid email or password. Please try again.";
        header("Location: login.html");
        exit;
    }
}

// Close the database connection
$conn->close();
?>
