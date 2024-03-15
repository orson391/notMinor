<?php
include 'config.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
$role = $_POST['role'];

// Check if username already exists
$sql = "SELECT * FROM Users WHERE Username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(array("message" => "Username already exists"));
} else {
    // Insert new user into database
    $sql = "INSERT INTO Users (Username, Password, Role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
       header("Location: menu.html");
    } else {
        echo json_encode(array("message" => "Error: " . $sql . "<br>" . $conn->error));
    }
}

$conn->close();
?>
