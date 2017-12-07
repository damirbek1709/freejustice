<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Добавить пользователя');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'password-recovery-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <div class="form-group">
                    <label class="control-label">ФИО</label>
                    <input class="form-control" type="text" id="maxArea" name="fullmame">
                </div>

                <div class="form-group">
                    <label class="control-label">Город</label>
                    <input class="form-control" type="text" id="maxArea" name="city">
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
