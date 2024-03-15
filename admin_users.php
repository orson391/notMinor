<?php
// Include database connection
include 'db_connect.php';

// Function to add a new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle add user request
    if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Users (Username, Password, Role) VALUES ('$username', '$hashedPassword', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "User added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Handle other requests (remove user, edit user, etc.) similarly
}




// Function to remove a user
function removeUser($userID) {
    global $conn;
    $sql = "DELETE FROM Users WHERE UserID = $userID";
    return $conn->query($sql);
}

// Function to edit user details
function editUser($userID, $username, $password, $role) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE Users SET Username = '$username', Password = '$hashedPassword', Role = '$role' WHERE UserID = $userID";
    return $conn->query($sql);
}

// Usage example:
// addUser('john_doe', 'password123', 'Teacher');
// removeUser(2);
// editUser(3, 'jane_doe', 'new_password', 'Student');
?>
