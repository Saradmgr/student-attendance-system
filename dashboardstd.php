<?php
include 'config.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login_form.php');
    exit();
}

$user_id = $_SESSION['id'];
$sql = "SELECT name, lname, gender, num, email FROM user_form WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $lname = $row['lname'];
    $num = $row['num'];
    $gender = $row['gender'];
    $email = $row['email'];
} else {
    $name = $lname = $gender = $num = $email = "Not available";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

    <div class="container-fluid d-flex p-0">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
            <div>
                <a href="dashboardstd.php">Dashboard</a>
                <a href="todays-schedule.php">Today's Schedule</a>
            </div>
        </div>
        <div class="ms-4 me-4 mt-4 w-100">
            <div class="d-flex mb-4 justify-content-between">
                <a href="login_form.php" class="btn btn-outline-primary back-button">Logout</a>
            </div>
            <div class="d-flex align-items-center">
                <h4>Attendance Request:</h4>
                <form action="attendance_request.php" method="post">
                    <button type="submit" name="request_attendance" class="btn btn-primary">Request Attendance</button>
                </form>
            </div>
            <div class="card mt-4 py-4 px-2" style="width: 18rem;">
                <div class="img-wrapper">
                    <img src="man.png" class="card-img-top" alt="Student Profile Picture">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $name . " " . $lname; ?></h5>
                    <p class="card-text">Gender: <?php echo $gender; ?></p>
                    <p class="card-text">num: <?php echo $num; ?></p>
                    <p class="card-text">Email: <?php echo $email; ?></p>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
