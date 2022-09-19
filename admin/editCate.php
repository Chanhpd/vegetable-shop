 <?php
     require("../DB/dbhelper.php");
     require('../vendor/autoload.php');
     require("../config.php");

     use Cloudinary\Api\Upload\UploadApi;

     $id = $_POST['id'];
     $name = $_POST['name'];
     $timeUpdate =
          date("Y/m/d");
     $sql = "UPDATE `category` SET `name` = '$name', `updated_at` = '$timeUpdate' WHERE `category`.`id` = $id";
     execute($sql);