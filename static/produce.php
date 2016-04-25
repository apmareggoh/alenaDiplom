<?php
/**
 * Created by PhpStorm.
 * User: apmareggoh
 * Date: 07.04.2016
 * Time: 0:59
 */
global $dir;
global $id;

$DB = new DB();
$DB->Query('select * from products where id=' . $id);
$DB->close();
if ($DB->numRows() == 1) {
    $rowProduct = $DB->fetchArray();
} else {
    exit('<li>404 блеать!</li>');
}
?>
<div class="main-area" id="main_area">
    <table class="table-content" cellpadding="0" cellspacing="0">
        <tr>
            <?php
            require_once($dir . '/content/leftMenu.php');
            ?>
            <td class="center-column">
                <div class="panel panel-47 panel-47-286390023 roundcorners">
                    <h1 class="title" title="<?=$rowProduct['name'];?>"><?=$rowProduct['name'];?></h1>
                    <div class="panel-body">
                        <p class="navigation-bar">
<!--                            <a href="/">К списку наименований</a>-->
                        </p>
                        <div style="width:100%; display:table; margin-top:20px;">
                            <div class="detailed-picture" style="float:left;margin-right:20px;margin-bottom:20px;">
                                <img src="/img/product/<?=$rowProduct['image'];?>" class="detailed-photo" alt="<?=$rowProduct['name'];?>" title="<?=$rowProduct['name'];?>" />
                            </div>
                            <div class="blog-preview">
                                <div class="blog-text"><p><?=$rowProduct['anons'];?></p>
                                    <p><?=$rowProduct['detail'];?></p></div>
                            </div>
                        </div>
                        <br />
                        <div class="blog-preview">
                            <table cellpadding="0" cellspacing="0" class="totals" style="float:right">
                                <tr><td><strong>Старая цена:</strong></td><td><?=$rowProduct['price'];?></td></tr>
                                <tr><td><strong>Скидка:</strong></td><td>5%</td></tr>
                                <tr><td style="font-size:120%;"><strong>Новая цена:</strong></td><td style="font-size:120%;"><?=$rowProduct['price'] * 0.95;?> руб</td></tr>
                            </table>
                            <br /><br /><br /><br />
                        </div>
                        <div id="ctl00_MainContent_ctl00_ctl00_pnlMsg" class="blog-preview item-already-in-the-shopping-cart">
                            <p class="blog-text"><strong>&laquo;<?=$rowProduct['name'];?>&raquo;</strong>  в корзине! Перейти в <a href="trash.htm">корзину покупок</a></p>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
