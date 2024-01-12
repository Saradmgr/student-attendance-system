<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = "SELECT id, password, user_type FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];

            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                header('location:homepage.php');
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                header('location:dashboardstd.php');
            }
        } else {
            $error[] = 'Incorrect email or password!';
        }
    } else {
        $error[] = 'User not found!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

   <div class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <input type="email" name="email" required placeholder="Enter your email" autocomplete="off">
         <div class="password-container">
            <input type="password" name="password" id="password" required placeholder="Enter your password" autocomplete="off">
            <span class="toggle-password" onclick="togglePassword()">Show</span>
         </div>
         <input type="submit" name="submit" value="Login Now" class="form-btn">
      </form>
   </div>

   <script>
      function togglePassword() {
         var passwordInput = document.getElementById("password");
         var toggleIcon = document.querySelector(".toggle-password");

         if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.textContent = "Hide";
         } else {
            passwordInput.type = "password";
            toggleIcon.textContent = "Show";
         }
      }
   </script>

</body>

</html>
