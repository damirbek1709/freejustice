<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = $model->getMonth($model->month)." ".$model->year;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-view report-form-type">

    <div class="main-heading"><?= Html::encode($this->title) ?></div>

    <?php
    $items = [
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-stats "></div> Общая статистика консультаций',
            'content' => $this->render('check/general-stats', ['model' => $model]),
            'active' => true,
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-question-sign"></div> Вопросы предоставленных консультаций',
            'content' => $this->render('check/consult', ['model' => $model]),
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-home"></div> По вопросам домашнего насилия',
            'content' => $this->render('check/domestic-violence', ['model' => $model]),
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-folder-open"></div> Технические операционные условия',
            'content' => $this->render('check/operation', ['model' => $model]),
        ],

        [
            'label' => '<div class="tab-icon glyphicon glyphicon-blackboard"></div> Потребности в тренингах',
            'content' => $this->render('check/traning', ['model' => $model]),
        ],
    ];

    echo TabsX::widget([
        'enableStickyTabs' => true,
        'position' => TabsX::POS_LEFT,
        'items' => $items,
        'encodeLabels' => false,
        'options' => ['class' => 'tab-margin']
    ]); ?>

</div>
<script>
    $('.switch-tab').on('click', function () {
        $('html, body').animate({scrollTop: $('.main-heading').position().top}, 'slow');
    });
</script>

