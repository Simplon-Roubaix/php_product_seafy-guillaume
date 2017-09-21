<?php

function get_comment($url){
    global $pdo;

    $bdd = $pdo->prepare("SELECT id, blog_id,name, online, comment, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%i') AS date_commentaire FROM comments WHERE url_blog=?");
    $bdd->execute([$url]);
    $comments = $bdd->fetchAll();
    return $comments;
}
function get_single($url){
    global $pdo;
    $db = $pdo->prepare("SELECT  title,content, url, DATE_FORMAT(posted_at, '%d/%m/%Y à %Hh%i') AS date FROM blog WHERE url=?");
    $db->execute([$url]);
    $blog = $db->fetch();
    return $blog;

}