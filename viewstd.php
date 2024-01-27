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
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid d-flex p-0">
        <div class=" sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
            <div class="">
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
        </div>
        <div class="ms-4 me-4 mt-4 w-100">
            <div class="d-flex mb-4 justify-content-between">
                <a class="back-button btn-secondary" style="padding:5px 10px; height:36px" href="homepage.php">Back to
                    Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button"
                    style="padding:5px 10px; height:36px">Logout</a>
            </div>
            <h4>View Student</h4>
            <div class="student-list">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
               $sql = "SELECT roll, name, lname, gender, addr, num, email FROM user_form WHERE user_type = 'user' ORDER BY roll ASC";
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
                   echo "<tr><td colspan='8'>No data found</td></tr>";
               }
               $conn->close();
                ?>
            </tbody>
        </table>
        <a href="updateroll.php" class="btn btn-primary">Update</a>
    </div>
        </div>
    </div>
    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>