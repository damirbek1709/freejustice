<?php

use yii\helpers\Html;

?>
    <div class="main-heading centre-align">Потребности в тренингах:</div>
<?php if ($model->traning_issue): ?>
    <div class="report-type-cover">
        <label><?= $model->getAttributeLabel('traning_issue'); ?></label>
        <div class="clear"></div>
        <div class="report-view-sign"><?= $model->traning_issue; ?></div>
    </div>
<?php else: ?>
    <div class="report-view-sign">Нет комментариев</div>
<?php endif; ?>