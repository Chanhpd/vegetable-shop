<?php
Session_start();
Session_destroy();
header('Location: login.php');

?>