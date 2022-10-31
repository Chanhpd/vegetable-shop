 <?php
     require("../DB/dbhelper.php");
     if (isset($_POST['idCate'])) {
          $id = $_POST['idCate'];
          $sql = "SELECT product.id from product, category WHERE id_cate = $id";
          $listIdProduct =  executeResult($sql);
          if ($listIdProduct) {
               echo "error";
               exit();
          } else {
               $sql = "DELETE FROM category WHERE id=$id";
               execute($sql);
               echo "success";
               exit();
          }
     }