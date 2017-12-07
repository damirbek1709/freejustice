<?php
use yii\helpers\Html;
$link = "create";
if(!$model->isNewRecord)
    $link = "report/update/".$model->id;
?>

<?= $form->field($model, 'vi_men')->textInput() ?>

<?= $form->field($model, 'vi_women')->textInput() ?>

<?= $form->field($model, 'vi_age_20')->textInput() ?>

<?= $form->field($model, 'vi_age_21_35')->textInput() ?>

<?= $form->field($model, 'vi_age_36_60')->textInput() ?>

<?= $form->field($model, 'vi_age_60')->textInput() ?>

<?= $form->field($model, 'vi_social_poor')->textInput() ?>

<?= $form->field($model, 'vi_social_pensioner')->textInput() ?>

<?= $form->field($model, 'vi_social_worker')->textInput() ?>

<?= $form->field($model, 'vi_social_unemployed')->textInput() ?>

<?= $form->field($model, 'vi_social_underage')->textInput() ?>

<?= $form->field($model, 'vi_social_disabled')->textInput() ?>

<?= $form->field($model, 'vi_civil_kyrgyz_republic')->textInput() ?>

<?= $form->field($model, 'vi_civil_foreign')->textInput() ?>

<?= $form->field($model, 'vi_civil_without')->textInput() ?>

<?= $form->field($model, 'vi_civil_refugee')->textInput() ?>

<?=Html::a('Далее',["{$link}#w1-tab3"],['class'=>'btn btn-primary switch-tab']);?>
