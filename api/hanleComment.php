<?php

require_once('../DB/dbhelper.php');
$name = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];
$blogId =(int) $_POST['blogId'];
$create_date = date('Y-m-d H:i:s');

if ($name != null && $email != null && $message != null) {
    $sql = "insert into comments (name_user, email, content, thumb, created_at, blog_id) 
        values ('$name','$email','$message','person_1.jpg','$create_date',$blogId)";
    execute($sql);

    $sql = "select * from comments where blog_id = $blogId order by created_at DESC";
    $list = executeResult($sql);
    foreach ($list as $item) {
        echo '<li class="comment">
        <div class="vcard bio">
          <img src="images/' . $item['thumb'] . '" alt="Image placeholder">
        </div>
        <div class="comment-body">
          <h3>' . $item['name_user'] . '</h3>
          <div class="meta">' . $item['created_at'] . '</div>
          <p>' . $item['content'] . '</p>
          
        </div>
      </li>';
    }
}
