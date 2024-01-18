<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accept'])) {
        $userId = $_POST['userId'];
        updateAttendanceStatus($userId, 1);
    } elseif (isset($_POST['decline'])) {
        $userId = $_POST['userId'];
        updateAttendanceStatus($userId, 0);
    }
}

function updateAttendanceStatus($userId, $status) {
    global $conn;
    $currentTimestamp = date("Y-m-d H:i:s");
    $fetchSql = "SELECT * FROM attendance_requests WHERE user_id = $userId AND DATE(timestamp) = CURDATE()";
    $fetchResult = mysqli_query($conn, $fetchSql);

    if ($fetchResult && mysqli_num_rows($fetchResult) > 0) {
        $insertSql = "INSERT INTO attendance_status (user_id, status, timestamp) VALUES ($userId, $status, '$currentTimestamp')";
        $insertResult = mysqli_query($conn, $insertSql);

        if ($insertResult) {
            header("Location: attendance_sheet.php?success=1");
            exit;
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        echo "No data found for the user on the current date.";
    }

    mysqli_close($conn);
}
?>
