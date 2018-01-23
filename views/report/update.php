<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = Yii::t('app', 'Редактировать: ', [
    'modelClass' => 'Report',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model->getMonth($model->month)." ".$model->year, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-update">

    <div class="main-heading">Редактировать отчет за <?=$model->getMonth($model->month)." ".$model->year. " - ". $city?> </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
