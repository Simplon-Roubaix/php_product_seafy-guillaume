<?php
function get_blog(){
    $pdo = connect();
    $bd = $pdo->prepare("SELECT url, title,content, online, comment, DATE_FORMAT(posted_at, '%d/%m/%Y à %Hh%i') AS date, COUNT(IF(online = '1', 1, NULL)) AS nb_coms FROM blog LEFT JOIN comments ON url_blog = blog.url GROUP BY blog_id ORDER BY posted_at DESC");
    $bd->execute();
    $blogs = $bd->fetchAll();
    return $blogs;
}
function get_comment($url){
    $pdo = connect();
    $bdd = $pdo->prepare("SELECT id, blog_id,name, online, comment, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%i') AS date_commentaire FROM comments WHERE url_blog=?");
    $bdd->execute([$url]);
    $comments = $bdd->fetchAll();
    return $comments;
}
function get_single($url){
    $pdo = connect();
    $db = $pdo->prepare("SELECT  title,content, url, DATE_FORMAT(posted_at, '%d/%m/%Y à %Hh%i') AS date FROM blog WHERE url=?");
    $db->execute([$url]);
    $blog = $db->fetch();
    return $blog;

}
function verify_url($url){
    $pdo = connect();
    $db = $pdo->prepare("SELECT * FROM blog WHERE url = ?");
    $db->execute([$url]);
    $verif = $db->fetch();
    return $verif;
}