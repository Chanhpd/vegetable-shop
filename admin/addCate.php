 <?php

     require("../DB/dbhelper.php");
     if (
          isset($_POST['name'])
     ) {

          $name = $_POST['name'];
          $sql = "SELECT name FROM category WHERE name = '$name'";
          $checkName =   executeResult($sql);
          if ($checkName) {
               echo
               "Đã tồn tại category này!";
               exit();
          }
          $create_at =
               date("Y/m/d");
          $sql =   "INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, '$name', '$create_at', NULL);";
          execute($sql);
          echo
          "success";
          exit();
     }
     ?>