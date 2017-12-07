<?
use yii\helpers\Html;
$link = "create";
if(!$model->isNewRecord)
    $link = "report/update/".$model->id;
?>

<?= $form->field($model, 'legacy')->textInput() ?>

<?= $form->field($model, 'donation_register')->textInput() ?>

<?= $form->field($model, 'private_property')->textInput() ?>

<?= $form->field($model, 'entity_registration')->textInput() ?>

<?= $form->field($model, 'civil_contract')->textInput() ?>

<?= $form->field($model, 'trade_contract')->textInput() ?>

<?= $form->field($model, 'donation_contract')->textInput() ?>

<?= $form->field($model, 'authority_procedural_action')->textInput() ?>

<?= $form->field($model, 'family_law')->textInput() ?>

<?= $form->field($model, 'labor_disputes')->textInput() ?>

<?= $form->field($model, 'land_disputes')->textInput() ?>

<?= $form->field($model, 'housing_disputes')->textInput() ?>

<?= $form->field($model, 'social_protection')->textInput() ?>

<?= $form->field($model, 'criminal_case')->textInput() ?>

<?= $form->field($model, 'administrative_offense')->textInput() ?>

<?= $form->field($model, 'moral_material_harm')->textInput() ?>

<?= $form->field($model, 'divorce')->textInput() ?>

<?= $form->field($model, 'alimony')->textInput() ?>

<?= $form->field($model, 'identity_document')->textInput() ?>

<?= $form->field($model, 'domestic_violence')->textInput() ?>

<?=Html::a('Далее',["{$link}#w1-tab2"],['class'=>'btn btn-primary switch-tab']);?>
