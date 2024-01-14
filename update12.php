<?php
include 'config.php';

$message = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $roll = isset($_POST['roll']) ? (int)$_POST['roll'] : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : null;
    $addr = isset($_POST['addr']) ? mysqli_real_escape_string($conn, $_POST['addr']) : null;
    $num = isset($_POST['num']) ? (int)$_POST['num'] : null;

    $userTypeCheckSql = "SELECT user_type FROM user_form WHERE name='$name' AND lname='$lname'";
    $userTypeResult = mysqli_query($conn, $userTypeCheckSql);

    if ($userTypeResult && mysqli_num_rows($userTypeResult) > 0) {
        $userTypeRow = mysqli_fetch_assoc($userTypeResult);

        if ($userTypeRow['user_type'] == 'user') {
            if (!empty($_POST['addr'])) {
                $updateSql = "UPDATE user_form SET addr='$addr' WHERE name='$name' AND lname='$lname'";
                mysqli_query($conn, $updateSql);
            }

            if (!empty($_POST['email'])) {
                $updateSql = "UPDATE user_form SET email='$email' WHERE name='$name' AND lname='$lname'";
                mysqli_query($conn, $updateSql);
            }

            if (!empty($_POST['roll'])) {
                $updateSql = "UPDATE user_form SET roll='$roll' WHERE name='$name' AND lname='$lname'";
                mysqli_query($conn, $updateSql);
            }

            if (!empty($_POST['num'])) {
                $updateSql = "UPDATE user_form SET num='$num' WHERE name='$name' AND lname='$lname'";
                mysqli_query($conn, $updateSql);
            }

            $message = "Record updated successfully.";
        } elseif ($userTypeRow['user_type'] == 'admin') {
            $message = "Admin user type, skipping update.";
        } else {
            $message = "Invalid user_type.";
        }
    } else {
        $message = "Error checking user_type: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Operation in PHP MySQL</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #success-message {
            color: white;
            background-color: #dc3545;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
    </style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');
        document.querySelector('form').addEventListener('submit', function (e) {
            successMessage.style.display = 'block';
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 3000);
        });
    });
</script>

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
            <div>
                <h5>Update Student Details</h5>
                <div class="d-flex justify-content-center w-100">
                    <div class="form-container d-flex justify-content-center w-50">
                        <form method="post" id="update-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Enter First name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter first name of student">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addr" class="form-label">Update address</label>
                                        <input type="text" class="form-control" id="addr" name="addr"
                                            placeholder="Enter new address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Update email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter new email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lname" class="form-label">Enter last name</label>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            placeholder="Enter last name of student">
                                    </div>
                                    <div class="mb-3">
                                        <label for="roll" class="form-label">Update rollno</label>
                                        <input type="number" class="form-control" id="roll" name="roll"
                                            placeholder="Enter new rollno">
                                    </div>
                                    <div class="mb-3">
                                        <label for="num" class="form-label">Update Phone number</label>
                                        <input type="number" class="form-control" id="num" name="num"
                                            placeholder="Enter new phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" name="submit">Update All</button>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary" name="submit">Update Address</button>
                                <button type="submit" class="btn btn-primary ms-2" name="submit">Update Email</button>
                                <button type="submit" class="btn btn-primary ms-2" name="submit">Update Rollno</button>
                                <button type="submit" class="btn btn-primary ms-2" name="submit">Update Phone Number</button>
                            </div>
                            <div id="success-message" class="mt-2"><?php echo $message; ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>