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
}
?>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'vi_men')->textInput(['value'=>$men]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'vi_women')->textInput(['value'=>$women]) ?>
    </div>
</div>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'vi_age_20')->textInput(['value'=>$age_20]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'vi_age_21_35')->textInput(['value'=>$age_21_35]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'vi_age_36_60')->textInput(['value'=>$age_36_60]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'vi_age_60')->textInput(['value'=>$age_60]) ?>
    </div>
</div>


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>

    <div class="col-md-6"><?= $form->field($model, 'vi_social_poor')->textInput(['value'=>$social_poor]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_social_pensioner')->textInput(['value'=>$social_pensioner]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_social_worker')->textInput(['value'=>$social_worker]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_social_unemployed')->textInput(['value'=>$social_unemployed]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_social_underage')->textInput(['value'=>$social_underage]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_social_disabled')->textInput(['value'=>$social_disabled]) ?></div>
</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>
    <div class="col-md-6"><?= $form->field($model, 'vi_civil_kyrgyz_republic')->textInput(['value'=>$civil_kyrgyz_republic]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_civil_foreign')->textInput(['value'=>$civil_foreign]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_civil_without')->textInput(['value'=>$civil_without]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'vi_civil_refugee')->textInput(['value'=>$civil_refugee]) ?></div>
</div>

<?= Html::a('Далее', ["{$link}#w1-tab3"], ['class' => 'btn btn-primary switch-tab']); ?>




