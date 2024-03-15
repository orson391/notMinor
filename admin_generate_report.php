<?php
// Include database connection
include 'db_connect.php';

// Function to generate attendance report
function generateReport($startDate, $endDate) {
    global $conn;
    $sql = "SELECT * FROM Attendance WHERE Date BETWEEN '$startDate' AND '$endDate'";
    $result = $conn->query($sql);
    $report = array();
    while ($row = $result->fetch_assoc()) {
        $report[] = $row;
    }
    return $report;
}

// Usage example:
// $attendanceReport = generateReport('2024-01-01', '2024-03-31');
?>
