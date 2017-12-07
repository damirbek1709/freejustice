<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'month') ?>

    <?= $form->field($model, 'legacy') ?>

    <?php // echo $form->field($model, 'donation_register') ?>

    <?php // echo $form->field($model, 'private_property') ?>

    <?php // echo $form->field($model, 'entity_registration') ?>

    <?php // echo $form->field($model, 'civil_contract') ?>

    <?php // echo $form->field($model, 'trade_contract') ?>

    <?php // echo $form->field($model, 'donation_contract') ?>

    <?php // echo $form->field($model, 'authority_procedural_action') ?>

    <?php // echo $form->field($model, 'family_law') ?>

    <?php // echo $form->field($model, 'labor_disputes') ?>

    <?php // echo $form->field($model, 'land_disputes') ?>

    <?php // echo $form->field($model, 'housing_disputes') ?>

    <?php // echo $form->field($model, 'social_protection') ?>

    <?php // echo $form->field($model, 'criminal_case') ?>

    <?php // echo $form->field($model, 'administrative_offense') ?>

    <?php // echo $form->field($model, 'moral_material_harm') ?>

    <?php // echo $form->field($model, 'divorce') ?>

    <?php // echo $form->field($model, 'alimony') ?>

    <?php // echo $form->field($model, 'identity_document') ?>

    <?php // echo $form->field($model, 'domestic_violence') ?>

    <?php // echo $form->field($model, 'men') ?>

    <?php // echo $form->field($model, 'women') ?>

    <?php // echo $form->field($model, 'age_20') ?>

    <?php // echo $form->field($model, 'age_21_35') ?>

    <?php // echo $form->field($model, 'age_36_60') ?>

    <?php // echo $form->field($model, 'age_60') ?>

    <?php // echo $form->field($model, 'social_poor') ?>

    <?php // echo $form->field($model, 'social_pensioner') ?>

    <?php // echo $form->field($model, 'social_worker') ?>

    <?php // echo $form->field($model, 'social_unemployed') ?>

    <?php // echo $form->field($model, 'social_underage') ?>

    <?php // echo $form->field($model, 'social_disabled') ?>

    <?php // echo $form->field($model, 'civil_kyrgyz_republic') ?>

    <?php // echo $form->field($model, 'civil_foreign') ?>

    <?php // echo $form->field($model, 'civil_without') ?>

    <?php // echo $form->field($model, 'civil_refugee') ?>

    <?php // echo $form->field($model, 'equipment_issue') ?>

    <?php // echo $form->field($model, 'lawyer_duty_issue') ?>

    <?php // echo $form->field($model, 'bother_issue') ?>

    <?php // echo $form->field($model, 'equipment_issue_comment') ?>

    <?php // echo $form->field($model, 'lawyer_duty_issue_comment') ?>

    <?php // echo $form->field($model, 'bother_issue_comment') ?>

    <?php // echo $form->field($model, 'traning_issue') ?>

    <?php // echo $form->field($model, 'vi_men') ?>

    <?php // echo $form->field($model, 'vi_women') ?>

    <?php // echo $form->field($model, 'vi_age_20') ?>

    <?php // echo $form->field($model, 'vi_age_21_35') ?>

    <?php // echo $form->field($model, 'vi_age_36_60') ?>

    <?php // echo $form->field($model, 'vi_age_60') ?>

    <?php // echo $form->field($model, 'vi_social_poor') ?>

    <?php // echo $form->field($model, 'vi_social_pensioner') ?>

    <?php // echo $form->field($model, 'vi_social_worker') ?>

    <?php // echo $form->field($model, 'vi_social_unemployed') ?>

    <?php // echo $form->field($model, 'vi_social_underage') ?>

    <?php // echo $form->field($model, 'vi_social_disabled') ?>

    <?php // echo $form->field($model, 'vi_civil_kyrgyz_republic') ?>

    <?php // echo $form->field($model, 'vi_civil_foreign') ?>

    <?php // echo $form->field($model, 'vi_civil_without') ?>

    <?php // echo $form->field($model, 'vi_civil_refugee') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
