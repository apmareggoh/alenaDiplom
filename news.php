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
$DB->Query('select p.id,
       p.name,
       p.price,
       p.image,
       p.anons,
       p.detail,
       p.weight,
       p.id_provider,
       p.id_category,
       p.deleted,
       c.id AS cid,
       c.name AS cname,
       c.image AS cimage,
       c.anons AS canons,
       c.detail as cdetail,
       c.url from products p left JOIN categories c on p.id_category=c.id');
$DB->close();
if ($DB->numRows() == 0) {
    $res = "��������� ���!";
} else {
    while ($row = $DB->fetchArray()) {
        $res .= "
                            <div class='basic-other-products-item  adv-other-products-item-286334510'>
                            <table width='100%'>
                            <tr>
                            <td width='50%'>
                            <p>����� ����� {$row['id']}</p>
                            <p>��������� {$row['cname']}</p>
                            <p>{$row['name']}</p>
                            <p><a href='/adm/product.php?id={$row['id']}'>�������������</a></p>
                            </td>
                            <td>
                            <p><img width='200px' src='/img/product/{$row['image']}'/></p>
                            </td>
                            </tr>
                            </table>
                            </div>";
    }
}
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>
                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">�������������� �������</a></h3>

                        <div class="panel-body">



                            <div class="basic-featured-news-item adv-featured-news-item-286289044" style="min-height:80px;">
                                <div Style="margin: 0px 20px 10px 0px;float:left;">
                                    <a class="mphoto box" style="width:80px;height:60px;" href="_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm" title="�������� ���!">
                                        <img style="width:80px;height:60px;" src="../users/3319/photos/news/03d2471b-cc63-495f-a200-aff1eb2c8678.jpg" alt="�������� ���!" title="�������� ���!" />
                                    </a>
                                </div>

                                <div class="blog-preview">
                                    <p class="blog-title"><a href="_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">�������� ���!</a></p>
                                    <p class="blog-text">
                                        ��������� �������! ���� �������� ��� � �������� ��� �� ����� ������� ���������. ������ ���������� �� 20% �� ������� �� ����� �� 500 ������.&nbsp;
                                        �� ������ ������������ ��� �������� �� ��������� �� ������ �� �����. ...
                                        <a class="more more-news" href="_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">��������� &raquo;</a>
                                    </p>
                                    <p class="blog-info" Style="font-weight:bold;">
                                        11.01.2012, 17:02





                                    </p>


                                </div>

                            </div>



                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

<?php
require_once($dir . '/content/footer.php');