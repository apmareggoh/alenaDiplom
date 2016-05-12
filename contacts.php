<?php
$id = $_GET['id'];
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');?>


<div class="main-area" id="main_area">
    <table class="table-content" cellpadding="0" cellspacing="0">
        <tr>

            <?php
            require_once($dir . '/content/leftMenu.php');
            ?>

            <td class="center-column">


                <div class="panel pagecontentall panel-pagecontent-90157 roundcorners">


                    <h1 class="title" title="О нас">Таки контакты</h1>
                    <div class="panel-body">
                        <div class="blog-text"><p style="FONT-SIZE: 16px"><strong>Компания Cosmetika</strong></p>
                            <p>Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес Адрес </p>
                            <p>Телефон Телефон Телефон Телефон Телефон Телефон Телефон Телефон Телефон Телефон Телефон </p></div>
                    </div>
                    <img src="img/map.jpg" style="width: 50%">
                </div>
            </td>
        </tr>
    </table>

</div>
<?php require_once($dir . '/content/footer.php');
?>

