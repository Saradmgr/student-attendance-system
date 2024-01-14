<!DOCTYPE html>
<html>

<head>
    <title>Insert Operation in PHP MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $subject = $_POST['subject'];
        $teacher = $_POST['teacher'];
        $t1 = $_POST['t1'];
        $t2 = $_POST['t2'];

        $sql = "INSERT INTO teacher_form (subject, teacher, t1, t2) VALUES ('$subject', '$teacher', '$t1', '$t2')";

        if (mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
    ?>
    <?php
        $query = "SELECT * FROM teacher_form";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          die('Error in the query: ' . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
          echo "<table>";
          echo "<tr>
                <th>cid</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
              </tr>";

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['teacher'] . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t1'])) . "</td>";
            echo "<td>" . date("H:i", strtotime($row['t2'])) . "</td>";

            echo "</tr>";
          }
          echo "</table>";
        } else {
          echo "No data found.";
        }
        mysqli_close($conn);
        ?>

    <h1>Insert Operation in PHP MySQL</h1>
    <form method="post">
        <label>Subject name:</label>
        <input type="text" name="subject" placeholder="Enter Subject name" required><br>
        <label>Teacher name</label>
        <input type="text" name="teacher" placeholder="Enter teacher name" required><br>
        <label>Starting time</label><br>
        <input type="Time" name="t1" placeholder="Enter starting hour" required><br>
        <label>Ending time</label><br>
        <input type="Time" name="t2" placeholder="Enter ending hour" required><br>
        <input type="submit" name="submit" value="Insert">
    </form>
</body>

</html>
