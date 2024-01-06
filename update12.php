<?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $roll = $_POST['roll'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $num = $_POST['num'];
        $name = $_POST['name'];
        $lname = $_POST['lname'];

        $sql = "UPDATE user_form SET roll='$roll', email='$email', addr='$addr', num='$num' WHERE name='$name' AND lname='$lname'";


        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: ";
        }
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Operation in PHP MySQL</title>
    <link rel="stylesheet" href="homepage.css">
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
    <h1>Update Student Details</h1><br> 
    <br>
    <form method="post">
      <br>
        <label>Enter First name</label><br>
        <input type="text" name="name" placeholder="Enter first name of student"><br>
        <label>Enter last name</label><br>
        <input type="text" name="lname" placeholder="Enter last name of student"><br>
        <label>Update address.</label><br>
        <input type="text" name="addr" placeholder="Enter new address" required><br>
        <label>Update rollno.</label><br>
        <input type="number" name="roll" placeholder="Enter new rollno." required><br>
        <label>Update email.</label><br>
        <input type="email" name="email" placeholder="Enter new email." required><br>
        <label>Update Phone number</label><br>
        <input type="number" name="num" placeholder="Enter new phone number" required><br>
        <input type="submit" name="submit" value="Update">
    </form>

</body>

</html>