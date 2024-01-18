<?php
include 'config.php';

$currentDate = date("Y-m-d");
$sql = "SELECT user_form.id AS id, user_form.name AS name, user_form.lname AS lname, 
        IFNULL(user_form.roll, 'N/A') AS roll, user_form.num AS num, 
        attendance_requests.timestamp,
        attendance_status.status
        FROM user_form
        LEFT JOIN attendance_requests ON user_form.id = attendance_requests.user_id
        LEFT JOIN attendance_status ON user_form.id = attendance_status.user_id AND DATE(attendance_status.timestamp) = '$currentDate'
        WHERE DATE(attendance_requests.timestamp) = '$currentDate'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Sheet</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oZbNUtFV1B83K6zLhJIjt9BXFp1IAFc8h04w6YtA5Ax6yO5QFhzW8GD7j9F7MOdR" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid d-flex p-0">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . " " . $row['lname'] . "</td>";
                            echo "<td>" . $row['roll'] . "</td>";
                            echo "<td>" . $row['num'] . "</td>";

                            echo "<td>";
                            if (!is_null($row['status'])) {
                                if ($row['status'] == 1) {
                                    echo "Accepted";
                                } elseif ($row['status'] == 0) {
                                    echo "Declined";
                                } else {
                                    echo "Pending";
                                }
                            } else {
                                echo "Pending";
                            }
                            echo "</td>";

                            echo "<td>";
                            if (is_null($row['status']) || $row['status'] == 2) {
                                echo "<form class='action-form' action='process_attendance.php' method='post'>";
                                echo "<input type='hidden' name='userId' value='" . $row['id'] . "'>";
                                echo "<button type='submit' name='accept' class='btn btn-primary'>Accept</button>";
                                echo "<button type='submit' name='decline' class='btn btn-danger'>Decline</button>";
                                echo "</form>";
                            }
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
