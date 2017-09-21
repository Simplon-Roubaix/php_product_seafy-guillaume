<?php
include_once '../model/Blog.php';
$blogi = get_blog();
if(isset($url[1])){
    $comment = get_comment($url[1]);
    require '../views/comments.php';
}
include '../views/blog.php';