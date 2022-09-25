<?php

require_once('../DB/dbhelper.php');
session_start();

if(isset($_SESSION['user'])){
  
}
$name = $_SESSION['user'];
$message = $_POST['message'];
$blogId =(int) $_POST['blogId'];
$create_date = date('Y-m-d H:i:s');
$thumb = $_SESSION['img'];
if ($name != null && $message != null) {
    $sql = "insert into comments (name_user, content, thumb, created_at, blog_id) 
        values ('$name','$message','$thumb','$create_date',$blogId)";
    execute($sql);

    $sql = "select * from comments where blog_id = $blogId order by created_at DESC";
    $list = executeResult($sql);
    foreach ($list as $item) {
      $tg = date_create($item['created_at']);
        echo '<li class="comment">
        <div class="vcard bio">
          <img src="' . $item['thumb'] . '" alt="Image placeholder">
        </div>
        <div class="comment-body">
          <h3>' . $item['name_user'] . '</h3>
          <div class="meta">' .date_format($tg, "H:i:a M d, Y") . '</div>
          <p>' . $item['content'] . '</p>
          
        </div>
      </li>';
    }
}
