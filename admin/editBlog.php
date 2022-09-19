<?php
require("../DB/dbhelper.php");
require('../vendor/autoload.php');
require("../config.php");

use Cloudinary\Api\Upload\UploadApi;

$id = $_POST['id'];
$short = $_POST['short'];
$desc = $_POST['desc'];
$title = $_POST['title'];
$timeUpdate =
     date("Y/m/d");
$srcImg = $_POST['srcImg'];
$data =   (new UploadApi())->upload($srcImg);
$url = $data['secure_url'];




$sql = "UPDATE `blog` SET `title` = '$title', `short` = '$short',`thumbnail` = '$url', `des` = '$desc' , `update_at` = '$timeUpdate' WHERE `blog`.`id` = $id";
execute($sql);
exit();