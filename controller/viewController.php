<?php
include_once '../model/Comment.php';
$verif = verify_url($url[1]);
if(isset($verif->url) && $url[1] == $verif->url){
    $blog = get_single($url[1]);
    $comments = get_comment($url[1]);  
}else{
    require '../views/404.php';
    die();
}
include_once '../views/comments.php';