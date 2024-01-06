<!DOCTYPE html>
<html>

<head>
    <title>Update Operation in PHP MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
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

    <h1>Update rollno</h1>
    <form method="post">
        <label>Enter First name</label>
        <input type="text" name="name" placeholder="Enter first name of student">
        <label>Enter last name</label>
        <input type="text" name="lname" placeholder="Enter last name of student">
        <label>Update rollno.</label>
        <input type="number" name="roll" placeholder="Enter new rollno." required><br>
        <label>Teacher name</label>
        <input type="submit" name="submit" value="Update">
    </form>

</body>

</html>