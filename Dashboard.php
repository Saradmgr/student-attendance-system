<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitDate'])) {
    $selectedDate = $_POST['selectedDate'];
    $sql = "SELECT user_form.roll, user_form.name, user_form.lname, 
    COALESCE(attendance_status.status, 0) AS status
    FROM user_form
    LEFT JOIN attendance_status ON user_form.id = attendance_status.user_id
    AND DATE(attendance_status.timestamp) = '$selectedDate'
    WHERE user_form.user_type = 'user'";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        $studentDetails = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $studentDetails = [];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="Dashboard.css" />
  <link href="bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
  <div class="container-fluid d-flex p-0">
    <div class=" sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
      <div class="">
        <div class="dashboard-item" onclick="showSubjectDetails()">
          <label>Subjects</label>
        </div>

        <div class="dashboard-item" onclick="showStudentDetails()">
          <label>Total Students</label>
        </div>
      </div>
    </div>
    <div class="ms-4 me-4 mt-4 w-100">
      <div class="d-flex mb-4 justify-content-between">
        <a class="back-button btn-secondary" href="homepage.php">Back to Home</a>
      </div>

      <div class="">
        <div id="subjectDetails" class="hide">
          <div class="mb-2 d-flex align-items-center justify-content-between">
            <h4>View Student</h4>
            <div>
              <a href="update1.php" class="btn btn-primary">Update Information</a>
              <a href="update.php" class="btn btn-success">Add Information</a>
            </div>
          </div>
          <?php
                    $query = "SELECT * FROM teacher_form";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die('Error in the query: ' . mysqli_error($conn));
                    }
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='table'>";
                        echo "<thead>
                        <tr>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Starting Time</th>
                            <th>Ending Time</th>
                        </tr>
                    </thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['teacher'] . "</td>";
                            echo "<td>" . date("H:i", strtotime($row['t1'])) . "</td>";
                            echo "<td>" . date("H:i", strtotime($row['t2'])) . "</td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "No data found.";
                    }
                    ?>

        </div>


        <div id="studentDetails" class="hide">
          <div class="mb-2 d-flex align-items-center justify-content-between">
            <h4>Student Details</h4>
            <form method="post" action="">
                            <label>Select Date:</label>
                            <input type="date" name="selectedDate" required>
                            <input type="submit" name="submitDate" value="Submit">
                        </form>
            <div class="color-indicator">
              <div>
                <div class="red-light"></div><span>Absent</span>
              </div>
              <div>
                <div class="green-light"></div><span>Present</span>
              </div>
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
                            if (!empty($studentDetails)) {
                                foreach ($studentDetails as $row) {
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
                            ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>