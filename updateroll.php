<?php
include 'config.php';

// Define variables for the message
$message = "";
$messageClass = "";

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];

    // Check user_type before updating
    $checkUserTypeQuery = "SELECT user_type FROM user_form WHERE name='$name' AND lname='$lname'";
    $userTypeResult = mysqli_query($conn, $checkUserTypeQuery);

    if ($userTypeResult) {
        $userTypeRow = mysqli_fetch_assoc($userTypeResult);
        $userType = $userTypeRow['user_type'];

        if ($userType == 'user') {
            // Update the roll number only if user_type is 'user'
            $updateQuery = "UPDATE user_form SET roll='$roll' WHERE name='$name' AND lname='$lname'";

            if (mysqli_query($conn, $updateQuery)) {
                $message = "Record updated successfully.";
                $messageClass = "alert-success";
            } else {
                $message = "Error updating record: " . mysqli_error($conn);
                $messageClass = "alert-danger";
            }
        } else {
            $message = "Invalid user type.";
            $messageClass = "alert-warning";
        }
    } else {
        $message = "Error checking user type: " . mysqli_error($conn);
        $messageClass = "alert-danger";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Operation in PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Add custom styles for the message */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
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
                <a class="back-button btn-secondary" href="homepage.php">Back to Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button">Logout</a>
            </div>
            <!-- Display the message with dynamic class -->
            <div class="alert <?php echo $messageClass; ?>" role="alert">
                <?php echo $message; ?>
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
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script>
        // Automatically hide the message after 3 seconds
        setTimeout(function () {
            document.querySelector('.alert').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>
