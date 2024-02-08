<?php
include 'config.php';
$selectedDate = date('Y-m');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedDate = $_POST['selectedDate'];

    if (isset($_POST['monthlyReport'])) {
        // Query to fetch attendance details for users with user type 'user' for the selected month
        $monthlyQuery = "SELECT user_form.id, user_form.roll, user_form.name, user_form.lname, 
                         COALESCE(SUM(attendance_status.status), 0) AS presentCount
                         FROM user_form
                         LEFT JOIN attendance_status ON user_form.id = attendance_status.user_id
                         AND DATE_FORMAT(attendance_status.timestamp, '%Y-%m') = '$selectedDate'
                         WHERE user_form.user_type = 'user'
                         GROUP BY user_form.id, user_form.roll, user_form.name, user_form.lname
                         ORDER BY roll ASC";

        $resultMonthly = mysqli_query($conn, $monthlyQuery);

        if ($resultMonthly && $resultMonthly->num_rows > 0) {
            $studentDetails = $resultMonthly->fetch_all(MYSQLI_ASSOC);
        } else {
            $studentDetails = [];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>

<body>
    <h5>Attendance Report</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Present Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($studentDetails)) {
                foreach ($studentDetails as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["roll"] . "</td>";
                    echo "<td>" . $row["name"] . " " . $row["lname"] . "</td>";
                    echo "<td>" . $row["presentCount"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>