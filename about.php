<?php
$id = $_GET['id'];
$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');
?>


<div class="main-area" id="main_area">
    <table class="table-content" cellpadding="0" cellspacing="0">
        <tr>

            <?php
            require_once($dir . '/content/leftMenu.php');
            ?>

            <td class="center-column">


                <div class="panel pagecontentall panel-pagecontent-90157 roundcorners">


                    <h1 class="title" title="О нас">О нас</h1>
                    <div class="panel-body">
                        <div class="blog-text"><p style="FONT-SIZE: 16px"><strong>Товары для маникюра</strong></p>
                            <p>Интернет-магазин реализует материалы для наращивания ногтей, маникюра, средства для ухода за собой. Совершенствуйте уровень обслуживания за счет качественных средств и инструментов, расширяйте клиентскую базу.</p>
                            <p>Мы предлагаем товары для наращивания ногтей и маникюра известных марок. Представленные в каталоге инструменты идеально подходят для использования как в салонных, так и в домашних условиях.</p>
                            <p>У нас вы сможете приобрести:
                                инструменты и аппараты для маникюра и педикюра;
                                лаки для ногтей, гели-лаки, средства для нейл-дизайна;
                                гелевые и акриловые системы;
                                УФ-лампы;
                                аппараты для парафинотерапии;
                                стерилизаторы;</div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

</div>
<?php require_once($dir . '/content/footer.php');
?>

