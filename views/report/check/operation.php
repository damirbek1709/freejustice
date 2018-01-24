<div class="main-heading centre-align">Технические / Операционные условия:</div>
<div class="report-type-cover">
    <label><?= $model->getAttributeLabel('equipment_issue'); ?></label>
    <div class="clear"></div>
    <div class="report-view-sign"><?= $model->equipment_issue == 1 ? $model->equipment_issue_comment : "Нет"; ?></div>
</div>

<div class="report-type-cover">
    <label><?= $model->getAttributeLabel('lawyer_duty_issue'); ?></label>
    <div class="clear"></div>
    <div class="report-view-sign"><?= $model->lawyer_duty_issue == 1 ? $model->lawyer_duty_issue_comment : "Нет"; ?></div>
</div>

<div class="report-type-cover">
    <label><?= $model->getAttributeLabel('bother_issue'); ?></label>
    <div class="clear"></div>
    <div class="report-view-sign"><?= $model->bother_issue == 1 ? $model->bother_issue_comment : "Нет"; ?></div>
</div>

