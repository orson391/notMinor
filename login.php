<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data based on username
$sql = "SELECT * FROM Users WHERE Username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['Password'])) {
        // Start session and store user data
        session_start();
        $_SESSION['username'] = $row['Username'];
        $role = $_SESSION['role'] = $row['Role'];
        if($role == "Admin")
        {
            header("Location: admin_users.html");
        }
        elseif($role == "Teacher")
        {
            header("Location: menu.html");
        }
        else
        {
            header("Location: menu.html");
        }
        
    } else {
        echo json_encode(array("message" => "Invalid username or password"));
    }
} else {
    echo json_encode(array("message" => "Invalid username or password"));
}

$conn->close();
?>
