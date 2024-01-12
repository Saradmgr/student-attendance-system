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
                    <th scope="col">S.N.</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Roll No.</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Maria</td>
                    <td>1</td>
                    <td>9802314441</td>
                    <td><div class="d-flex">
                        <button type="button" class="btn btn-primary me-2">Accept</button>
                        <button type="button" class="btn btn-danger">Decline</button>
                    </div></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Ram</td>
                    <td>2</td>
                    <td>9802314441</td>
                    <td><div class="d-flex">
                        <button type="button" class="btn btn-primary me-2">Accept</button>
                        <button type="button" class="btn btn-danger">Decline</button>
                    </div></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Shyam</td>
                    <td>3</td>
                    <td>9802314441</td>
                    <td><div class="d-flex">
                        <button type="button" class="btn btn-primary me-2">Accept</button>
                        <button type="button" class="btn btn-danger">Decline</button>
                    </div></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Bigendra</td>
                    <td>4</td>
                    <td>9802314441</td>
                    <td><div class="d-flex">
                        <button type="button" class="btn btn-primary me-2">Accept</button>
                        <button type="button" class="btn btn-danger">Decline</button>
                    </div></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Shikshya</td>
                    <td>5</td>
                    <td>9802314441</td>
                    <td><div class="d-flex">
                        <button type="button" class="btn btn-primary me-2">Accept</button>
                        <button type="button" class="btn btn-danger">Decline</button>
                    </div></td>
                  </tr>
                  <!-- Add more rows with dummy data as needed -->
                </tbody>
              </table>
        </div>
    </div>
    </div>

    <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>