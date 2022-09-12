<?php

require("../DB/dbhelper.php");
if (
     isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['phone'])
     && isset($_POST['password'])
     && isset($_POST['address'])
     && isset($_POST['role'])
) {
     switch ($_POST['role']) {
          case 'User':
               $role = 2;
               break;
          case 'Admin':
               $role = 1;
               break;
          default:
               echo "Vui lòng chọn quyền truy cập";
               exit();
               break;
     }
     $name = $_POST['name'];
     $sql = "SELECT name FROM user WHERE name = '$name'";
     $checkName =   executeResult($sql);
     if ($checkName) {
          echo
          "Tài khoản đã tồn tại!";
          exit();
     }
     $password = $_POST['password'];
     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];
     $create_at =
          date("Y/m/d");
     $sql =   "INSERT INTO `user` (`id`, `id_role`, `name`, `password`, `email`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '$role', '$name', '$hashed_password', '$email', '$phone', '$address', '$create_at', NULL, NULL)";
     execute($sql);
     echo
     "success";
     exit();
}
?>

<?php include("./component/header.php"); ?>

<body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
          <!-- Sidebar -->
          <?php include("./component/sideBar.php") ?>

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
               <!-- Main Content -->
               <div id="content position-relative">
                    <!-- Topbar -->
                    <?php include("./component/topNav.php") ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                         <!-- Page Heading -->
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
                         </div>

                         <div class="row">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="form_add_user">
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputName">Full Name</label>
                                                  <input required type="text" class="form-control" id="inputName"
                                                       placeholder="Full Name" name="name" />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputEmail">Email</label>
                                                  <input required type="email" class="form-control" id="inputEmail"
                                                       placeholder="Email" name="email" />
                                             </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputPhone">Phone number</label>
                                                  <input required type="phone" class="form-control" id="inputPhone"
                                                       placeholder="Phone Number" name="phone" />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputPassword">Password</label>
                                                  <input required type="password" class="form-control"
                                                       id="inputPassword" placeholder="Password" name="password" />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputAddress">Address</label>
                                             <input required type="text" class="form-control" id="inputAddress"
                                                  placeholder="1234 Main St" name="address" />
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-2">
                                                  <label for="inputState">Role</label>
                                                  <select id="inputState" class="form-control" name="role">
                                                       <option selected>Choose...</option>
                                                       <option>User</option>
                                                       <option>Admin</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <!-- /.container-fluid -->

               </div>
               <!-- End of Main Content -->

               <!-- Footer -->
               <?php include("./component/footer.php") ?>
               <!-- End of Footer -->
          </div>
          <!-- End of Content Wrapper -->
     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
     </a>

     <!-- Logout Modal-->
     <?php include("./component/logoutModal.php") ?>

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="js/sb-admin-2.min.js"></script>

     <script>
     $(document).ready(function() {
          $("#form_add_user").submit(function(event) {
               event.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "./addUsers.php",
                    data: $(this).serialize(),
                    success: function(response) {
                         if (response === "success") {
                              alert("Thêm tài khoản thành công")
                              location.reload();
                         } else
                              alert(response)
                    }
               })
          })
     });
     </script>

     </html>

</body>

</html>