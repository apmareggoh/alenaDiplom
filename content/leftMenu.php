<?php
/**
 * Created by PhpStorm.
 * User: армагеддон
 * Date: 25.04.2016
 * Time: 17:31
 */

?>
<td class="column left">
    <div class="panel panel-50 panel-50-286334510 roundcorners">
        <h3 class="title"><a>Типы продукции</a></h3>
        <div class="panel-body">
            <div class="categories-list categories-products-list-286334510">
                <ul class="top-level-categories">
                    <?php
                    $DB = new DB();
                    $DB->Query('select * from categories');
                    $DB->close();
                    if ($DB->numRows()) {
                        while ($row = $DB->fetchArray()) {
                            echo "<li class='li-all-items " . (strripos( $_SERVER['REQUEST_URI'], $row['url']) != false ? 'selected' : '') ."'><a href='/{$row['id']}-{$row['url']}/'>{$row['name']}</a></li>";
                        }
                    } else {
                        echo '<li>На данный момент сайт пустой</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-18 roundcorners">


        <h3 class="title"><a href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/default.htm">Наши акции!</a></h3>

        <div class="panel-body">


            <?php
            $DB = new DB();
            $DB->Query('select * from news ORDER BY id DESC LIMIT 2');
            $DB->close();
            if ($DB->numRows()) {
                while ($row = $DB->fetchArray()) {
                    echo '
                        <div class="basic-featured-news-item adv-featured-news-item-286289044" style="min-height:80px;">
                            <div Style="margin: 0px 20px 10px 0px;float:left;">
                                <a class="mphoto box" style="width:80px;height:60px;" href="news/'.$row['id'].' - '.translit($row['name']).'" title="'.$row['name'].'">
                                    <img style="width:80px;height:60px;" src="/img/news/'.$row['image'].'" alt="'.$row['name'].'" title="'.$row['name'].'" />
                                </a>
                            </div>

                            <div class="blog-preview">
                                <p class="blog-title"><a href="'.$row['id'].' - '.translit($row['name']).'">'.$row['name'].'</a></p>
                                <p class="blog-text">
                                    '.$row['anons'].'
                                    <a class="more more-news" href="'.$row['id'].' - '.translit($row['name']).'">подробнее &raquo;</a>
                                </p>
                                <p class="blog-info" Style="font-weight:bold;">
                                    1.05.2016, 17:02
                                </p>
                            </div>
                        </div>';
                }
            } else {
                echo 'На данный момент новостей нет';
            }
            ?>


<!--            <div class="basic-featured-news-item adv-featured-news-item-286289044" style="min-height:80px;">-->
<!--                <div Style="margin: 0px 20px 10px 0px;float:left;">-->
<!--                    <a class="mphoto box" style="width:80px;height:60px;" href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm" title="Выгодная цена!">-->
<!--                        <img style="width:80px;height:60px;" src="users/3319/photos/news/03d2471b-cc63-495f-a200-aff1eb2c8678.jpg" alt="Выгодная цена!" title="Выгодная цена!" />-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="blog-preview">-->
<!--                    <p class="blog-title"><a href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">Выгодная цена!</a></p>-->
<!--                    <p class="blog-text">-->
<!--                        Уважаемые клиенты! Рады сообщить Вам о снижении цен на весь каталог продукции. Скидка составляет 5%. Акция продлится до конца месяца!.&nbsp;-->
<!--                        Мы готовы предоставить Вам каталоги на продукцию по заказу на сайте. ...-->
<!--                        <a class="more more-news" href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">подробнее &raquo;</a>-->
<!--                    </p>-->
<!--                    <p class="blog-info" Style="font-weight:bold;">-->
<!--                        1.05.2016, 17:02-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->



        </div>
    </div>

    <div class="panel panel-ucontent-15917 roundcorners">

        <h3 class="title">

            <a>Отзывы</a>

        </h3>

        <div class="panel-body">
            <div class="blog-text"><p>"<i>Очень радует, что товары нельзя приобрести в розничной торговле и поэтому нет подделок на продукцию!</i>"&nbsp;</p>
                <p style="text-align: right;">- Егорова&nbsp;Валерия</p>
                <p>&nbsp;</p>
                <p>"<i>Заказав продукцию на вашем сайте, я убедилась в ее качестве и быстрой доставке.</i>"&nbsp;</p>
                <p style="text-align: right;">- Василькова Юлия</p></div>
        </div>
    </div>


</td>