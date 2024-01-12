<!DOCTYPE html>
<html>

<head>
    <title>Update Operation in PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'config.php';
    // Check if the form was submitted
    // ...
    if (isset($_POST['submit'])) {
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $lname = $_POST['lname'];



        // SQL query to update the record
        $sql = "UPDATE user_form SET roll='$roll' WHERE name='$name' AND lname='$lname' ";
        // ...
    

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: ";
        }
    }
    ?>
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
            <h5>Update rollno</h5>
            <form method="post">
                <div class="w-100 d-flex justify-content-center">
                    <div class="form-container">

                        <div class="mb-3">
                            <label for="name" class="form-label">Enter First name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter first name of student">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Enter last name</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                placeholder="Enter last name of student">
                        </div>
                        <div class="mb-3">
                            <label for="roll" class="form-label">Update rollno.</label>
                            <input type="number" class="form-control" id="roll" name="roll"
                                placeholder="Enter new rollno." required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Teacher name</label>
                            <input type="text" class="form-control" id="teacherName" name="teacherName"
                                placeholder="Enter teacher name">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>