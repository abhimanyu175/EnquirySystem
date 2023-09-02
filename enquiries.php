<!DOCTYPE html>
<html>

<head>
    <title>Enquiries</title>
    <link rel="stylesheet" type="text/css" href="enquiries.css">
</head>

<body>
    <h1>Enquiries</h1>

    <!-- Display the teacher's details -->
    <?php
    session_start(); // Start the session

    // Establish database connection (Replace with your database connection details)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "enquiry_db";
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the teacher's details from the database using the teacher_id from the session
    if (isset($_SESSION['teacher_id'])) {
        $teacherId = $_SESSION['teacher_id'];
        $sql = "SELECT * FROM teachers WHERE tid = '$teacherId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $teacherRow = $result->fetch_assoc();
            $teacherName = $teacherRow['tname'];
            $teacherEmail = $teacherRow['temail'];
            // Add any other relevant teacher details you want to display
        } else {
            $teacherName = "Teacher details not found.";
            $teacherEmail = "";
            // Handle the case if teacher details are not found
        }
    }

    // Retrieve and display enquiries from the database
    $sqlEnquiries = "SELECT * FROM enquiries";
    $resultEnquiries = $conn->query($sqlEnquiries);

    // Close the database connection
    $conn->close();
    ?>

    <?php if (isset($_SESSION['teacher_id'])) { ?>
    <h2>Teacher Details</h2>
    <p>Name:
        <?php echo $teacherName; ?>
    </p>
    <p>Email:
        <?php echo $teacherEmail; ?>
    </p>
    <!-- Add any other teacher details you want to display -->
    <?php } else { ?>
    <p>Teacher details not available. Please login to view the details.</p>
    <?php } ?>

    <!-- Display the list of enquiries -->
    <h2>Enquiries List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Course ID</th>
            <th>Timestamp</th>
        </tr>
        <?php
        if ($resultEnquiries->num_rows > 0) {
            while ($rowEnquiry = $resultEnquiries->fetch_assoc()) {
                $name = $rowEnquiry['name'];
                $email = $rowEnquiry['email'];
                $message = $rowEnquiry['message'];
                $courseId = $rowEnquiry['cid'];
                $timestamp = $rowEnquiry['timestamp'];
                ?>
        <tr>
            <td>
                <?php echo $name; ?>
            </td>
            <td>
                <a
                    href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $email; ?>&su=Online Classes Enquiry. &body=This is a follow-up mail regarding the enquiry you had about the online classes. We are glad to know that you are interested in our classes and your enquiry will be answered below by our subject professional. ">
                    <?php echo $email; ?>
                </a>
            </td>
            <td>
                <?php echo $message; ?>
            </td>
            <td>
                <?php echo $courseId; ?>
            </td>
            <td>
                <?php echo $timestamp; ?>
            </td>
        </tr>
        <?php
            }
        } 
        else {
            ?>
        <tr>
            <td colspan="5">No enquiries found.</td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>