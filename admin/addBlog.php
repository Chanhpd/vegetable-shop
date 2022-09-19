<?php

require("../DB/dbhelper.php");
require('../vendor/autoload.php');
require("../config.php");

use Cloudinary\Api\Upload\UploadApi;

$sql = "SELECT name FROM `category`";
$dataCate = executeResult($sql);
if (
     isset($_POST['title'])
     && isset($_POST['desc'])
     && isset($_POST['short'])
     && isset($_POST['srcImg'])
) {
     $title = $_POST['title'];
     $img =
          $_POST['srcImg'];
     $data =   (new UploadApi())->upload($img);
     $url = $data['secure_url'];
     $create_at =
          date("Y/m/d");
     $short = $_POST['short'];
     $desc = $_POST['desc'];
     $sql =  "INSERT INTO `blog` (`id`, `title`, `thumbnail`, `short`, `des`, `create_at`, `id_user`, `update_at`) VALUES (NULL, '$title', '$url', '$short', '$desc', '$create_at', '4', NULL);";
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
                              <h1 class="h3 mb-0 text-gray-800">Add Blog</h1>
                         </div>

                         <div class="row">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="form_add_product">
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputTitle">Title Blog</label>
                                                  <input type="text" class="form-control" required name="name"
                                                       id="inputTitle" placeholder="Full Title" />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputImage">Image</label>
                                                  <input required type="file" class="form-control"
                                                       onchange="readURL(this);" id="inputImage"
                                                       accept="image/png, image/jpeg" />
                                                  <img alt="" hidden id="contain-img">
                                                  <!-- " -->
                                             </div>
                                             <div class="form-group md-6 col-12">
                                                  <label for="inputShort">Short</label>
                                                  <textarea required type="text" name="desc" class="form-control"
                                                       id="inputShort" placeholder="Short" rows="3"></textarea>
                                             </div>
                                             <div class="form-group md-6 col-12">
                                                  <label for="inputDesc">Description</label>
                                                  <textarea required type="text" name="desc" class="form-control"
                                                       id="inputDesc" placeholder="Description" rows="5"></textarea>
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
     function readURL(input) {
          if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                    $('#contain-img').attr('src', e.target.result);
               };
               reader.readAsDataURL(input.files[0]);
          }
     }
     $(document).ready(function() {

          $("#form_add_product").submit(function(event) {
               event.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "./addBlog.php",
                    data: {
                         title: $("#inputTitle").val(),
                         srcImg: $("#contain-img").attr('src'),
                         desc: $("#inputDesc").val(),
                         short: $("#inputShort").val(),
                    },

                    success: function(response) {
                         if (response === "success") {
                              alert("Thêm Blog thành công")
                              location.reload();
                         } else
                              alert(response)
                    }
               })
          })
     });
     </script>
</body>

</html>