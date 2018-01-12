<?php use yii\helpers\Html;
$link = "create";
if(!$model->isNewRecord)
    $link = "report/update/".$model->id;
?>

<?=$form->field($model, 'equipment_issue')->radioList([1 => 'Да', 0 =>'Нет'], ['class' => 'i-checks']);?>
<?= $form->field($model, 'equipment_issue_comment')->textarea(['maxlength' => true,'rows'=>5,'class'=>'fader equip-fader form-control','placeholder'=>'Пожалуйста опишите проблему в деталях'])->label(false) ?>

<?=$form->field($model, 'lawyer_duty_issue')->radioList([1 => 'Да', 0 =>'Нет'], ['class' => 'i-checks']);?>
<?= $form->field($model, 'lawyer_duty_issue_comment')->textarea(['maxlength' => true,'rows'=>5,'class'=>'fader lawyer-fader form-control','placeholder'=>'Пожалуйста опишите проблему в деталях'])->label(false) ?>

<?=$form->field($model, 'bother_issue')->radioList([1 => 'Да', 0 =>'Нет'], ['class' => 'i-checks']);?>
<?= $form->field($model, 'bother_issue_comment')->textarea(['maxlength' => true,'rows'=>5,'class'=>'fader bother-fader form-control','placeholder'=>'Пожалуйста опишите проблему в деталях'])->label(false) ?>

