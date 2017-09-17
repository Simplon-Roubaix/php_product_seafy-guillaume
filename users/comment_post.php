<?php
include '../library/includes.php';
session_start();
$content = $_POST['content'];
$autor = $_POST['autor'];
$url = $_POST['url'];
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
if (!empty($content) && preg_match('/^[a-zA-Z0-9_]+$/', $content)) {
    if (!empty($autor) && preg_match('/^[a-zA-Z0-9_]+$/', $autor)) {
        $db = $pdo->prepare("INSERT INTO comments SET url_blog = ?, name = ?, content = ?,  created_at = NOW(),online = ?");
        $db->execute([$url, $autor, $content, 0]);
        setFlash("votre message a été envoyer");
        header('Location: ../blog.php');
        die();
    }else{
        setFlash("Votre nom n'est pas valide", "danger");
        header('Location: ' . $referer);
        die();
    }
}else{
    setFlash("Contenu non autorisé", "danger");
    header('Location: ' . $referer);
    die();
}