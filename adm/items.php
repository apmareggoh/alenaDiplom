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
$DB->Query('select * from orders_items');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Пунктов нет!";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                            <p>{$row['adress']}</p>
                            <p>{$row['worktime']}</p>
                            <p>{$row['phone']}</p>
                            <p>".($row['active'] ? 'Активен': 'Не активен')."</p>
                            <p><a href='/adm/item.php?id={$row['id']}'>Редактировать</a></p>
                            <p><a href='/adm/items_save.php?delete=1&id={$row['id']}'>Удалить</a></p>
                            </div>";
    }
}
$res .= '<br><a href="item.php">Добавить пункт</a>'
?>

    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>
                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Редактирование пунктов доставки</a></h3>

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