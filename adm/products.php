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
IF($_SESSION['user']!='admin'){
    header("Location: ../adm/");
}
require_once($dir . '/content/header.php');
?>
<?php
/**
 * Created by PhpStorm.
 * User: apmareggoh
 * Date: 07.04.2016
 * Time: 0:59
 */
global $dir;
global $id;
$res = '';

$DB = new DB();
$DB->Query('select p.id,
       p.name,
       p.price,
       p.image,
       p.anons,
       p.detail,
       p.weight,
       p.id_provider,
       p.id_category,
       p.deleted,
       c.id AS cid,
       c.name AS cname,
       c.image AS cimage,
       c.anons AS canons,
       c.detail as cdetail,
       c.url from products p left JOIN categories c on p.id_category=c.id');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Продуктов нет!";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                            <table width='100%'>
                            <tr>
                            <td width='50%'>
                            <p>Товар номер {$row['id']}</p>
                            <p>Категория {$row['cname']}</p>
                            <p>{$row['name']}</p>
                            <p><a href='/adm/product.php?id={$row['id']}'>Редактировать</a></p>
                            </td>
                            <td>
                            <p><img width='200px' src='/img/product/{$row['image']}'/></p>
                            </td>
                            </tr>
                            </table>
                            </div>";
    }
}
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>

                <?php
                require_once($dir . '/content/leftMenu.php');
                ?>

                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Редактирование товаров</a></h3>

                        <div class="panel-body">
                            <div style="overflow:hidden;">

                                <?=$res;?>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

<?php
require_once($dir . '/content/footer.php');