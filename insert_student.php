<?php
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = "Srksarawin.MySql@07"; // Change this to your database password
$dbname = "check";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $register_number = $_POST['register_number'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $blood_group = $_POST['blood_group'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO students (name, register_number, gender, date_of_birth, blood_group, email, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssssss", $name, $register_number, $gender, $date_of_birth, $blood_group, $email, $contact, $address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


<html>
      <body>
      <a href="view_students.php"
		style="font-size:30px; float:right;">
		View
	</a>
   </body>    


</html>
