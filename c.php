<!DOCTYPE html>
<html>

<head>
  <title>C Course Details</title>
  <link rel="stylesheet" type="text/css" href="javac.css">
</head>

<body>
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

  // Retrieve C course details from the database
  $sql = "SELECT * FROM courses WHERE cid = 'c'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $courseName = $row['cname'];
      $courseDescription = $row['cdescription'];
  } else {
      $courseName = "Course details not found.";
      $courseDescription = "";
  }

  // Close the database connection
  $conn->close();
  ?>

  <h1>
    <?php echo $courseName; ?> Course Details
  </h1>

  <?php if (!empty($courseDescription)): ?>
  <h2>About the Course</h2>
  <p>
    <?php echo $courseDescription; ?>
  </p>
  <?php endif; ?>
  <p>
  C programming is a fundamental and powerful language that has been a cornerstone of the programming world for decades. Developed by Dennis Ritchie in the early 1970s, C has stood the test of time and remains widely used across various domains. Learning C is not just about acquiring a specific language skill but also about understanding the foundational concepts that underpin many other programming languages.</p>
<p>
One of the primary reasons to learn C is its efficiency and performance. As a low-level language, C offers direct control over system resources, allowing developers to write optimized code that executes quickly and efficiently. Its ability to interact with hardware at a granular level makes it ideal for systems programming and building applications that require close proximity to the underlying hardware, such as operating systems, device drivers, and embedded systems.</p>
<p>
Additionally, C is a structured and procedural language, which emphasizes modular and organized programming. By breaking down code into functions and reusable modules, C promotes a disciplined approach to software development, making programs more maintainable and easier to debug. This structured paradigm lays a strong foundation for tackling complex projects and prepares programmers to deal with larger codebases and collaborative development environments.</p>
<p>
Furthermore, C's widespread adoption in various industries and technologies renders it a valuable skill for developers. Many core components of operating systems, compilers, and libraries are written in C, making it an essential language for understanding the inner workings of computing systems. Knowledge of C paves the way to explore other languages and domains, such as C++, Java, and embedded systems, as C forms the basis for many of these languages.</p>
<p>
In conclusion, learning C programming offers several significant benefits. It imparts a deep understanding of programming fundamentals, enhances problem-solving abilities, and equips developers with a versatile toolset for building efficient and high-performance applications. Whether aspiring to become a systems programmer, delve into embedded systems, or simply gain a solid foundation in programming, C remains an invaluable and timeless language that continues to shape the world of technology.</p>
  <form action="submit_enquiry.php" method="post">
    <br>
    <input type="hidden" name="cid" value="c">
    <h2>Enquiry Form</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
<div class='box'>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required placeholder="Enter the questions and other details you have about the course in this box. "></textarea>
  </div>
    <br>

    <input type="submit" value="Submit">
  </form>
</body>

</html>
