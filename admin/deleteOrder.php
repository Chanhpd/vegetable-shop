 <?php
     require("../DB/dbhelper.php");
     if (isset($_POST['idOrderDetail'])) {
          $id = $_POST['idOrderDetail'];
          $sql = "DELETE FROM order_details WHERE id='$id'";
          execute($sql);
     }