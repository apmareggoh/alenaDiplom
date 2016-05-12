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


function createSelectStat($id = 1) {
    $DBStat = new DB();
    $res = '';
    $DBStat->Query('select * from orders_stats');
    while ($row = $DBStat->fetchArray()) {
        $res .= '<option ' . ($row['id'] == $id ? 'selected="selected' : '') . ' value="' . $row['id'] .'">' . $row['name'] . '</option>';
    }
    $DBStat->close();
    return $res;
}

$DB = new DB();
$DB->Query('select * from orders o left JOIN orders_items i on o.id_item=i.id');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Заказов нет!";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                            <p>Заказ номер {$row['id']}</p>
                            <table>
                            <tr><td>Дата заказа</td><td>{$row['created']}</td></tr>
                            <tr><td>Сумма</td><td>{$row['summ']}</td></tr>
                            <tr><td>Метод оплаты</td><td>{$row['pay_method']}</td></tr>
                            <tr><td>Метод доставки</td><td>{$row['delivery_method']}</td></tr>
                            <tr><td>Адрес</td><td>{$row['adress']}</td></tr>
                            <tr><td>Имя</td><td>{$row['name']}</td></tr>
                            <tr><td>Фамилия</td><td>{$row['suname']}</td></tr>
                            <tr><td>Телефон</td><td>{$row['phone']}</td></tr>
                            <tr><td>E=mail</td><td>{$row['email']}</td></tr>
                            </table>
                            <select class='selectOrder' id='select_{$row['id']}'>" . createSelectStat($row['stat']) ."</select>
                            </div>";
    }
}
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>

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

<?php
require_once($dir . '/content/footer.php');