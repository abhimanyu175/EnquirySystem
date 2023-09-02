<?php
session_start(); // Start the session

// Check if the teacher is already logged in, redirect to enquiries.php
if (isset($_SESSION['teacher_id'])) {
    header("Location: enquiries.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Establish database connection (Replace with your database connection details)
    $host = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $database = "enquiry_db"; // Replace with your database name
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the login form submission
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Prepare and execute the query to check if the teacher credentials are valid
    $sql = "SELECT tid, tname FROM teachers WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Teacher login successful
        $row = $result->fetch_assoc();
        $_SESSION['teacher_id'] = $row['tid'];
        $_SESSION['teacher_name'] = $row['tname'];

        // Redirect to enquiries.php
        header("Location: enquiries.php");
        exit();
    } else {
        // Login failed, show an error message
        $login_error = "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Teacher Login</h1>

    <!-- Display the error message, if any -->
    <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
    <?php } ?>

    <!-- Teacher login form -->
    <form action="teacher_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
