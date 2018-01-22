<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use app\models\Report;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */

$this->title = 'Мои отчеты';
?>
<div class="site-index">


    <? echo ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'options' => [
            'class' => 'list-wrapper',
        ],
        'itemView' => '/report/_item',
        'itemOptions' => [
            'class' => 'grid-div',
        ],
    ]);
    ?>

   <!-- <div class="col-md-12 pad-remove top-20-marginer report-form-type">
        <?/*
        echo TabsX::widget([
            'enableStickyTabs' => true,
            'items' => $items,
            'encodeLabels' => false,
            'options' => ['class' => 'tab-margin']
        ]); */?>
    </div>-->


</div>
