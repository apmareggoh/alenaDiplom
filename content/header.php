<?php
session_start();
/**
 * Created by PhpStorm.
 * User: жыр
 * Date: 07.04.2016
 * Time: 0:48
 */
global $dir;
require_once($dir . '/class/bd.php');

function translit($str)
{
    $str = str_replace(' ', '_', $str);
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О',
        'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р',
        'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');

    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O',
        'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya',
        'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r',
        's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');

    return str_replace($rus, $lat, $str);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!-- saved from url=(0067)http://cosmetika4.sites.xn--80aagbla3am5aqmo9n.xn--p1ai/default.htm --><meta http-equiv="X-UA-Compatible" content="IE=Edge" />

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Магазин лаков</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link rel="shortcut icon" href="/users/3319/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/css/reset.css@7.css" />
<!--    <link rel="stylesheet" type="text/css" href="/js/shadowbox/shadowbox.css" />-->

    <link rel="stylesheet" type="text/css" href="/users/3319/css/global.css" />
<!--    <link rel="stylesheet" type="text/css" href="/css/gallery.css@7.css" />-->
<!--    [if IE]><!--<link rel="stylesheet" type="text/css" href="/css/ie.css@7.css" />--><![endif]-->

<!--    <script type="text/javascript" src="/js/prototype.js"></script>-->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/global.js"></script>
<!--    <script type="text/javascript" src="/js/scriptaculous.js@load=effects,builder.js"></script>-->
<!--    <script type="text/javascript" src="/js/shadedborder.js"></script>-->
<!--    <script type="text/javascript" src="/js/global.js@7.js"></script>-->

<!--    <script type="text/javascript" src="/js/rboxes/cssquery2-p.js"></script>-->
<!--    <script type="text/javascript" src="/js/rboxes/ruzeeborders.js"></script>-->
<!--    <script type="text/javascript" src="/js/shadowbox/shadowbox.js"></script>-->
</head>

<body>

<div id="outer">
    <div class="closed-margin">
        <div class="closed-box" id="closed_box">
            <div id="header" class="pnged">
                <a id="logo" href="/" title="Магазин товаров для ногтей профессионального пользования">
                    Товары для маникюра
                </a>
                <div id="phone"><span>+7 (900)</span> 123-45-67</div>
                <div id="slogan">Магазин товаров для ногтей для профессионального использования</div>
                <div id="cart"><a href="/order.php">Корзина покупок</a></div>
                <?IF($_SESSION['user']=='admin'){?><div id="cart" style="margin-top: 30px"><a href="/adm/index.php?exit=1">Выход</a></div><?}?>
                <div id="img_h"></div>
            </div>
            <?php IF(strpos($_SERVER['REQUEST_URI'],'adm/') != true) {?>
            <div class="tmenu pnged">
                <div class="hmenu-container">
                    <ul id="page_tabs" class="page_tabs">

                        <li id="menu_item_43822" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/' ? 'activelink' : '' ?> ">
                            <a href="/">Главная</a>
                        </li>

                        <li id="menu_item_43827" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/about.php' ? 'activelink' : '' ?> ">
                            <a href="/about.php">О нас</a>
                        </li>

                        <li id="menu_item_43831" class="mli pnged <?= $_SERVER['REQUEST_URI']=='/catalog.php' ? 'activelink' : '' ?>">
                            <a href="/catalog.php">Каталог товаров</a>
                        </li>

                        <li id="menu_item_43830" class="mli pnged <?= $_SERVER['REQUEST_URI']=='/news.php' ? 'activelink' : '' ?>">
                            <a href="/news.php">Новости</a>

                        </li>

                        <li id="menu_item_43823" class="mli pnged <?= $_SERVER['REQUEST_URI']=='/contacts.php' ? 'activelink' : '' ?>">
                            <a href="/contacts.php">Контакты</a>
                        </li>

                    </ul>
                </div>
                <?php
                }
                else{?>
                <div class="tmenu pnged">
                    <div class="hmenu-container">
                        <ul id="page_tabs" class="page_tabs">

                            <li id="menu_item_43822" class="mli pnged <?= $_SERVER['REQUEST_URI']=='/adm/orders.php' ? "activelink" : "" ?> ">
                                <a href="/adm/orders.php">Заказы</a>
                            </li>

                            <li id="menu_item_43827" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/adm/products.php' ? 'activelink' : '' ?> ">
                                <a href="/adm/products.php">Продукты</a>
                            </li>

                            <li id="menu_item_43827" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/adm/categories.php' ? 'activelink' : '' ?> ">
                                <a href="/adm/categories.php">Категории</a>
                            </li>

                            <li id="menu_item_43827" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/adm/news.php' ? 'activelink' : '' ?> ">
                                <a href="/adm/news.php">Новости</a>
                            </li>

                            <li id="menu_item_43827" class="mli pnged  <?= $_SERVER['REQUEST_URI']=='/adm/items.php' ? 'activelink' : '' ?> ">
                                <a href="/adm/items.php">Пункты доставки</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <?php }?>
            </div>
