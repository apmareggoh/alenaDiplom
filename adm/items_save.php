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

header("Location: /adm/items.php");
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');

if ($_GET['delete']) {
    $sql = 'DELETE FROM orders_items WHERE id=' . $_GET['id'];
} else {

    $_POST['id'] = $_POST['id'] ? $_POST['id'] : 'null';
    $sql = "insert INTO orders_items(id, adress, worktime, phone, active)
  VALUES ({$_POST['id']}, '{$_POST['adress']}', '{$_POST['worktime']}', '{$_POST['phone']}', ".($_POST['active'] ? '1' : '0').")
  ON DUPLICATE KEY UPDATE adress=VALUES(adress), worktime=VALUES(worktime), phone=VALUES(phone), active=VALUES(active)";
}
//echo $sql;
$DB = new DB();
$DB->Query($sql);
$DB->close();