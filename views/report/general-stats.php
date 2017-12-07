<?

use yii\helpers\Html;

$link = "create";
if (!$model->isNewRecord)
    $link = "report/update/" . $model->id;
?>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'men')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'women')->textInput() ?>
    </div>
</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'age_20')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'age_21_35')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'age_36_60')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'age_60')->textInput() ?>
    </div>
</div>


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по социальному статусу:
    </div>

    <div class="col-md-6"><?= $form->field($model, 'social_poor')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_pensioner')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_worker')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_unemployed')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_underage')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_disabled')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'civil_kyrgyz_republic')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'civil_foreign')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'civil_without')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'civil_refugee')->textInput() ?></div>
</div>

<?= Html::a('Далее', ["{$link}#w1-tab1"], ['class' => 'btn btn-primary switch-tab']); ?>




