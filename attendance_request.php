<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login_form.php');
    exit();
}
$user_id = $_SESSION['id'];

if (isset($_POST['requestAttendance'])) {
    $attendance_reason = mysqli_real_escape_string($conn, 'Attendance Request');
    $insert_request_sql = "INSERT INTO attendance_requests (user_id, reason) VALUES ($user_id, '$attendance_reason')";
    mysqli_query($conn, $insert_request_sql);
    mysqli_close($conn);
    header('Location: dashboardstd.php?success=1');
    exit();
} else {
    header('Location: dashboardstd.php?error=1');
    exit();
}
?>
