<?php
// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "enquiry_db";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$cid = $_POST['cid'];

// Validate form data (you can add additional validation if needed)

// Insert enquiry details into the database
$sql = "INSERT INTO enquiries (cid, name, email, message) VALUES ('$cid', '$name', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "Enquiry submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
