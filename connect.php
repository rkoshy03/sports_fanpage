<?php
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

// Get data from the form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];



// SQL query to insert data into a table
$sql = "INSERT INTO registration (fname, lname, gender, email, password) VALUES ('$fname', '$lname','$gender','$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
