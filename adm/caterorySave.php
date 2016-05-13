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

header("Location: /adm/categories.php");
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');

if ($_GET['delete']) {
    $sql = 'DELETE FROM categories WHERE id=' . $_GET['id'];
} else {
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $ext = substr($_FILES["image"]["name"], strpos($_FILES["image"]["name"], '.'), strlen($_FILES["image"]["name"]) - 1);
        $xxx = time() . "1" . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $dir . "/img/product/" . $xxx);
    } else {
        $xxx = '';
    }

    $_POST['id'] = $_POST['id'] ? $_POST['id'] : 'null';
    $sql = "insert INTO categories(id, name, image, anons, detail, url)
  VALUES ({$_POST['id']}, '{$_POST['name']}', '{$xxx}', '{$_POST['anons']}', '{$_POST['detail']}', '{$_POST['url']}')
  ON DUPLICATE KEY UPDATE name=VALUES(name), image=VALUES(image), anons=VALUES(anons), detail=VALUES(detail), url=VALUES(url)";
}
//echo $sql;
$DB = new DB();
$DB->Query($sql);
$DB->close();