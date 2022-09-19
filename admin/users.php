<?php

require("../DB/dbhelper.php");
$sql = "select * from user";
$dataUsers =
     executeResult($sql);
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
                    <div class="container-fluid ">
                         <!-- Page Heading -->
                         <h1 class="h3 mb-4 text-gray-800">Manager Users</h1>

                         <div class="row">
                              <div class="col-lg-12">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" class="text-center">Customer ID</th>
                                                  <th scope="col" class="text-center">Role</th>
                                                  <th scope="col" class="text-center">Full Name</th>
                                                  <th scope="col" class="text-center">Email</th>
                                                  <th scope="col" class="text-center">Phone</th>
                                                  <th scope="col" class="text-center">Address</th>
                                                  <th scope="col" class="text-center">Create at</th>
                                                  <th scope="col" class="text-center">Update up</th>


                                                  <th scope="col">Edit</th>
                                                  <th scope="col">Delete</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             foreach ($dataUsers as $user) {
                                             ?>
                                             <tr id="<?php echo $user["id"] ?>">
                                                  <th scope="row" class="text-center id_user">
                                                       <?php echo $user["id"] ?></th>
                                                  <th class="text-center" id="role">
                                                       <?php echo ($user["id_role"] == 1) ?  "admin" :  "user" ?>
                                                  </th>
                                                  <td id="name" class="text-center"><?php echo $user["name"] ?>
                                                  </td>
                                                  <td id="email" class="text-center"><?php echo $user["email"] ?>
                                                  </td>
                                                  <td id="phone" class="text-center"><?php echo $user["phone"] ?>
                                                  </td>
                                                  <td id="address" class="text-center"><?php echo $user["address"] ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <?php echo $user["created_at"] ?></td>
                                                  <td class="text-center">
                                                       <?php echo $user["updated_at"] ?></td>
                                                  <td>
                                                       <a id="btn-edit"
                                                            class="p-2 btn-primary text-justify rounded btn-edit"><i
                                                                 class="fa-solid fa-pen-to-square"
                                                                 onclick="handlerEditUer(event, <?php echo $user['id'] ?>)"></i></a>
                                                  </td>
                                                  <td>
                                                       <a id="btn-delete" class="p-2 btn-danger text-justify rounded"
                                                            onclick="handlerDeleteUer(<?php echo $user['id'] ?>)"><i
                                                                 class=" fa-solid fa-eraser"></i></a>
                                                  </td>
                                             </tr>
                                             <?php } ?>

                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
                    <!-- /.container-fluid -->

               </div>
               <!-- End of Main Content -->
               <!-- Begin modal edit user -->
               <div class="modal_edit ">
                    <div class="edit">
                         <!-- Page Heading -->
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h3 mb-0">Edit Users</h1>
                         </div>

                         <div class="row text-black">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="edit-form">
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputName">Name</label>
                                                  <input type="text" class="form-control" id="inputName"
                                                       placeholder="Full Name" required />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputEmail">Email</label>
                                                  <input required type="email" class="form-control" id="inputEmail"
                                                       placeholder="Email" />
                                             </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputPhone">Phone number</label>
                                                  <input required type="phone" class="form-control" id="inputPhone"
                                                       placeholder="Phone Number" />
                                             </div>

                                        </div>
                                        <div class="form-group">
                                             <label for="inputAddress">Address</label>
                                             <input required type="text" class="form-control" id="inputAddress"
                                                  placeholder="1234 Main St" />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <input type="hidden" id="hidden_id">
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- end modal edit user -->
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
     $(".modal_edit").click(function(event) {
          event.stopPropagation();
          $(".modal_edit").hide();
     })
     $(".edit").click(function(event) {
          event.stopPropagation();
     })

     function handlerEditUer(e, id) {
          const userEl = document.getElementById(id);
          const nameUser = userEl.querySelector("#name").innerText;
          const emailUSer = userEl.querySelector("#email").innerText;
          const phoneUser = userEl.querySelector("#phone").innerText;
          const addressUser = userEl.querySelector("#address").innerText;

          $("#inputName").val(nameUser);
          $("#inputPhone").val(phoneUser);
          $("#inputEmail").val(emailUSer);
          $("#inputAddress").val(addressUser);
          $("#hidden_id").val(id);
          $(".modal_edit").show();
     }

     function handlerDeleteUer(id) {
          $.ajax({
               type: "POST",
               url: "./deleteUser.php",
               data: {
                    idUser: id
               },
               success: function() {
                    location.reload();
               }
          })
     }
     $("#edit-form").submit(function(event) {
          event.preventDefault();
          $.ajax({
               type: "POST",
               url: "./editUser.php",
               data: {
                    id: $("#hidden_id").val(),
                    name: $("#inputName").val(),
                    email: $("#inputEmail").val(),
                    phone: $("#inputPhone").val(),
                    address: $("#inputAddress").val(),
               },
               success: function() {
                    location.reload();
               }
          })
     })
     </script>
</body>

</html>