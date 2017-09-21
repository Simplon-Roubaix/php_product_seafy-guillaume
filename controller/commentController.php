<?php
include_once '../model/Comment.php';
$comments = get_comment($url[1]);
$blog = get_single($url[1]);
include_once '../views/comments.php';