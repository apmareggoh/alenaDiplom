<?php
/**
 * Created by PhpStorm.
 * User: ����������
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
$DB->Query('select * from news ORDER BY id DESC');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "На данный момент новостей нет";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= '
                     <div class="basic-featured-news-item adv-featured-news-item-286289044" style="min-height:80px;">
							<div style="margin: 0px 20px 10px 0px;float:left;">
								<a class="mphoto box" style="width:80px;height:60px;" href="/news/'.$row['id'].'-'.translit($row['name']).'" title="'.$row['name'].'/">
								<img style="width:80px;height:60px;" src="/img/news/'.$row['image'].'" alt="'.$row['name'].'" title="'.$row['name'].'" />
								</a>
							</div>

							<div class="blog-preview">
								<p class="blog-title"><a href="/news/'.$row['id'].'-'.translit($row['name']).'/">'.$row['name'].'</a></p>
								<p class="blog-text">
                                    '.$row['anons'].'
								  <a class="more more-news" href="/news/'.$row['id'].'-'.translit($row['name']).'/">подробнее »</a>
								</p>
								<p class="blog-info" style="font-weight:bold;">
                                    '.$row['dt'].'
								</p>
							</div>
						</div>';
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


                        <h3 class="title"><a href="">Новости и акции</a></h3>

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