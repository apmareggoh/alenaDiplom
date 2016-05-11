<?php
ob_start();
session_start();
/**
 * Created by PhpStorm.
 * User: אנלאדוההמם
 * Date: 27.04.2016
 * Time: 0:24
 */
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/class/bd.php');
$DB = new DB();
$DB->Query("delete from baskets where id={$_GET['id']}");
$DB->close();
?>