<?

use yii\helpers\Html;

$link = "create";
if (!$model->isNewRecord)
    $link = "report/update/" . $model->id;
?>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе:
    </div>
    <div class="col-md-6"><?= $form->field($model, 'legacy')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'donation_register')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'private_property')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'entity_registration')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'civil_contract')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'trade_contract')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'donation_contract')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'authority_procedural_action')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'family_law')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'labor_disputes')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'land_disputes')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'housing_disputes')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'social_protection')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'criminal_case')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'administrative_offense')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'moral_material_harm')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'divorce')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'alimony')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'identity_document')->textInput() ?></div>

    <div class="col-md-6"><?= $form->field($model, 'domestic_violence')->textInput() ?></div>


</div>
<?= Html::a('Далее', ["{$link}#w1-tab2"], ['class' => 'btn btn-primary switch-tab']); ?>