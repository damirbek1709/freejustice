<?

use yii\helpers\Html;

$link = "create";
if (!$model->isNewRecord) {
    $link = "report/update/" . $model->id;
    $men = $model->men;
    $women = $model->women;
    $age_20 = $model->age_20;
    $age_21_35 = $model->age_21_35;
    $age_36_60 = $model->age_36_60;
    $age_60 = $model->age_60;
    $social_poor = $model->social_poor;
    $social_pensioner = $model->social_pensioner;
    $social_worker = $model->social_worker;
    $social_unemployed = $model->social_unemployed;
    $social_underage = $model->social_underage;
    $social_disabled = $model->social_disabled;
    $civil_kyrgyz_republic = $model->civil_kyrgyz_republic;
    $civil_foreign = $model->civil_foreign;
    $civil_without = $model->civil_without;
    $civil_refugee = $model->civil_refugee;
    $general_amount = $model->general_amount;

} else {
    $general_amount = 0;
    $men = 0;
    $women = 0;
    $age_20 = 0;
    $age_21_35 = 0;
    $age_36_60 = 0;
    $age_60 = 0;
    $social_poor = 0;
    $social_pensioner = 0;
    $social_worker = 0;
    $social_unemployed = 0;
    $social_underage = 0;
    $social_disabled = 0;
    $civil_kyrgyz_republic = 0;
    $civil_foreign = 0;
    $civil_without = 0;
    $civil_refugee = 0;
}
?>
<div class="clear"></div>
<div class="report-type-cover">

    <div class="main-heading centre-align">Общая статистика консультаций</div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('general_amount'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'general_amount')->textInput(['value' => $general_amount, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="general_heading">
        В том числе по полу:
    </div>


    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('men'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'men')->textInput(['value' => $men, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>


    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('women'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'women')->textInput(['value' => $women, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>
</div>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('age_20'); ?></label>
        <div class="col-md-9"><?= $form->field($model, 'age_20')->textInput(['value' => $age_20, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('age_21_35'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'age_21_35')->textInput(['value' => $age_21_35, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('age_36_60'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'age_36_60')->textInput(['value' => $age_36_60, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('age_60'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'age_60')->textInput(['value' => $age_60, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>
</div>


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_poor'); ?></label>
        <div class="col-md-9"><?= $form->field($model, 'social_poor')->textInput(['value' => $social_poor, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_pensioner'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'social_pensioner')->textInput(['value' => $social_pensioner, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_worker'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'social_worker')->textInput(['value' => $social_worker, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_unemployed'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'social_unemployed')->textInput(['value' => $social_unemployed, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_underage'); ?></label>
        <div class="col-md-9"><?= $form->field($model, 'social_underage')->textInput(['value' => $social_underage, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('social_disabled'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'social_disabled')->textInput(['value' => $social_disabled, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>
</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('civil_kyrgyz_republic'); ?></label>
        <div class="col-md-9"><?= $form->field($model, 'civil_kyrgyz_republic')->textInput(['value' => $civil_kyrgyz_republic, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>
</div>

<div class="report-type-cover">
    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('civil_foreign'); ?></label>
        <div class="col-md-9"><?= $form->field($model, 'civil_foreign')->textInput(['value' => $civil_foreign, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('civil_without'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'civil_without')->textInput(['value' => $civil_without, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('civil_refugee'); ?></label>
        <div class="col-md-9"> <?= $form->field($model, 'civil_refugee')->textInput(['value' => $civil_refugee, 'class' => 'col-md-9 form-control'])->label(false); ?></div>
    </div>
</div>





