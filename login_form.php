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
   <link href="bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="login.css">
   <script src="d1f255366e.js" crossorigin="anonymous"></script>
</head>

<body>
   <div class="">
      <div class="container py-5">
         <div class="row">
            <div class="col-md-6">
               <img src="undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
               <div class="row justify-content-center">
                  <div class="col-md-8">
                     <div class="mb-4">
                        <h3>Log In</h3>
                     </div>
                     <form action="" method="post">
                        <div class="form-group first mb-4">
                           <label for="username">Username</label>
                           <input type="email" class="form-control" name="email" required placeholder="Enter your email"
                              autocomplete="off">
                        </div>

                        <div class="form-group last mb-4">
                           <label for="password">Password</label>
                           <div class="input-group mb-3">
                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                              <input class="form-control" id="password" name="password" placeholder="Password" value="">
                              <span class="input-group-text">
                                 <i class="far fa-eye" id="togglePassword" onclick="togglePassword()"
                                    style="cursor: pointer"></i>
                              </span>
                           </div>
                        </div>
                        <input type="submit" value="Log In" name="submit" class="btn btn-block btn-primary">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
   <script src="bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"></script>
</body>

</html>