<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Квитанция</title>
<style>
    body
    {
        font-family:Arial, Helvetica, sans-serif;
    }
    p
    {
        padding: 5px 0px 0px 5px;
    }
    li
    {
        list-style-type: none;
        padding-bottom:5px;
        padding: 6px 0px 0px 5px;
    }
    .main input
    {
        font-size:12px;
        background-color:#CCFFCC;
    }
    .text14
    {
        font-family:"Times New Roman", Times, serif;
        font-size:14px;
    }
    .text14 strong
    {
        font-family:"Times New Roman", Times, serif;
        font-size:11px;
    }
</style>
</head>

<body>
<div class="text14">
    <table width="720" bordercolor="#000000" style="border:#000000 1px solid;" cellpadding="0" cellspacing="0">
        <tbody><tr>
            <td width="220" valign="top" height="250" align="center" style="border-bottom:#000000 1px solid; border-right:#000000 1px solid;">&nbsp;<strong>Извещение</strong></td>
            <td valign="top" style="border-bottom:#000000 1px solid; border-right:#000000 1px solid;">
                <li><strong>Получатель: </strong><font style="font-size:90%"> ____________________________________________________</font>&nbsp;&nbsp;&nbsp;<br>
                </li><li><strong>КПП:</strong> __________&nbsp;&nbsp;&nbsp;&nbsp; <strong>ИНН:</strong> ____________&nbsp;&nbsp;<font style="font-size:12px"> &nbsp;</font>
                    &nbsp;     </li><li><strong>ОКТМО:</strong>___________&nbsp;&nbsp;&nbsp;&nbsp;<strong>P/сч.:</strong> ____________________&nbsp;&nbsp;
                    &nbsp;     </li><li> <strong>в:</strong> <font style="font-size:90%">______________________________________________________________</font><br>
                </li><li><strong>БИК:</strong> _________&nbsp; <strong>К/сч.:</strong>____________________<br>
                </li><li><strong>Код бюджетной классификации (КБК):</strong> ____________________     &nbsp;
                </li><li><strong>Платеж:</strong> <font style="font-size:90%"><u><?=$_POST['id_order']?></u></font><br>
                </li><li><strong>Плательщик:</strong><u><?=$_POST['fio']?></u><br>
                </li><li><strong>Адрес плательщика:</strong> <font style="font-size:90%"> ____________________________________________</font><br>
                </li><li><strong>ИНН плательщика:</strong> ____________&nbsp;&nbsp;&nbsp;&nbsp; <strong>№ л/сч. плательщика:</strong> ______________       </li>
                <li><strong>Сумма:</strong>&nbsp;&nbsp;<?=floor($_POST['summ'])?> руб.&nbsp;&nbsp;<?=str_pad(round(fmod($_POST['summ'],1)*100),2,'0',STR_PAD_LEFT)?> коп. &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;<br>
                    &nbsp;<br><br>
                    Подпись:________________________        Дата: " __ "&nbsp;_______&nbsp;&nbsp;2016 г. <br><br>
                </li></td>
        </tr>
        <tr>
            <td width="220" valign="top" height="250" align="center" style="border-bottom:#000000 1px solid; border-right:#000000 1px solid;">&nbsp;<strong>Квитанция</strong></td>
            <td valign="top" style="border-bottom:#000000 1px solid; border-right:#000000 1px solid;">
                <li><strong>Получатель: </strong><font style="font-size:90%"> ____________________________________________________</font>&nbsp;&nbsp;&nbsp;<br>
                </li><li><strong>КПП:</strong> __________&nbsp;&nbsp;&nbsp;&nbsp; <strong>ИНН:</strong> ____________&nbsp;&nbsp;<font style="font-size:12px"> &nbsp;</font>
                    &nbsp;     </li><li><strong>ОКТМО:</strong>___________&nbsp;&nbsp;&nbsp;&nbsp;<strong>P/сч.:</strong> ____________________&nbsp;&nbsp;
                    &nbsp;     </li><li> <strong>в:</strong> <font style="font-size:90%">______________________________________________________________</font><br>
                </li><li><strong>БИК:</strong> _________&nbsp; <strong>К/сч.:</strong>____________________<br>
                </li><li><strong>Код бюджетной классификации (КБК):</strong> ____________________          &nbsp;
                </li><li><strong>Платеж:</strong> <font style="font-size:90%"><u><?=$_POST['id_order']?></u></font><br>
                </li><li><strong>Плательщик:</strong><u><?=$_POST['fio']?></u><br>
                </li><li><strong>Адрес плательщика:</strong> <font style="font-size:90%"> ____________________________________________</font><br>
                </li><li><strong>ИНН плательщика:</strong> ____________&nbsp;&nbsp;&nbsp;&nbsp; <strong>№ л/сч. плательщика:</strong> ______________       </li>
                <li><strong>Сумма:</strong>&nbsp;&nbsp;<?=floor($_POST['summ'])?> руб.&nbsp;&nbsp;<?=str_pad(round(fmod($_POST['summ'],1)*100),2,'0',STR_PAD_LEFT)?> коп. &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;<br>
                    &nbsp;<br><br>
                    Подпись:________________________        Дата: " __ "&nbsp;_______&nbsp;&nbsp;2016 г. <br><br>
                </li></td>
        </tr>
        </tbody></table>
</div>
<script type="text/javascript">window.print()</script>
</body></html>