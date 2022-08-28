<?php
require "../DB/dbhelper.php";
session_start();
$message = [];
if (isset($_POST['user-name']) && isset($_POST['password'])) {
     $user = $_POST['user-name'];
     $password = $_POST['password'];
     $sql = "SELECT username, password from admin WHERE username = '$user'";

     $response =
          executeResult($sql);
     if ($response) {
          $data = $response[0];
          $checkPass = password_verify($password, $data['password']);
          if ($checkPass) {
               $_SESSION['admin'] =
                    $user;
               $message['type'] = 1;
          } else {
               $message['error'] = "vui lòng nhập đúng mật khẩu!";
          }
     } else {
          $message['error'] = "Tài khoản không tồn tại!";
     }
     echo json_encode($message);
     exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>SB Admin 2 - Login</title>

     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <link rel="stylesheet" href="./css/style.css">
     <style>
     .text-error {
          color: red;
          margin-left: 8px;
     }
     </style>
</head>

<body class="bg-gradient-primary">
     <div class="container bg-while mt-8">
          <!-- <div class="row justify-content-center">
               <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Admin</h2>
               </div>
          </div> -->
          <div class="row justify-content-center">
               <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                         <div class="icon d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-user-large"></i>
                         </div>
                         <h3 class="text-center mb-4">Sign In</h3>
                         <form action="" class="login-form" id="login-form">

                              <div class="form-group">
                                   <input type="text" class="form-control  rounded-left" placeholder="Username"
                                        name="user-name" required>

                              </div>
                              <div class="form-group d-flex">
                                   <input type="password" class="form-control rounded-left" placeholder="Password"
                                        required name="password">
                              </div>
                              <span class="text-error"></span>
                              <div class="form-group">
                                   <button class="form-control btn btn-primary rounded submit px-3"
                                        name="submit">Login</button>
                              </div>
                              <div class="form-group d-md-flex">
                                   <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                             <input type="checkbox" checked name="check-remember">
                                             <span class="checkmark"></span>
                                        </label>
                                   </div>
                                   <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="js/sb-admin-2.min.js"></script>
     <script>
     $(document).ready(function() {
          $("#login-form").submit(function(event) {
               event.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "./index.php",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function(response) {
                         var data = JSON.parse(response);
                         if (data["type"]) {
                              window.location.href = "./dashboard.php";
                         } else {
                              $(".text-error").html(data['error']);
                         }
                    }
               });
          });
     });
     </script>
</body>

</html>