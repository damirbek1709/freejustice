<?php
use yii\helpers\Html;
?>
<?= $form->field($model, 'traning_issue')->textarea(['rows' => 6]) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
</div>
