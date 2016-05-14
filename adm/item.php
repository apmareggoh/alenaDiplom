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
global $dir;
global $id;
$res = '';

if ($_GET['id']) {
    $DB = new DB();
    $DB->Query('select * from orders_items where id=' . $_GET['id']);
    $DB->close();
    $row = $DB->fetchArray();
} else {
    $row = array();
}
//if (!$_GET['id'] || $DB->numRows() == 0) {
//   // $res = "Продуктов нет!";
//} else {
$res = "
    <form method='post' action='items_save.php' enctype='multipart/form-data'>
        <input name='id' id='id' type='hidden' value='{$row['id']}'>
        <label for='adress'>Адрес</label><br>
        <input name='adress' id='name' value='{$row['adress']}'>
        <br>
        <label for='worktime'>Время работы</label><br>
        <input name='worktime' id='url' value='{$row['worktime']}'>
        <br>
        <label for='phone'>Телефон</label><br>
        <input name='phone' id='url' value='{$row['phone']}'>
        <br>
        <label for='active'>Активен</label><br>
        <input type='checkbox' name='active' ".($row['active'] ? 'checked' : '').">
        <br>
        <button>Сохранить</button>
    </form>
    ";
//}
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>
                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Редактирование пнкта</a></h3>

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