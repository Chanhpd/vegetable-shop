<?php

require("../DB/dbhelper.php");

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