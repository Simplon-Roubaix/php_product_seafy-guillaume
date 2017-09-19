<?php
function get_blog(){
    global $pdo;
    $bd = $pdo->prepare("SELECT url, title,content, online, comment, DATE_FORMAT(posted_at, '%d/%m/%Y à %Hh%i') AS date, COUNT(IF(online = '1', 1, NULL)) AS nb_coms FROM blog LEFT JOIN comments ON url_blog = blog.url GROUP BY blog_id ORDER BY posted_at DESC");
    $bd->execute();
    $blogs = $bd->fetchAll();
    return $blogs;
}