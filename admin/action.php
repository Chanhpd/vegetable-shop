<?php
require "../DB/dbhelper.php";
$error = "";
if (isset($_POST['submit'])) {
     header("Location: ./category.php");
}
echo "hello";