<?php
require("../DB/dbhelper.php");
if (isset($_POST['idProduct'])) {
     $id = $_POST['idProduct'];
     $sql = "DELETE FROM product WHERE id='$id'";
     execute($sql);
}