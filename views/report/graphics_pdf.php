<?php
/* @var $range */
/* @var $sex */
/* @var $age */
/* @var $social */
/* @var $civil */
/* @var $consult */
/* @var $sex_vi */
/* @var $age_vi */
/* @var $civil_vi */
/* @var $social_vi */

?>
<div class="text-center"><?=$range?></div>
<div id="sexpiechart" class="piechart">
    <img src='<?=$sex?>' style="height:300px;" />
</div>

<div id="agepiechart" class="piechart">
    <img src='<?=$age?>' style="height:300px;" />
</div>

<div id="socialpiechart" class="piechart">
    <img src='<?=$social?>' style="height:300px;" />
</div>

<div id="civilpiechart" class="piechart">
    <img src='<?=$civil?>' style="height:300px;" />
</div>

<div id="consultbarchart" class="barchart">
    <img src='<?=$consult?>' />
</div>
<!--<pagebreak>
<div class="main-heading centre-align" style="margin-top: 35px;">По вопросам домашнего насилия и насильственных действий</div>

<div id="visexpiechart" class="piechart">
    <img src='<?/*=$sex_vi*/?>' />
</div>
<div id="viagepiechart" class="piechart">
    <img src='<?/*=$age_vi*/?>' />
</div>
<div id="visocialpiechart" class="piechart">
    <img src='<?/*=$social_vi*/?>' />
</div>
<div id="vicivilpiechart" class="piechart">
    <img src='<?/*=$civil_vi*/?>' />
</div>-->
