<?php
// Include database connection
include 'db_connect.php';

// Function to view personal attendance records for a student
function viewAttendance($studentID) {
    global $conn;
    $sql = "SELECT * FROM Attendance WHERE StudentID = $studentID";
    $result = $conn->query($sql);
    $attendance = array();
    while ($row = $result->fetch_assoc()) {
        $attendance[] = $row;
    }
    return $attendance;
}

// Usage example:
// $attendanceRecords = viewAttendance(1); // Student with ID 1 viewing their attendance records
?>
