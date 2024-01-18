<!DOCTYPE html>
<html>

<head>
  <title>Update Operation in PHP MySQL</title>
  <link href="bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <?php
  include 'config.php';
  if (isset($_POST['submit'])) {
    $id = $_POST['cid'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];

    $sql = "UPDATE teacher_form SET cid='$id', subject='$subject', teacher='$teacher', t1='$t1', t2='$t2' WHERE cid='$id'";

    if (mysqli_query($conn, $sql)) {
      echo "";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }
  ?>

  <div class="container">
    <h4 class="mt-5">Update Operation in PHP MySQL</h4>
    <div class="row">

      <div class="col-lg-8">
        <?php
        $query = "SELECT * FROM teacher_form";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          die('Error in the query: ' . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
          echo "<table class='table mt-2 table-striped table-hover'>";
          echo "<thead>
                <tr>
                    <th>cid</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Starting Time</th>
                    <th>Ending Time</th>
                </tr>
              </thead>";
          echo "<tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['teacher'] . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t1'])) . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t2'])) . "</td>";
            echo "</tr>";
          }

          echo "</tbody>";
          echo "</table>";
        } else {
          echo "No data found.";
        }
        mysqli_close($conn);
        ?>
      </div>
      <div class="col-lg-4">
        <form method="post" class="mt-3 card py-3 px-3">
          <div class="mb-2">
            <label>ID</label>
            <input type="number" name="cid" class="form-control" placeholder="Enter class id">
          </div>
          <div class="mb-2">

          </div>
          <div class="mb-2">
            <label>Subject name:</label>
            <input type="text" name="subject" class="form-control" placeholder="Enter Subject name" required>
          </div>
          <div class="mb-2">
            <label>Teacher name</label>
            <input type="text" name="teacher" class="form-control" placeholder="Enter teacher name" required>
          </div>
          <div class="mb-2">
            <label>Starting time</label>
            <input type="time" name="t1" class="form-control" placeholder="Enter starting hour" required>
          </div>
          <div class="mb-2">
            <label>Ending time</label>
            <input type="time" name="t2" class="form-control" placeholder="Enter ending hour" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>