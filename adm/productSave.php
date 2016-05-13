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

header("Location: /adm/products.php");
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');

if ($_GET['delete']) {
    $sql = 'DELETE FROM products WHERE id=' . $_GET['id'];
} else {
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $ext = substr($_FILES["image"]["name"], strpos($_FILES["image"]["name"], '.'), strlen($_FILES["image"]["name"]) - 1);
        $xxx = time() . "1" . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $dir . "/img/product/" . $xxx);
    }

    $_POST['id'] = $_POST['id'] ? $_POST['id'] : 'null';
    $sql = "insert into products(id, name, price, image, anons, detail, weight, id_provider, id_category, deleted)
  VALUES ({$_POST['id']}, '{$_POST['name']}', {$_POST['price']}, '{$xxx}', '{$_POST['anons']}', '{$_POST['detail']}', '', null, {$_POST['id_category']}, 0)
  ON DUPLICATE KEY UPDATE name=VALUES(name), price=VALUES(price), image=VALUES(image), anons=VALUES(anons), detail=VALUES(detail), id_provider=VALUES(id_provider), id_category=VALUES(id_category)";
}

$DB = new DB();
$DB->Query($sql);
$DB->close();