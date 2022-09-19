<?php

require("../DB/dbhelper.php");

$item_per_page = 7;
$current_page = 1;
if (isset($_GET['page'])) {
     $current_page = $_GET['page'];
}
$offset = ($current_page - 1) * $item_per_page;
$sql = "SELECT * FROM `blog` LIMIT $item_per_page  OFFSET $offset";
$dataBlog =  executeResult($sql);
$sql = "SELECT * FROM `blog`";
$totalBlog = executeResult($sql);
$totalPage = ceil(count($totalBlog) / $item_per_page);
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
                         <h1 class="h3 mb-4 text-gray-800">Manager Blog</h1>

                         <div class="row">
                              <div class="col-lg-12">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" class="text-center">Blog ID</th>
                                                  <th scope="col" class="text-center">Thumbnail</th>
                                                  <th scope="col" class="text-center">Title</th>
                                                  <th scope="col" class="text-center col-3">Short</th>
                                                  <th scope="col" class="text-center">Description</th>
                                                  <th scope="col" class="text-center">Update at</th>
                                                  <th scope="col" class="text-center">Edit</th>
                                                  <th scope="col" class="text-center">Delete</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                             <?php foreach ($dataBlog as $blog) {
                                             ?>
                                             <tr id="<?php echo $blog["id"] ?>">
                                                  <th scope="row" class="text-center"><?php echo $blog["id"] ?></th>
                                                  <td class="text-center wrap-img-product">
                                                       <img id="img" class="img-product"
                                                            src=<?php echo $blog["thumbnail"] ?> alt="" />
                                                  </td>

                                                  <td class="text-center" id="title">
                                                       <?php echo $blog["title"] ?>

                                                  </td>
                                                  <td class="text-center">
                                                       <p class="description-product" id="short">
                                                            <?php echo $blog["short"] ?>
                                                       </p>
                                                  </td>
                                                  <td class="text-center description-product" id="desc">
                                                       <?php echo $blog["des"] ?>
                                                  </td>
                                                  <td class="text-center" id="create_at">
                                                       <?php echo $blog["create_at"] ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <a id="btn-edit"
                                                            class="p-2 btn-primary text-justify rounded btn-edit"><i
                                                                 class="fa-solid fa-pen-to-square"
                                                                 onclick="handlerEdit(event, <?php echo $blog['id'] ?>)"></i></a>
                                                  </td>
                                                  <td class="text-center">
                                                       <a id="btn-delete" class="p-2 btn-danger text-justify rounded"
                                                            onclick="handlerDelete(<?php echo $blog['id'] ?>)"><i
                                                                 class=" fa-solid fa-eraser"></i></a>
                                                  </td>
                                             </tr>
                                             <?php  } ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <nav aria-label="..." class="nav-pagination"
                              <?php echo (count($totalBlog) > 7 ? "" : "hidden") ?>>

                              <ul class="pagination">
                                   <?php echo
                                   ' <li class="page-item ' . (($current_page - 1) < 1 ? "disabled" : "") . '">
                                        <a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a>
                                   </li>'
                                   ?> <?php for ($i = 1; $i <= $totalPage; $i++) {
                                             echo ' <li class="page-item ' . ($i == $current_page ? "active" : "") . ' "><a
                                             class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        ?> <?php echo
                                             ' <li class="page-item' . ($current_page + 1 > $totalPage ? " disabled" : "") . '">
                                        <a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a>
                                   </li>'
                                             ?> </ul>
                         </nav>
                    </div>
                    <!-- /.container-fluid -->

               </div>
               <!-- End of Main Content -->
               <!-- Begin modal edit product -->
               <div class="modal_edit">
                    <div class="edit">
                         <!-- Page Heading -->
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h3 mb-0">Edit Product</h1>
                         </div>
                         <div class="row text-black">
                              <!-- Pending Requests Card Example -->
                              <div class="col-12 mb-4">
                                   <form id="edit-form">
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="inputTitle">title</label>
                                                  <input type="text" class="form-control" id="inputTitle"
                                                       placeholder=" Title" required />
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="inputImg"><img alt="" id="contain-img"></label>
                                                  <input type="file" name="img" id="inputImg" hidden
                                                       onchange="readURL(this);" accept="image/*">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputShort">Short</label>
                                             <textarea required type="text" rows="2" class="form-control"
                                                  id="inputShort" placeholder="Short"> </textarea>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputDesc">Description</label>

                                             <textarea required type="text" class="form-control" rows="6" id="inputDesc"
                                                  placeholder="Description product"> </textarea>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <input type="hidden" id="hidden_id">
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- end modal edit product -->
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
                    // .width(150).height(200);
               };
               reader.readAsDataURL(input.files[0]);
          }
     }
     $(".modal_edit").click(function(event) {
          event.stopPropagation();
          $(".modal_edit").hide();
     })
     $(".edit").click(function(event) {
          event.stopPropagation();
     })

     function handlerEdit(e, id) {
          const blogEl = document.getElementById(id);
          const descBlog = blogEl.querySelector("#desc").innerText;
          const shortBlog = blogEl.querySelector("#short").innerText;
          const titleBlog = blogEl.querySelector("#title").innerText;
          const imgBlog = blogEl.querySelector("#img").src;

          $("#inputShort").val(shortBlog);
          $("#inputDesc").val(descBlog);
          $("#inputTitle").val(titleBlog);
          $("#contain-img").attr("src", imgBlog);
          $("#hidden_id").val(id);
          $(".modal_edit").show();
     }

     function handlerDelete(id) {
          $.ajax({
               type: "POST",
               url: "./deleteBlog.php",
               data: {
                    id: id
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
               url: "./editBlog.php",
               data: {
                    id: $("#hidden_id").val(),
                    short: $("#inputShort").val(),
                    desc: $("#inputDesc").val(),
                    title: $("#inputTitle").val(),
                    srcImg: $("#contain-img").attr('src'),
               },
               success: function() {
                    alert("Chỉnh sửa sản phẩm thành công")
                    location.reload();
               }
          })
     })
     </script>
</body>

</html>