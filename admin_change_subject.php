<?php
// Include database connection
include 'db_connect.php';

// Function to change student subject
function changeSubject($studentID, $newSubjectID) {
    global $conn;
    $sql = "UPDATE Students SET SubjectID = $newSubjectID WHERE StudentID = $studentID";
    return $conn->query($sql);
}

// Usage example:
// changeSubject(1, 3); // Change student with ID 1 to new subject ID 3
?>
