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


        <h3 class="title"><a href="/news.php">Новости и акции!</a></h3>

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
                                <a class="mphoto box" style="width:80px;height:60px;" href="/news/'.$row['id'].'-'.translit($row['name']).'/" title="'.$row['name'].'">
                                    <img style="width:80px;height:60px;" src="/img/news/'.$row['image'].'" alt="'.$row['name'].'" title="'.$row['name'].'" />
                                </a>
                            </div>

                            <div class="blog-preview">
                                <p class="blog-title"><a href="/news/'.$row['id'].'-'.translit($row['name']).'/">'.$row['name'].'</a></p>
                                <p class="blog-text">
                                    '.$row['anons'].'
                                    <a class="more more-news" href="/news/'.$row['id'].'-'.translit($row['name']).'/">подробнее &raquo;</a>
                                </p>
                                <p class="blog-info" Style="font-weight:bold;">
                                    '.$row['dt'].'
                                </p>
                            </div>
                        </div>';
                }
            } else {
                echo 'На данный момент новостей нет';
            }
            ?>

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