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

function createSelectStat($id = 0) {
    $DBStat = new DB();
    $res = '';
    $DBStat->Query('select * from categories');
    while ($row = $DBStat->fetchArray()) {
        $res .= '<option ' . ($row['id'] == $id ? 'selected="selected"' : '') . ' value="' . $row['id'] .'">' . $row['name'] . '</option>';
    }
    $DBStat->close();
    return $res;
}

if ($_GET['id']) {
    $DB = new DB();
    $DB->Query('select * from products where id=' . $_GET['id']);
    $DB->close();
    $row = $DB->fetchArray();
} else {
    $row = array();
}
//if (!$_GET['id'] || $DB->numRows() == 0) {
//   // $res = "Продуктов нет!";
//} else {
    $res = "
    <form method='post' action='productSave.php' enctype='multipart/form-data'>
        <input name='id' id='id' type='hidden' value='{$row['id']}'>
        <label for='name'>Название</label><br>
        <input name='name' id='name' value='{$row['name']}'>
        <br>
        <label for='price'>Цена</label><br>
        <input name='price' id='price' value='{$row['price']}'>
        <br>
        <label for='image'>Картинко</label><br>
        <input name='image' id='image' type='file'>
        <br>
        <label for='anons'>Анонс</label><br>
        <textarea name='anons' id='anons' >{$row['anons']}</textarea>
        <br>
        <label for='detail'>Детально</label><br>
        <textarea name='detail' id='detail' >{$row['detail']}</textarea>
        <label for='id_category'>Категория</label><br>
        <select name='id_category' id='id_category'>" . createSelectStat($_GET['id_category']) ."</select>
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