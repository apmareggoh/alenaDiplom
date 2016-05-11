<?php
/**
 * Created by PhpStorm.
 * User: армагеддон
 * Date: 09.05.2016
 * Time: 21:56
 */
ob_start();
session_start();
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');
require_once($dir . '/class/bd.php');
$summ = 0;
$counts = array();
// Вставляем товары заказа
$DB = new DB();
$DB->Query('select * from baskets b left join products p on b.id_product = p.id where b.id_user="' . session_id() . '"');
while ($row2 = $DB->fetchArray()) {
   $summ += $row2['price'] * $row2['cnt'];
}
$DB->close();

$DB = new DB();
// Вставка записи в заказ
$res = "";
$DB->Query("insert into orders ( id_user, created, summ, pay_method, stat, delivery_method, id_item, name, surname, phone, email)
          values('" . session_id() . "', 1, {$summ}, {$_POST['pay_method']}, 1, 1, {$_POST['id_item']}, '{$_POST['name']}', '{$_POST['surname']}', '{$_POST['phones']}', '{$_POST['email']}')");
$last_id = $DB->insert_id();
// Вставляем товары заказа
$DB->Query('select id_product, cnt from baskets where id_user="' . session_id() . '"');
while ($row = $DB->fetchArray()) {
    $DB2 = new DB();
    $DB2->Query("insert into orders_baskets (id_order, id_product, cnt) VALUES ({$last_id}, {$row['id_product']}, {$row['cnt']})");
    $DB2->close();
}
$DB->Query('delete from baskets where id_user="' . session_id() . '"');
$DB->close();
$res .= 'Ваш номер заказа - ' . $last_id . '.';
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>

                <?php
                require_once($dir . '/content/leftMenu.php');
                ?>

                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Оформление заказа</a></h3>

                        <div class="panel-body">
                            <div style="overflow:hidden;">

                                <?=$res;?>
                                <br>
                                <a href="/">В путь!</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

<?php
require_once($dir . '/content/footer.php');
