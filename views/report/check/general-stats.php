<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $model app\models\Report */
?>
<div class="text_view">
    <button id="print_text" class="hidden-print btn btn-default btn-xs pull-right"><i class="fa fa-print" aria-hidden="true"></i> Распечатать</button>
    <?php
    echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF', ['/report/export-view','id'=>$model->id], [
        'class'=>'btn btn-primary btn-xs hidden-print mb10',
        'target'=>'_blank',
        'data-toggle'=>'tooltip',
        'title'=>'Откроет сгенерированный PDF в новом окне'
    ]);
    ?>
    <div class="main-heading centre-align mt0 mb0">Общая статистика консультаций</div>

    <div class="text-center mb20 font18 play bold"><?=$model->user->city." - ".$model->getMonth($model->month)." ".$model->year?></div>

    <div class="report-type-cover">

        <?= DetailView::widget([
            'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
            'model' => $model,
            'attributes' => [
                'general_amount'
            ],
        ]) ?>
        <div class="general_heading">
            В том числе по полу:
        </div>

        <?= DetailView::widget([
            'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
            'model' => $model,
            'attributes' => [
                'men',
                'women'
            ],
        ]) ?>
    </div>
    <div class="report-type-cover">
        <div class="general_heading">
            В том числе по возрастам:
        </div>
        <?= DetailView::widget([
            'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
            'model' => $model,
            'attributes' => [
                'age_20',
                'age_21_35',
                'age_36_60',
                'age_60',
            ],
        ]) ?>
    </div>


    <div class="report-type-cover">
        <div class="general_heading">
            В том числе по социальному статусу:
        </div>
        <?= DetailView::widget([
            'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
            'model' => $model,
            'attributes' => [
                'social_poor',
                'social_pensioner',
                'social_worker',
                'social_unemployed',
                'social_underage',
                'social_disabled',
            ],
        ]); ?>

    </div>

    <div class="report-type-cover">
        <div class="general_heading">
            В том числе по по гражданскому статусу:
        </div>
        <?= DetailView::widget([
            'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
            'model' => $model,
            'attributes' => [
                'civil_kyrgyz_republic',
                'civil_foreign',
                'civil_without',
                'civil_refugee',
            ],
        ]); ?>
    </div>
    <pagebreak />
    <div class="print-page-break"></div>
    <?=$this->render('consult',['model'=>$model]);?>
    <pagebreak />
    <div class="print-page-break"></div>
    <?=$this->render('domestic-violence',['model'=>$model]);?>
    <pagebreak />
    <?=$this->render('operation',['model'=>$model]);?>
    <?=$this->render('traning',['model'=>$model]);?>
</div>