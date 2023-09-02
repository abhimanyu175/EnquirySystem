<!DOCTYPE html>
<html>

<head>
  <title>Java Course Details</title>
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

  // Retrieve Java course details from the database
  $sql = "SELECT * FROM courses WHERE cid = 'java'";
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
  <p>Studying Java can be an immensely rewarding and valuable pursuit for anyone interested in computer programming and
    software development. Java is a versatile and widely-used programming language with numerous reasons why it's an
    excellent choice for aspiring developers and seasoned professionals alike. </p>

  <p>First and foremost, Java's platform independence sets it apart from many other languages. With the "write once, run
    anywhere" capability, Java programs can be executed on any device with a compatible Java Virtual Machine (JVM). This
    means you can develop applications that work seamlessly across various platforms, including Windows, macOS, Linux,
    and even mobile devices like Android. The ability to create cross-platform software makes Java a powerful tool in
    today's diverse technological landscape. </p>

  <p> Moreover, Java's object-oriented nature fosters a structured and modular approach to programming. By organizing
    code into reusable objects and classes, developers can create scalable and maintainable applications.
    Object-oriented programming is a fundamental paradigm in the software industry, and mastering it through Java
    provides a solid foundation for learning other languages and frameworks. </p>

  <p>Java's emphasis on security is another compelling reason to study it. The language incorporates built-in security
    features like bytecode verification and automatic memory management (garbage collection), which help prevent common
    vulnerabilities like buffer overflows and memory leaks. This makes Java a preferred choice for building secure and
    reliable applications, especially for web development and enterprise-level systems. </p>

  <p>Furthermore, the extensive standard library and rich ecosystem of Java offer a treasure trove of resources for
    developers. From GUI libraries to networking tools, Java provides a wide range of pre-built components that
    streamline development and reduce the need to reinvent the wheel. Additionally, the vibrant Java community
    continuously contributes to open-source projects and frameworks, fostering a collaborative environment where
    developers can share knowledge and leverage shared solutions. </p>


  <p>Finally, Java's widespread adoption and demand in the job market make it a valuable skill for career growth.
    Countless organizations, ranging from startups to large enterprises, rely on Java for building robust applications
    and systems. Whether you're aspiring to become a web developer, mobile app developer, software engineer, or even
    pursue a career in data science, knowledge of Java will undoubtedly open doors to a multitude of exciting
    opportunities. </p>

  <p>In conclusion, studying Java offers a pathway to becoming a proficient and versatile programmer with the potential
    for vast career prospects. Its platform independence, object-oriented approach, emphasis on security, rich standard
    library, and strong community support make it an attractive language for both beginners and seasoned professionals
    seeking to excel in the dynamic field of computer programming and software development.</p>
  
  <form action="submit_enquiry.php" method="post">
    <br>
    <input type="hidden" name="cid" value="java">
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