<?php
require("../DB/dbhelper.php");
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$timeUpdated =
     date("Y/m/d");
$sql = "UPDATE user SET  name = '$name', email = '$email', phone = '$phone', address = '$address', updated_at = '$timeUpdated'  WHERE id = '$id'";
execute($sql);