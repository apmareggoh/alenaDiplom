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
                            echo "<li class='li-all-items " . (in_array($row['url'], $_SERVER['REQUEST_URI']) != false ? 'selected' : '') ."'><a href='/{$row['url']}'>{$row['name']}</a></li>";
                        }
                    } else {
                        echo '<li>На данный момент сайт пустой</li>';
                    }
                    ?>
                    <li class="li-all-items selected"><a href="/default.htm">Весь каталог</a></li>

                    <li class="li-286341517"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b06307a4db1">Новинки</a>

                    </li>

                    <li class="li-286341516"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b05634a0db4">Уход за кожей</a>

                    </li>

                    <li class="li-286341519"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b02a806edb2">Уход за телом</a>

                    </li>

                    <li class="li-286341518"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b0da9e96dac">Декоративная косметика</a>

                    </li>

                    <li class="li-286341553"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b09e2070db2">Для него</a>

                    </li>

                    <li class="li-286341552"><a href="_25d0_259a_25d0_25b0_25d1_2582_25d0_25b0_25d0_25bb_25d0_25be_25d0_25b3-_25d1_2582_25d0_25be_25d0_25b0797ec9dcd">Для нее</a>

                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-18 roundcorners">


        <h3 class="title"><a href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/default.htm">Наши акции!</a></h3>

        <div class="panel-body">



            <div class="basic-featured-news-item adv-featured-news-item-286289044" style="min-height:80px;">
                <div Style="margin: 0px 20px 10px 0px;float:left;">
                    <a class="mphoto box" style="width:80px;height:60px;" href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm" title="Снижение цен!">
                        <img style="width:80px;height:60px;" src="users/3319/photos/news/03d2471b-cc63-495f-a200-aff1eb2c8678.jpg" alt="Снижение цен!" title="Снижение цен!" />
                    </a>
                </div>

                <div class="blog-preview">
                    <p class="blog-title"><a href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">Снижение цен!</a></p>
                    <p class="blog-text">
                        Уважаемые клиенты! Рады сообщить Вам о снижении цен на новый каталог продукции. Скидки составляют до 20% за покупку на сумму от 500 рублей.&nbsp;
                        Мы готовы предоставить Вам каталоги на продукцию по заказу на сайте. ...
                        <a class="more more-news" href="_25d0_259d_25d0_25be_25d0_25b2_25d0_25be_25d1_2581_25d1_2582_25d0_25b8/_25d0_25a1_25d0_25ba_25d0_25b0f1a48a837.htm">подробнее &raquo;</a>
                    </p>
                    <p class="blog-info" Style="font-weight:bold;">
                        11.01.2012, 17:02





                    </p>


                </div>

            </div>



        </div>
    </div>

    <div class="panel panel-ucontent-15917 roundcorners">

        <h3 class="title">

            <a>Говорят наши клиенты</a>

        </h3>

        <div class="panel-body">
            <div class="blog-text"><p>"<i>Очень радует, что косметику нельзя приобрести в розничной торговле и по-этому нет подделок на продукцию!</i>"&nbsp;</p>
                <p style="text-align: right;">- Егорова&nbsp;Валерия</p>
                <p>&nbsp;</p>
                <p>"<i>Став сотрудником компании я не только познакомилась с качественной косметикой, но и преобрела друзей.</i>"&nbsp;</p>
                <p style="text-align: right;">- Василькова Юлия</p></div>
        </div>
    </div>


</td>