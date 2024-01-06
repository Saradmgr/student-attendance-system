<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
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
<h1>View Student</h1>
        <div class="student-list">
          <table>
            <thead>
              <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Number</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT roll, name, lname, gender, addr, num, email FROM user_form";
              $result = mysqli_query($conn, $sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["roll"] . "</td>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["lname"] . "</td>";
                  echo "<td>" . $row["gender"] . "</td>";
                  echo "<td>" . $row["addr"] . "</td>";
                  echo "<td>" . $row["num"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='3'>No data found</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table>
        </div>
        <a href="updateroll.php">Update Roll number</a>
</body>
</html>
