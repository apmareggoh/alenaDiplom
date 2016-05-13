<?php
/**
 * Created by PhpStorm.
 * User: ����������
 * Date: 25.04.2016
 * Time: 17:47
 */
$id = $_GET['id'];
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');global $dir;
global $id;

$DB = new DB();
$DB->Query('select * from news where id=' . $id);
$DB->close();
if ($DB->numRows() == 1) {
    $rowNew = $DB->fetchArray();
} else {
    exit('<li>Данная новость не существует</li>');
}
?>
<div class="main-area" id="main_area">
    <table class="table-content" cellpadding="0" cellspacing="0">
        <tr>
            <?php
            require_once($dir . '/content/leftMenu.php');
            ?>
            <td class="center-column">
                <div class="panel panel-17 roundcorners">
                    <h1 class="title" style="float:left;"><?=$rowNew['name'];?></h1>
                    <p class="navigation-bar">
                            <span style="float:right; font-weight: bold;">
                                <a style="color: #AA306F;" href="news.php">Все новости</a>
                            </span>
                    </p>
                    <div class="panel-body" style="margin-top: 2px">
                        <div style="margin-top:20px;min-height:200px;">
                            <div style="float:left;margin-right:20px;margin-bottom:20px;height:180px;10">
                                <img src="<?=$rowNew['image'];?>" class="detailed-photo" alt="<?=$rowNew['name'];?>">
                            </div>
                            <div class="blog-preview">
                                <div class="blog-text"><?=$rowNew['detail'];?></div>
                                <p class="blog-info" style="font-weight:bold;">
                                    <?=$rowNew['dt'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<?php require_once($dir . '/content/footer.php');
