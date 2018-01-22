<?php

use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: damir
 * Date: 09.12.2017
 * Time: 13:29
 */
?>

<div class="col-md-6">
    <? echo Html::a("{$model->getMonth($model->month)} {$model->year}", ['/report/view', 'id' => $model->id]); ?>
</div>

<div class="col-md-3 righter">
    <?echo Html::a('Редактировать',['/report/update','id'=>$model->id],[]);?>
</div>

<div class="col-md-3 righter">
    <?echo Html::a('Удалить',['/report/delete','id'=>$model->id],['data-confirm'=>'Удалить ']);?>
</div>
