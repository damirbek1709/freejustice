<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = $model->user->city." - ".$model->getMonth($model->month)." ".$model->year;
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css" id="tab2visible">
    div.tab-content > .tab-pane {
        display: block;
    }
</style>
<div class="report-view report-form-type">

    <!--<button onclick="window.print()" class="hidden-print btn btn-default btn-sm pull-right"><i class="fa fa-print" aria-hidden="true"></i> Распечатать</button>-->
    <!--<div class="main-heading"><?/*= Html::encode($this->title) */?></div>-->

    <?php
    $items = [
        [
            'label' => '<div class="text_view"><i class="tab-icon glyphicon glyphicon-stats "></i> Цифровой отчет</div>',
            'content' => $this->render('check/general-stats', ['model' => $model]),
            'active' => true,
        ],
        [
            'label' => '<div class="graphics_view"><i class="tab-icon fa fa-line-chart" style="font-size: 35px;"></i> Графический отчет</div>',
            'content' => $this->render('check/graphics', ['model' => $model]),
        ],
        /*[
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
        ],*/
    ];

    echo TabsX::widget([
        'enableStickyTabs' => true,
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

