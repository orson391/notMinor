<?php
// Include database connection
include 'db_connect.php';

// Function to update attendance for students
function updateAttendance($studentID, $date, $attendanceStatus) {
    global $conn;
    $sql = "INSERT INTO Attendance (StudentID, Date, AttendanceStatus) VALUES ($studentID, '$date', '$attendanceStatus')";
    return $conn->query($sql);
}

// Usage example:
// updateAttendance(1, '2024-03-15', 'Present'); // Mark student with ID 1 as present on 2024-03-15
?>
