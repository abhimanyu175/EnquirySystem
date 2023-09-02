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

// Retrieve Python course details from the database
$sql = "SELECT * FROM courses WHERE cid = 'python'";
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

<!DOCTYPE html>
<html>
<head>
  <title>Python Course Details</title>
  <link rel="stylesheet" type="text/css" href="javac.css">
</head>
<body>
  <h1><?php echo $courseName; ?> Course Details</h1>
  <h2>About the Course</h2>
  <?php if (!empty($courseDescription)): ?>
  
  <p><?php echo $courseDescription; ?></p>
  <?php endif; ?>

<p>Python is a versatile and powerful programming language that has gained immense popularity in recent years. Its simplicity, readability, and flexibility make it an excellent choice for both beginners and experienced developers alike. Python's clear and concise syntax allows programmers to express complex ideas with fewer lines of code, making it easy to learn and understand. This characteristic also enhances collaboration among developers, as it encourages clean and maintainable code.</p>

<p>One of Python's greatest strengths is its extensive standard library and a thriving ecosystem of third-party modules and packages. These resources provide developers with a wide range of tools for various tasks, such as web development, data analysis, machine learning, and more. This vast collection of libraries saves developers time and effort, enabling them to focus on solving problems and building innovative applications.</p>

<p>Moreover, Python's versatility extends beyond traditional software development. It has become a popular choice for scripting and automation, allowing users to automate repetitive tasks and streamline workflows. Its integration capabilities with other languages and systems make it a powerful tool for building complex software systems and integrating with existing technologies.</p>

<p>Furthermore, Python's widespread adoption across diverse domains, including web development, scientific computing, artificial intelligence, and data science, ensures that learning Python opens up a world of opportunities. It has become a staple in various industries and is heavily used by leading tech companies and startups alike. Whether you're a software engineer, data analyst, researcher, or aspiring developer, learning Python equips you with a valuable skillset that can lead to exciting career prospects.</p>

<p>Python's appeal also lies in its vibrant and welcoming community. The Python community is known for its inclusivity, open-source contributions, and willingness to help newcomers. Whether through online forums, tutorials, or meetups, Python enthusiasts are always ready to assist and share knowledge, creating a supportive environment for learning and collaboration.</p>

<p>
Python's use cases span a wide spectrum of industries and applications. For web development, popular frameworks like Django and Flask provide a solid foundation to build robust and scalable web applications. In the realm of data science and machine learning, libraries such as NumPy, Pandas, and TensorFlow enable researchers and data analysts to process and analyze large datasets efficiently. The language's simplicity and expressiveness also make it an excellent choice for teaching programming concepts to beginners, contributing to its widespread adoption in educational settings.</p>

<p>Overall, Python's versatility, ease of learning, vast library support, and strong community backing make it an indispensable tool for modern software development. Whether you are a seasoned developer looking to expand your skillset or a newcomer eager to enter the world of programming, Python offers an exciting journey filled with endless possibilities. Embracing Python empowers you to tackle diverse challenges, create innovative solutions, and be part of a global community that values creativity, collaboration, and a passion for coding.
</p>


<p>In conclusion, Python's ease of use, extensive library support, and broad application areas make it a compelling language for learners and professionals in the programming world. Embracing Python not only empowers developers to build efficient and elegant solutions but also provides a gateway to a dynamic and constantly evolving field with diverse opportunities for growth and innovation.</p>

  <form action="submit_enquiry.php" method="post">
    <input type="hidden" name="cid" value="python">
    <h2>Enquiry Form</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <div class='box'>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required placeholder="Enter the questions and other details you have about the course in this box."></textarea>
    </div>
    <br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
