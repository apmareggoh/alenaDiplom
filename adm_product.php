<?php
/**
 * Created by PhpStorm.
 * User: армагеддон
 * Date: 27.04.2016
 * Time: 0:50
 */

$dir = $_SERVER['DOCUMENT_ROOT'];
require_once($dir . '/content/header.php');
?>
    <div class="main-area" id="main_area">
        <table class="table-content" cellpadding="0" cellspacing="0">
            <tr>

                <?php
                //require_once($dir . '/content/leftMenuAdm.php');
                ?>

                <td class="center-column">


                    <div class="panel panel-49 panel-49-286334510 roundcorners">


                        <h3 class="title"><a href="/">Наши предложения</a></h3>

                        <div class="panel-body">
                            <div style="overflow:hidden;">
                                <input name="name" type="text"/>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>
<?php
require_once($dir . '/content/footer.php');