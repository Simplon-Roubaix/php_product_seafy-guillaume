<?php
    $conf = 'default';
    $confdb = Conf::$databases[$conf];
try {
     $pdo = new PDO(
        'mysql:host=' . $confdb['host'] . ';dbname=' . $confdb['database'] . ';',
        $confdb['login'],
        $confdb['password']
    );
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo 'Impossible de se connecter à la base de donnée';
    echo $e->getMessage();
    die();
}

