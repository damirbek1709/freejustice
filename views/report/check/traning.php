<?php
use yii\helpers\Html;
?>
<div class="report-type-cover">
    <label><?= $model->getAttributeLabel('traning_issue'); ?></label>
    <div class="clear"></div>
    <div class="report-view-sign"><?= $model->traning_issue ? $model->traning_issue : ""; ?></div>
</div>
