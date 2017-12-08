<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = Yii::t('app', 'Create Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-create">

    <div class="main-heading"><?= Html::encode($this->title) ?></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
