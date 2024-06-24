<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];

$stmt = $conn->prepare("INSERT INTO registrations ('name',age, gender, phone, email, dob) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $name, $age, $gender, $phone, $email, $dob);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
