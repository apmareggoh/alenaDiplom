<?php
/**
 * Created by PhpStorm.
 * User: армагеддон
 * Date: 13.05.2016
 * Time: 19:50
 */
ob_start();
session_start();
IF ($_SESSION['user']!='admin'){
    header("Location: ../adm/");
}

header("Location: /adm/news.php");
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');

if ($_GET['delete']) {
    $sql = 'DELETE FROM news WHERE id=' . $_GET['id'];
} else {
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $ext = substr($_FILES["image"]["name"], strpos($_FILES["image"]["name"], '.'), strlen($_FILES["image"]["name"]) - 1);
        $xxx = time() . "1" . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $dir . "/img/news/" . $xxx);
    } else {
        $xxx = '';
    }

    $_POST['id'] = $_POST['id'] ? $_POST['id'] : 'null';
    $sql = "insert INTO news(id, name, image, anons, detail, dt)
  VALUES ({$_POST['id']}, '{$_POST['name']}', '{$xxx}', '{$_POST['anons']}', '{$_POST['detail']}', '{$_POST['dt']}')
  ON DUPLICATE KEY UPDATE name=VALUES(name), image=VALUES(image), anons=VALUES(anons), detail=VALUES(detail), dt=VALUES(dt)";
}
//echo $sql;
$DB = new DB();
$DB->Query($sql);
$DB->close();