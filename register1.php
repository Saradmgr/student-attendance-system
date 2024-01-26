<?php
include 'config.php';

$errors = array();
$success_message = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['addr']);
    $number = mysqli_real_escape_string($conn, $_POST['num']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $errors[] = 'Passwords do not match!';
        } else {
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $insert = "INSERT INTO user_form(name, lname, gender, addr, num, email, password, user_type) VALUES('$name','$lname','$gender','$address','$number','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            $success_message = "Registered Successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #result-message {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
        }

        .error-message {
            background-color: #f44336;
        }
    </style>
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
                <a class="back-button btn-secondary" href="homepage.php" style="padding:5px 10px; height:36px">Back to
                    Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button"
                    style="padding:5px 10px; height:36px">Logout</a>
            </div>
            <div id="registerstudent" class="w-100 d-flex justify-content-center">
                <div class="form-container">
                    <form action="" method="post">
                        <?php
                        if (!empty($errors)) {
                            echo '<div id="result-message" class="error-message">';
                            foreach ($errors as $error) {
                                echo '<p>' . $error . '</p>';
                            }
                            echo '</div>';
                        } elseif (!empty($success_message)) {
                            echo '<div id="result-message">';
                            echo '<p>' . $success_message . '</p>';
                            echo '</div>';
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Enter your first name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="male" checked>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="female">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="other"
                                                value="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="gender" class="form-label">Enter your gender</label>
                                    <input type="text" class="form-control" id="gender" name="gender" required>
                                </div> -->
                                <div class="mb-3">
                                    <label for="addr" class="form-label">Enter your address</label>
                                    <input type="text" class="form-control" id="addr" name="addr" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Enter your password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="user_type" class="form-label">Select user type</label>
                                    <select class="form-select" id="user_type" name="user_type">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label">Enter your last name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="num" class="form-label">Enter your phone number</label>
                                    <input type="tel" class="form-control" id="num" name="num" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter your email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cpassword" class="form-label">Confirm your password</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" name="submit" value="Register" class="form-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script>
        // Display the result message for 3 seconds
        setTimeout(function () {
            document.getElementById('result-message').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>