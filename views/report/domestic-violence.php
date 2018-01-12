<?

use yii\helpers\Html;

$link = "create";
if (!$model->isNewRecord) {
    $link = "report/update/" . $model->id;
    $men = $model->vi_men;
    $women = $model->vi_women;
    $age_20 = $model->vi_age_20;
    $age_21_35 = $model->vi_age_21_35;
    $age_36_60 = $model->vi_age_36_60;
    $age_60 = $model->vi_age_60;
    $social_poor = $model->vi_social_poor;
    $social_pensioner = $model->vi_social_pensioner;
    $social_worker = $model->vi_social_worker;
    $social_unemployed = $model->vi_social_unemployed;
    $social_underage = $model->vi_social_underage;
    $social_disabled = $model->vi_social_disabled;
    $civil_kyrgyz_republic = $model->vi_civil_kyrgyz_republic;
    $civil_foreign = $model->vi_civil_foreign;
    $civil_without = $model->vi_civil_without;
    $civil_refugee = $model->vi_civil_refugee;
    $vi_general_amount = $model->vi_general_amount;

}
else{
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
    $vi_general_amount = 0;
}
?>
<div class="report-type-cover">
    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_general_amount'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'vi_general_amount')->textInput(['value' => $vi_general_amount, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>
    <div class="general_heading">
        В том числе по полу:
    </div>
    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_men'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_men')->textInput(['value' => $men, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_women'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_women')->textInput(['value' => $men, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>
</div>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_age_20'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_age_20')->textInput(['value' => $age_20, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_age_21_35'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_age_21_35')->textInput(['value' => $age_21_35, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_age_36_60'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_age_36_60')->textInput(['value' => $age_36_60, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_age_60'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_age_60')->textInput(['value' => $age_60, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>
</div>


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_poor'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_poor')->textInput(['value' => $social_poor, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_pensioner'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_pensioner')->textInput(['value' => $social_pensioner, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_worker'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_worker')->textInput(['value' => $social_worker, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_unemployed'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_unemployed')->textInput(['value' => $social_unemployed, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_underage'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_underage')->textInput(['value' => $social_underage, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_social_disabled'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_social_disabled')->textInput(['value' => $social_disabled, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>
</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_civil_kyrgyz_republic'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_civil_kyrgyz_republic')->textInput(['value' => $civil_kyrgyz_republic, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_civil_foreign'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_civil_foreign')->textInput(['value' => $civil_foreign, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_civil_without'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_civil_without')->textInput(['value' => $civil_without, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>

    <div class="col-md-12 vertical-padder">
        <label class="control-label col-md-3"><?= $model->getAttributeLabel('vi_civil_refugee'); ?></label>
        <div class="col-md-9" <?= $form->field($model, 'v_civil_refugee')->textInput(['value' => $civil_refugee, 'class' => 'col-md-9 form-control'])->label(false); ?>
    </div>
</div>





