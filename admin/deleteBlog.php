 <?php
     require("../DB/dbhelper.php");
     if (isset($_POST['id'])) {
          $id = $_POST['id'];
          $sql = "DELETE FROM blog WHERE id='$id'";
          execute($sql);
     }