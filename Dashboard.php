<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="Dashboard.css" />
  <script>
    function showSubjectDetails() {
      var subjectDetails = document.getElementById("subjectDetails");
      subjectDetails.style.display = "block";

      var studentDetails = document.getElementById("studentDetails");
      studentDetails.style.display = "none";
    }

    function showStudentDetails() {
      var studentDetails = document.getElementById("studentDetails");
      studentDetails.style.display = "block";

      var subjectDetails = document.getElementById("subjectDetails");
      subjectDetails.style.display = "none";
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <h1>Dashboard</h1>

      <div class="dashboard-item" onclick="showSubjectDetails()">
        <label>Subjects:</label>
      </div>

      <div class="dashboard-item" onclick="showStudentDetails()">
        <label>Total Students:</label>
      </div>
    </div>
    <div class="container">
      <a class="back-button" href="homepage.php">Back to Home</a>
    </div>
    <div class="table">
      <div id="subjectDetails" class="hide">
        <h2>Subject Details</h2>
        <?php
        $query = "SELECT * FROM teacher_form";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          die('Error in the query: ' . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
          echo "<table>";
          echo "<tr>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
              </tr>";

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['teacher'] . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t1'])) . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t2'])) . "</td>";

            echo "</tr>";
          }
          echo "</table>";
        } else {
          echo "No data found.";
        }
        mysqli_close($conn);
        ?>
        <a href="update1.php">Update Information</a>
        <a href="update.php">Add Information</a>

      </div>


      <div id="studentDetails" class="hide">
        <h2>Student Details</h2>
        <div class="color-indicator">
          <div>
            <div class="red-light"></div><span>Absent</span>
          </div>
          <div>
            <div class="green-light"></div><span>Present</span>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Roll No</th>
              <th>Student Name</th>
              <th>Attendance Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT user_form.roll, user_form.name, user_form.lname, attendance_status.status
            FROM user_form
            INNER JOIN attendance_status ON user_form.id = attendance_status.user_id";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["roll"] . "</td>";
                echo "<td>" . $row["name"] . " " . $row["lname"] . "</td>";

                $attendanceValue = $row["status"];
                echo "<td class='status-cell'>";
                if ($attendanceValue == 0) {
                  echo "<div class='red-light'></div>";
                } elseif ($attendanceValue == 1) {
                  echo "<div class='green-light'></div>";
                }
                echo "</td>";

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

    </div>
  </div>
</body>

</html>
