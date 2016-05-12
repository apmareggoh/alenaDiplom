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
$DB->Query('select * from products where id=' . $_GET['id']);
$DB->close();
if ($DB->numRows() == 0) {
    $res = "Продуктов нет!";
} else {
    $row = $DB->fetchArray();
    $res = "
    <label for='name'>Название</label><br>
    <input name='name' id='name' value='{$row['name']}'>
    <br>
    <label for='price'>Цена</label><br>
    <input name='price' id='price' value='{$row['price']}'>
    <br>
    <label for='image'>Картинко</label><br>
    <input name='image' id='image' type='file'>
    <br>
    <label for='image'>Анонс</label><br>
    <textarea>Говно ебаное</textarea>
    <br>
    <label for='image'>Детально</label><br>
    <textarea>Говно ебаное</textarea>
    ";
}
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>
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