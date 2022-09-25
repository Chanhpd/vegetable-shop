<?php

require("../DB/dbhelper.php");

require('../vendor/autoload.php');
require("../config.php");

use Cloudinary\Api\Upload\UploadApi;

$sql = "SELECT name FROM `category`";
$dataCate = executeResult($sql);
if (
     isset($_POST['name'])
     && isset($_POST['price'])
     && isset($_POST['sale'])
     && isset($_POST['cate'])
     && isset($_POST['desc'])
     && isset($_POST['srcImg'])
) {
     $name = $_POST['name'];
     $typeCate = $_POST['cate'];
     $sql = "SELECT name, id FROM category WHERE name = '$typeCate'";
     $cate =   executeResult($sql, $onlyOne = true);
     $idCate = $cate['id'];
     $img =
          $_POST['srcImg'];
     $data =   (new UploadApi())->upload($img);
     $url = $data['secure_url'];
     $create_at = date("Y/m/d");
     $price = $_POST['price'];
     $sale = $_POST['sale'];
     $desc = $_POST['desc'];
     $sql =  "INSERT INTO `product` (`id`, `name`, `img`, `id_cate`, `price`, `sale`, `des`, `created_at`, `updated_at`, `deleted_at`, `size`, `status`) VALUES (NULL, '$name', '$url', '$idCate', '$price', '$sale', '$desc', '$create_at', NULL, NULL, NULL, NULL)";
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
                              <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
                         </div>

                         <div class="row">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="form_add_product">
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputName">Name Product</label>
                                                  <input type="text" class="form-control" required name="name" id="inputName" placeholder="Full Name" />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputImage">Image</label>
                                                  <input required type="file" class="form-control" onchange="readURL(this);" id="inputImage" accept="image/png, image/jpeg" />
                                                  <img alt="" hidden id="contain-img">
                                                  <!-- " -->
                                             </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputPrice">Price</label>
                                                  <input required type="number" name="price" class="form-control" id="inputPrice" placeholder="Price" />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputSale">Sale</label>
                                                  <input required type="number" name="sale" class="form-control" id="inputSale" placeholder="Sale" />
                                             </div>

                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputState">Category</label>
                                                  <select id="inputCate" name="cate" required class="form-control">
                                                       <option selected>Choose...</option>
                                                       <?php
                                                       foreach ($dataCate as $cate) {
                                                            echo "<option>$cate[name]</option>";
                                                       } ?>
                                                  </select>
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputState">Size</label>
                                                  <div class="form-check">
                                                       <input class="form-check-input" type="checkbox" value="" name="sizeM" id="sizeM" />
                                                       <label class="form-check-label" for="sizeM">
                                                            Size M
                                                       </label>
                                                  </div>

                                                  <div class="form-check">
                                                       <input class="form-check-input" name="sizeL" type="checkbox" value="" id="Size L" checked />
                                                       <label class="form-check-label" for="Size L">
                                                            Size L
                                                       </label>
                                                  </div>
                                                  <div class="form-check">
                                                       <input name="sizeXL" class="form-check-input" type="checkbox" value="" id="sizeXL" />
                                                       <label class="form-check-label" for="sizeXL">
                                                            Size XL
                                                       </label>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputDesc">Description</label>
                                             <textarea required type="text" name="desc" class="form-control" id="inputDesc" placeholder="Description" rows="5"></textarea>
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
                         url: "./addProducts.php",
                         data: {
                              name: $("#inputName").val(),
                              srcImg: $("#contain-img").attr('src'),
                              price: $("#inputPrice").val(),
                              sale: $("#inputSale").val(),
                              cate: $("#inputCate").val(),
                              desc: $("#inputDesc").val(),
                         },

                         success: function(response) {
                              if (response === "success") {
                                   alert("Thêm sản phẩm thành công")
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