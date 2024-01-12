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
            <div>
                <h5>Update Student Details</h5>
                <div class="d-flex justify-content-center w-100">
                    <div class="form-container d-flex justify-content-center w-50">
                        <form method="post">
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
                                            placeholder="Enter new address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Update email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter new email" required>
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
                                            placeholder="Enter new rollno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="num" class="form-label">Update Phone number</label>
                                        <input type="number" class="form-control" id="num" name="num"
                                            placeholder="Enter new phone number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="back-button">
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
    </form> -->
    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>