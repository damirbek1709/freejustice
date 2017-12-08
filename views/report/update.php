<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = Yii::t('app', 'Редактировать: ', [
    'modelClass' => 'Report',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-update">

    <h1>Редактировать отчет </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
