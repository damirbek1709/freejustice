<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'Мои отчеты';
?>
<div class="site-index">

    <?php
    foreach ($report as $model):?>
        <div class="grid-div">
            <div class="col-md-6">
                <? echo Html::a("{$model->getMonth($model->month)} {$model->year}", ['/report/view', 'id' => $model->id]); ?>
            </div>

            <div class="col-md-3 righter">
                <? echo Html::a('Редактировать', ['/report/update', 'id' => $model->id], []); ?>
            </div>

            <div class="col-md-3 righter">
                <? echo Html::a('Удалить', ['/report/delete', 'id' => $model->id], ['data-confirm' => 'Удалить ']); ?>
            </div>
        </div>
    <?php endforeach; ?>

    <? /*= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>false,
        'columns' => [
            'id',
            [
                'attribute' => 'month',
                'value' => function ($model) {
                    return $model->getMonth($model->month);
                }
            ],
            'year',
            'date_created',
            'date_updated',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a("<span class='glyphicon glyphicon-eye-open'></span>", $url, [
                            'title' => Yii::t('app', 'Просмотр'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        $d = date_parse_from_format("Y-m-d", $model->date_created);
                        if (date('m') - $d['month'] <= 2) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'Редактировать'),
                            ]);
                        }
                    },
                    'delete' => function ($url, $model) {
                        $d = date_parse_from_format("Y-m-d", $model->date_created);
                        if (date('m') - $d['month'] <= 2 || Yii::$app->user->identity->isAdmin) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'Удалить'),
                                'data-confirm' => 'Вы уверены что хотите удалить отчет?'
                            ]);
                        }
                    }

                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = \yii\helpers\Url::base() . '/report/' . $model->id;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = \yii\helpers\Url::base() . '/report/update/' . $model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = \yii\helpers\Url::base() . '/report/delete/' . $model->id;
                        return $url;
                    }

                }
            ],
        ],
    ]);*/ ?>

</div>
