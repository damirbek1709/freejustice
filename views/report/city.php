<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>false,
        'options' => [
            'class' => 'list-wrapper',
        ],
        'itemView' => '_item',
        'itemOptions' => [
            'class' => 'grid-div',
        ],
    ]);
    ?>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'month',
                'value'=>function($model){
                    return Html::a("{$model->month} {$model->year}",['/report/view','id'=>$model->id]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
