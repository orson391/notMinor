<?php
// Include database connection
include 'db_connect.php';

// Function to view students enrolled in a subject
function viewStudents($teacherID, $subjectID) {
    global $conn;
    $sql = "SELECT * FROM Students WHERE SubjectID = $subjectID";
    $result = $conn->query($sql);
    $students = array();
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    return $students;
}

// Usage example:
// $students = viewStudents(1, 3); // Teacher ID 1 viewing students in subject ID 3
?>
