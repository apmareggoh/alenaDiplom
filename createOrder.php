<?php
/**
 * Created by PhpStorm.
 * User: אנלאדוההמם
 * Date: 09.05.2016
 * Time: 21:56
 */
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');
$DB = new DB();
echo "insert into orders ( id_user, created, summ, pay_method, stat, delivery_method, id_item) values('{$_POST['id_user']}', 1, 1000, {$_POST['pay_method']}, 0, 1, {$_POST['id_item']})";
$DB->Query("insert into orders ( id_user, created, summ, pay_method, stat, delivery_method, id_item) values('{$_POST['id_user']}', 1, 1000, {$_POST['pay_method']}, 0, 1, {$_POST['id_item']})");
$DB->close();
?>