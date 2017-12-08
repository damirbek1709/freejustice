<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Мои отчеты';
?>
<div class="site-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                        if (date('m') - $d['month'] <= 2) {
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
                        $url = \yii\helpers\Url::base() . '/report/delete' . $model->id;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>
</div>
