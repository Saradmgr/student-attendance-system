<?php
include 'config.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login_form.php');
    exit();
}

$user_id = $_SESSION['id'];

if (isset($_POST['request_attendance'])) {
            $attendance_reason = mysqli_real_escape_string($conn, 'Attendance Request');

    $timestamp = date('Y-m-d H:i:s');
    
    $insert_request_sql = "INSERT INTO attendance_requests (user_id, reason, timestamp) VALUES ($user_id, '$attendance_reason', '$timestamp')";
    
    if (mysqli_query($conn, $insert_request_sql)) {
        mysqli_close($conn);
        header('Location: dashboardstd.php?success=1');
        exit();
    } else {
        mysqli_close($conn);
        header('Location: dashboardstd.php?error=1');
        exit();
    }
} else {
    header('Location: dashboardstd.php?error=1');
    exit();
}
?>
