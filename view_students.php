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

// SQL query to select all student records
$sql = "SELECT name, register_number, gender, date_of_birth, blood_group, email, contact, address FROM students";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Student Records</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Register Number</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Blood Group</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["name"]) . "</td>
                        <td>" . htmlspecialchars($row["register_number"]) . "</td>
                        <td>" . htmlspecialchars($row["gender"]) . "</td>
                        <td>" . htmlspecialchars($row["date_of_birth"]) . "</td>
                        <td>" . htmlspecialchars($row["blood_group"]) . "</td>
                        <td>" . htmlspecialchars($row["email"]) . "</td>
                        <td>" . htmlspecialchars($row["contact"]) . "</td>
                        <td>" . htmlspecialchars($row["address"]) . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
   
   

    
</body>
</html>
<?php
// Close connection
$conn->close();
?>
