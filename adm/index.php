<?php
/**
 * Created by PhpStorm.
 * User: армагеддон
 * Date: 09.05.2016
 * Time: 19:01
 */
ob_start();
session_start();
$dir = $_SERVER['DOCUMENT_ROOT'];
global $dir;
global $id;
$res = '';
if($_POST['name']){
    if($_POST['name']==admin && $_POST['pass']==admin)
    {$_SESSION['user']="admin";
    header("Location: /adm/orders.php");}
    else{
        header("Location: /adm/");}
}
if($_GET['exit']){
    $_SESSION['user']="";
    header("Location: /");
}
IF($_SESSION['user']=='admin'){
    header("Location: ../adm/orders.php");
}else{
    require_once($dir . '/content/header.php');?>
    <form action = "/adm/" method="post">
            <table style="text-align: center;">
            <tr>
                <td>
                    Логин:
                </td>
                <td>
                    <input type = "text" name = "name"/>
                </td>
            </tr>
            <tr>
                <td>
                    Пароль:
                </td>
                <td>
                    <input type = "password" name = "pass"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type = "submit" value = "Авторизуйтесь"/>
                </td>
            </tr>
            </table>
        </form>
<?
}
require_once($dir . '../content/footer.php');