<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid d-flex p-0">
        <div class=" sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
            <div class="">
                <a href="dashboardstd.html">Dashboard</a>
                <a href="todays-schedule.php">Today's Schedule</a>
            </div>
        </div>
        <div class="ms-4 me-4 mt-4 w-100">
            <div class="d-flex mb-4 justify-content-between">
                <a class="back-button btn-secondary" href="dashboardstd.html">Back to Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button">Logout</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h4>Today's Schedule</h4>
            </div>
            <table class="table table-striped table-light table-hover">
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

        // Close the database connection
        mysqli_close($conn);
        ?>
        </div>
    </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>