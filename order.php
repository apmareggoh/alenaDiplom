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

    $DB->Query('select b.id AS cId,
       b.id_user,
       b.id_product,
       b.cnt,
       p.id,
       p.name,
       p.price,
       p.image,
       p.anons,
       p.detail,
       p.weight,
       p.id_provider,
       p.id_category,
       p.deleted from baskets b left JOIN products p on p.id = b.id_product where b.id_user="' . session_id() . '"');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Корзина пустая!";
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

                                        <p class='blog-title'><a href='{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>{$rowProduct['name']} ({$rowProduct['cnt']})</a></p>
                                        <p class='blog-text'>
                                            {$rowProduct['anons']}
                                            <a class='more more-items' href='{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>подробнее &raquo;</a>
                                        </p>
                                        <p class='blog-info' Style='font-weight:bold;'>



                                        </p>


                                        <p class='blog-info' Style='font-weight:bold;'>Есть в наличии</p>
                                        <p class='blog-text' Style='font-weight:bold;'>
                                            <a href='javascript:void(0);' data-id='{$rowProduct['cId']}' class='lnk-products-list-addtocart delInOrder'>Удалить</a>

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
                            <form method="post" action="/createOrder.php">
                                <input name="id_user" value="<?=session_id();?>" type="hidden" id="id_user">
                                <label for="name">Имя</label>
                                <br>
                                <input name="name" id="name">
                                <br>
                                <label for="surname">Фамилия</label>
                                <br>
                                <input name="surname" id="surname">
                                <br>
                                <label for="phones">Телефон</label>
                                <br>
                                <input name="phones" id="phones">
                                <br>
                                <label for="email">E-mail</label>
                                <br>
                                <input name="email" id="email">
                                <br>
                                <label for="pay_method">Способ оплаты</label>
                                <br>
                                <select name="pay_method" id="pay_method">
                                    <option value="1">Наличными при получении</option>
                                    <option value="2">Банковской картой при получении</option>
                                    <option value="3">Банковской картой онлайн</option>
                                </select>
                                <br>
                                <label for="id_item">Пункт доставки</label>
                                <br>
                                <select name="id_item" id="id_item">
                                    <?php
                                    $DB2 = new DB();
                                    $DB2->Query('select * from orders_items where active');
                                    if ($DB2->numRows()) {
                                        while ($rowDelivery = $DB2->fetchArray()) {
                                            echo "<option value='{$rowDelivery['id']}'>{$rowDelivery['adress']}</option>";
                                        }
                                    }
                                    $DB2->close();
                                    ?>
                                </select>
                                <br>
                                <br>
                                <button>Сделать заказ</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

<?php
require_once($dir . '/content/footer.php');