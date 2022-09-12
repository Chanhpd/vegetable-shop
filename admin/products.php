<?php

require("../DB/dbhelper.php");

$item_per_page = 7;
$current_page = 1;
if (isset($_GET['page'])) {
     $current_page = $_GET['page'];
}
$offset = ($current_page - 1) * $item_per_page;
$sql = "SELECT * FROM `product` LIMIT $item_per_page  OFFSET $offset";
$dataProducts =  executeResult($sql);
$sql = "SELECT * FROM `product`";
$totalProducts = executeResult($sql);
$totalPage = ceil(count($totalProducts) / $item_per_page);

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
                         <h1 class="h3 mb-4 text-gray-800">Manager Products</h1>

                         <div class="row">
                              <div class="col-lg-12">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" class="text-center">Products ID</th>
                                                  <th scope="col" class="text-center">Image</th>
                                                  <th scope="col" class="text-center">Name</th>
                                                  <th scope="col" class="text-center col-3">Description</th>
                                                  <th scope="col" class="text-center">Price</th>
                                                  <th scope="col" class="text-center">Sale</th>
                                                  <th scope="col" class="text-center">Create at</th>
                                                  <th scope="col" class="text-center">Update at</th>
                                                  <th scope="col" class="text-center">Edit</th>
                                                  <th scope="col" class="text-center">Delete</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                             <?php foreach ($dataProducts as $product) {
                                             ?>
                                             <tr>
                                                  <th scope="row" class="text-center"><?php echo $product["id"] ?></th>
                                                  <td class="text-center wrap-img-product">
                                                       <img class="img-product" src=<?php echo $product["img"] ?>
                                                            alt="" />
                                                  </td>

                                                  <td class="text-center">
                                                       <?php echo $product["name"] ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <p class="description-product">
                                                            <?php echo $product["des"] ?>
                                                       </p>
                                                  </td>
                                                  <td class="text-center"><?php echo $product["price"] ?>$
                                                  </td>
                                                  <td class="text-center">
                                                       <?php echo ($product["sale"] ? $product["sale"] : 0) ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <?php echo $product["created_at"] ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <?php echo $product["updated_at"] ?>
                                                  </td>
                                                  <td class="text-center">
                                                       <a href="" class="p-2 btn-primary text-justify rounded"><i
                                                                 class="fa-solid fa-pen-to-square"></i></a>
                                                  </td>
                                                  <td class="text-center">
                                                       <a href="" class="p-2 btn-danger text-justify rounded"><i
                                                                 class="fa-solid fa-eraser"></i></a>
                                                  </td>
                                             </tr>
                                             <?php  } ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <nav aria-label="..." class="nav-pagination">
                              <ul class="pagination">


                                   <?php echo
                                   ' <li class="page-item ' . (($current_page - 1) < 1 ? "disabled" : "") . '">
                                        <a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a>
                                   </li>'
                                   ?>

                                   <?php for ($i = 1; $i <= $totalPage; $i++) {
                                        echo ' <li class="page-item ' . ($i == $current_page ? "active" : "") . ' "><a
                                             class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                   }
                                   ?>

                                   <?php echo
                                   ' <li class="page-item' . ($current_page + 1 > $totalPage ? " disabled" : "") . '">
                                        <a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a>
                                   </li>'
                                   ?>


                              </ul>
                         </nav>
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
     <script></script>
</body>

</html>