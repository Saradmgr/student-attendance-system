<?php

$conn = new mysqli('localhost', 'root', '', 'user_db') or
    die("Could not connect to mysql" . mysqli_error($conn));
