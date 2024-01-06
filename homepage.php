<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <!-- <link rel="stylesheet" href="homepage.css"> -->
  <!-- <link rel="stylesheet" href="css/viewstudent.css"> -->
</head>

<body>
<div class="back-button">
    <a class="back-button" href="homepage.php">Back to Home</a>
    <a href="login_form.php" class="back-button">Logout</a>
  </div>
  <div class="container">
    <div class="sidebar">
      <a href="dashboard.php">Dashboard</a>
      <a href="attendance_sheet.php">Attendance Sheet</a>
      <div class="dropdown">
        <a href="#" class="student">Student</a>
        <div class="dropdown-content">
        <div class="dashboard-item">
            <a href="viewstd.php">
             <label>View student</label>
             </a>
                </div>
            <div class="dashboard-item">
                <a href="register1.php">
                    <label>Register</label>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="Update12.php">
                    <label>Update</label>
                </a>
            </div>

        </div>

      </div>
    </div>
</body>

</html>