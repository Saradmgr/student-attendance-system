<?php
include 'config.php';
        include 'config.php';
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

          $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
          $result = mysqli_query($conn, $select);

          if (mysqli_num_rows($result) > 0) {
            $error[] = 'User already exists!';
          } else {
            if ($pass != $cpass) {
              $error[] = 'Passwords do not match!';
            } else {
                $pass = password_hash($pass, PASSWORD_BCRYPT);
              $insert = "INSERT INTO user_form(name, lname, gender, addr, num, email, password, user_type) VALUES('$name','$lname','$gender','$address','$number','$email','$pass','$user_type')";
              mysqli_query($conn, $insert);
              echo "Registered Successfully";
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
      <div id="registerstudent">
        <div class="form-container">
          <form action="" method="post">
            <?php
            if (isset($error)) {
              foreach ($error as $error) {
                echo '<span class="error-msg">' . $error . '</span>';
              };
            };
            ?>
            <input type="text" name="name" required placeholder="Enter your first name">
            <input type="text" name="lname" required placeholder="Enter your last name">
            <input type="text" name="gender" required placeholder="Enter your gender">
            <input type="number" name="num" required placeholder="Enter your phone number">
            <input type="text" name="addr" required placeholder="Enter your address">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <select name="user_type">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register" class="form-btn">
          </form>
        </div>
        <div id="result"></div>
      </div>
    </div>
  </div>
</body>

</html>