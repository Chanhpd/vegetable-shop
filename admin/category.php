<?php

require("../DB/dbhelper.php");
$sql = "SELECT * FROM `category`";
$dataCate = executeResult($sql);
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
                         <h1 class="h3 mb-4 text-gray-800">Manager Category</h1>

                         <div class="row">
                              <div class="col-lg-12">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" class="text-center">Category ID</th>
                                                  <th scope="col" class="text-center col-3">
                                                       Category Name
                                                  </th>
                                                  <th scope="col" class="text-center col-3">Date Create</th>
                                                  <th scope="col" class="text-center col-3">Date Update</th>
                                                  <th scope="col" class="text-center">Edit</th>

                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             foreach ($dataCate as $cate) {
                                                  echo '   <tr id=' . $cate['id'] . '>
                                                  <th scope="row" class="text-center">' . $cate['id'] . '</th>
                                                  <th class="text-center" id="name">' . $cate['name'] . '</th>
                                                  <td class="text-center">' . $cate['created_at'] . '</td>
                                                  <td class="text-center">' . $cate['updated_at'] . '</td>
                                                  <td class="text-center">
                                                       <a  class="p-2 btn-primary text-justify rounded"><i
                                                                 class="fa-solid fa-pen-to-square"
                                                                 onclick="handlerEdit(event,' . $cate['id'] . ')"></i></a>
                                                       <a  class="p-2 btn-danger text-justify rounded"
                                                       onclick="handlerDelete(' . $cate['id'] . ')"
                                                       ><i
                                                                 class="fa-solid fa-eraser"></i></a>
                                                  </td>
                                             </tr>';
                                             }
                                             ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="row mb-5">
                              <div class="col-lg-12">
                                   <form id="form_add_cate">
                                        <div class="form-group">
                                             <label for="category_name">Name category</label>
                                             <input type="text" id="category_name" class="form-control" />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-secondary">
                                             Cancel
                                        </button>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <!-- /.container-fluid -->
               </div>
               <!-- End of Main Content -->
               <!-- Begin modal edit cate -->

               <div class="modal_edit">
                    <div class="edit">
                         <!-- Page Heading -->
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h3 mb-0">Edit Category</h1>
                         </div>

                         <div class="row text-black">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="edit-form">
                                        <div class="form-row">
                                             <div class="form-group col-12 md-6">
                                                  <label for="inputName">Name Category</label>
                                                  <input type="text" class="form-control" id="inputName"
                                                       placeholder="Name" required />
                                             </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <input type="hidden" id="hidden_id">
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
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
     $("#form_add_cate").submit(function(event) {
          event.preventDefault();
          $.ajax({
               type: "POST",
               url: "./addCate.php",
               data: {
                    name: $("#category_name").val(),
               },
               success: function(response) {
                    if (response.trim() === "success") {
                         alert("Thêm thành công")
                         location.reload();
                    } else {
                         alert(response)
                    }
               }
          })
     })

     function handlerDelete(id) {
          alert("Bạn có chắc chắn muốn xóa category này!");
          $.ajax({
               type: "POST",
               url: "./deleteCate.php",
               data: {
                    idCate: id
               },
               success: function() {
                    location.reload();
               }
          })
     }

     $(".modal_edit").click(function(event) {
          event.stopPropagation();
          $(".modal_edit").hide();
     })
     $(".edit").click(function(event) {
          event.stopPropagation();
     })

     function handlerEdit(event, id) {
          const cateEl = document.getElementById(id);
          const nameCate = cateEl.querySelector("#name").innerText;
          $("#inputName").val(nameCate);
          $("#hidden_id").val(id);
          $(".modal_edit").show();
     }
     $("#edit-form").submit(function(event) {
          event.preventDefault();
          $.ajax({
               type: "POST",
               url: "./editCate.php",
               data: {
                    id: $("#hidden_id").val(),
                    name: $("#inputName").val(),
               },
               success: function(res) {
                    console.log(res);
                    alert("Chỉnh sửa sản phẩm thành công")
                    location.reload();
               }
          })
     })
     </script>
</body>

</html>