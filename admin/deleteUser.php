<?php
require("../DB/dbhelper.php");
if (isset($_POST['idUser'])) {
     $id = $_POST['idUser'];
     $sql = "DELETE FROM user WHERE id='$id'";
     execute($sql);
}