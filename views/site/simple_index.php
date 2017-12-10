<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'Мои отчеты';
?>
<div class="site-index">
    <?php
    echo ListView::widget([
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
</div>
