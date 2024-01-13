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
            <a class="back-button btn-secondary" href="homepage.php">Back to Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button">Logout</a>
            </div>
            <table class="table table-striped table-light table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll No.</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';

                    $currentDate = date("Y-m-d");
                    $sql = "SELECT user_form.id AS id, user_form.name AS name, user_form.lname AS lname, user_form.num AS num, attendance_requests.timestamp
                            FROM user_form
                            INNER JOIN attendance_requests ON user_form.id = attendance_requests.user_id
                            WHERE DATE(attendance_requests.timestamp) = '$currentDate'";
                    
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . " " . $row['lname'] . "</td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['num'] . "</td>";
                            echo "<td><div class='d-flex'>
                                <button type='button' class='btn btn-primary me-2'>Accept</button>
                                <button type='button' class='btn btn-danger'>Decline</button>
                                </div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data available</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
              </table>
        </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>
