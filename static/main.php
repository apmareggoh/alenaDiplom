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
if ($id) {
    $DB->Query('select * from products where id_category=' . $id);
    echo 'select * from products where id_category=' . $id;
} else {
    $DB->Query('select * from products p left JOIN categories c where p.id_category = c.id');
}
$DB->close();
if ($DB->numRows() == 0) {
    $res = "404 блеать!";
} else {
    while ($rowProduct = $DB->fetchArray()) {
       $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>


                                <div Style='margin-bottom:0px;min-height:170px;'>
                                    <div Style='margin: 0px 20px 10px 0px;float:left;'>
                                        <a class='mphoto box' style='width:150px;height:150px;' href='{$rowProduct['url']}/' title='{$rowProduct['name']}'>
                                            <img style='width:150px;height:150px;' src='/img/product/{$rowProduct['image']}' alt='{$rowProduct['name']}' title='{$rowProduct['name']}' />
                                        </a>
                                    </div>

                                    <div class='blog-preview'>

                                        <p class='blog-title'><a href='{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>{$rowProduct['name']}</a></p>
                                        <p class='blog-text'>
                                            {$rowProduct['anons']}
                                            <a class='more more-items' href='{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>подробнее &raquo;</a>
                                        </p>
                                        <p class='blog-info' Style='font-weight:bold;'>



                                        </p>


                                        <p class='blog-info' Style='font-weight:bold;'>Есть в наличии</p>
                                        <p class='blog-text' Style='font-weight:bold;'>
                                            <a href='javascript:void(0);' data-id='{$rowProduct['id']}' class='lnk-products-list-addtocart addInOrder'>В корзину</a>

                                            <span class='discount-price'>{$rowProduct['price']}</span> <span class='end-price'>" . ($rowProduct['price'] * 0.95) . "</span> руб
                                        </p>
                                    </div>

                                </div>
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


                    <h3 class="title"><a href="/">Наши предложения</a></h3>

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
