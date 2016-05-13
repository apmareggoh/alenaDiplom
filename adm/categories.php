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
$DB->Query('select * from categories');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Категорий нет!";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                            <table width='100%'>
                            <tr>
                            <td width='50%'>
                            <p>Категория номер {$row['id']}</p>
                            <p>{$row['name']}</p>
                            <p>{$row['url']}</p>
                            <p><a href='/adm/category.php?id={$row['id']}'>Редактировать</a></p>
                            <p><a href='/adm/caterorySave.php?delete=1&id={$row['id']}'>Удалить</a></p>
                            </td>
                            <td>
                            <p><img width='200px' src='/img/product/{$row['image']}'/></p>
                            </td>
                            </tr>
                            </table>
                            </div>";
    }
}
$res .= '<br><a href="category.php">Добавить товар</a>'
?>

    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>
                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Редактирование категорий</a></h3>

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