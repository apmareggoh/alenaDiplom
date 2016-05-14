<?php
$id = $_GET['id'];
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');
global $dir;
global $id;
ob_start();
session_start();
$res = '';
$DB = new DB();
$DB->Query('CALL getProduct(' . (isset($id) ? $id : 'null') .')');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "no tovar";
} else {
    while ($rowProduct = $DB->fetchArray()) {
        $DB2 = new DB();
        $DB2->Query('select * from baskets b left JOIN products p on p.id = b.id_product where b.id_user="' . session_id() . '" and b.id_product=' . $rowProduct['id']);
        if ($DB2->numRows()) {
            $text = 'В корзине';
            $cnt = $DB2->fetchArray();
            $cnt = $cnt['cnt'];
            $class = '';
            $link = '/order.php';
        } else {
            $text = 'В корзину';
            $cnt = 1;
            $class = 'addInOrder';
            $link = 'javascript:void(0);';
        }
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                                <div Style='margin-bottom:0px;min-height:170px;'>
                                    <div Style='margin: 0px 20px 10px 0px;float:left;'>
                                        <a class='mphoto box' style='width:150px;height:150px;' href='{$rowProduct['url']}/' title='{$rowProduct['name']}'>
                                            <img style='width:150px;height:150px;' src='/img/product/{$rowProduct['image']}' alt='{$rowProduct['name']}' title='{$rowProduct['name']}' />
                                        </a>
                                    </div>
                                    <div class='blog-preview'>
                                        <p class='blog-title'><a href='/{$rowProduct['cid']}-{$rowProduct['url']}/{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>{$rowProduct['name']}</a></p>
                                        <p class='blog-text'>
                                            {$rowProduct['anons']}
                                            <a class='more more-items' href='/{$rowProduct['cid']}-{$rowProduct['url']}/{$rowProduct['id']}-" . translit($rowProduct['name']) . "/'>подробнее &raquo;</a>
                                        </p>
                                        <p class='blog-info' Style='font-weight:bold;'>
                                        </p>
                                        <p class='blog-info' Style='font-weight:bold;'>Есть в наличии</p>
                                        <p class='blog-text' Style='font-weight:bold;'>
                                        <label for='count_{$rowProduct['id']}'>Колво</label>
                                        <input style='width:20px;' name='count' id='count_{$rowProduct['id']}' value='{$cnt}'>
                                            <a href='{$link}' data-id='{$rowProduct['id']}' class='lnk-products-list-addtocart {$class}'>{$text}</a>

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


                    <h3 class="title"><a>Наши предложения</a></h3>

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
<?php require_once($dir . '/content/footer.php');
?>

