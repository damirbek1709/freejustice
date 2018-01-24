<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use app\models\Report;
use app\models\User;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */

$this->title = 'Отчеты';
?>
<div class="site-index">
    <?php
    $month_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
        5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
        9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];

    $year_arr = [
        date('Y') => date('Y'),
        date('Y', strtotime('-1 year')) => date('Y', strtotime('-1 year')),
        date('Y', strtotime('-2 year')) => date('Y', strtotime('-2 year'))
    ];


    $centre_arr = ArrayHelper::map(\app\models\User::find()
        ->select(['id', 'city'])
        ->andFilterWhere(['parent' => Yii::$app->user->id])
        ->asArray()->all(),
        'id', 'city');


    $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : 1;
    $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : 12;

    $year_from = isset($_GET["year_from"]) ? $_GET["year_from"] : date('Y');
    $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : date('Y');

    if (isset($_GET["centre"]) && Yii::$app->user->identity->parent == 0) {
        $centre = $_GET["centre"];
    } else {
        $centre = Yii::$app->user->id;
    }

    echo Html::beginTag('div', ['class' => 'filter-wrapper']);
    echo Html::beginForm(['site/summary'], 'get', ['class' => '']);
    echo Html::beginTag('div', ['class' => 'col-md-6 pad-remove']);

    echo Html::tag('div', 'От', ['class' => 'col-md-2 label-siding']);

    echo Html::beginTag('div', ['class' => 'col-md-5 pad-remove-left']);
    echo Html::dropDownList('month_from', $month_from, $month_arr, ['class' => 'form-control']);
    echo Html::endTag('div');

    echo Html::beginTag('div', ['class' => 'col-md-5 pad-remove-left pad-remove-right']);
    echo Html::dropDownList('year_from', $year_from, $year_arr, ['class' => 'form-control']);
    echo Html::endTag('div');


    echo Html::endTag('div');

    /*-------------------------------------------------------------------------------------------------*/

    echo Html::beginTag('div', ['class' => 'col-md-6 pad-remove']);

    echo Html::tag('div', '- до', ['class' => 'col-md-2 label-siding']);

    echo Html::beginTag('div', ['class' => 'col-md-5 pad-remove-left']);
    echo Html::dropDownList('month_till', $month_till, $month_arr, ['class' => 'form-control']);
    echo Html::endTag('div');

    echo Html::beginTag('div', ['class' => 'col-md-5 pad-remove-left pad-remove-right']);
    echo Html::dropDownList('year_till', $year_till, $year_arr, ['class' => 'form-control']);
    echo Html::endTag('div');

    echo Html::endTag('div'); ?>


    <div class="clear" style="margin-top: 10px;"></div>

    <?
    $report = new Report();
    if (Yii::$app->user->identity->parent == 0) :
        echo Html::beginTag('div', ['class' => 'col-md-3 pad-remove']);

        echo Html::beginTag('div', ['class' => 'col-md-12 ']); ?>

        <select class="form-control" name="centre">
            <option value="">Место</option>
            <?php
            $item2 = User::findOne(Yii::$app->user->id);

            if ($item2) {
                echo Html::tag('option', $item2->city, ['value' => $item2->id, 'class' => 'optionGroup']);
            }
            $children = User::find()->where("parent=:parent_id", [":parent_id" => Yii::$app->user->id])->all();

            foreach ($children as $child) {
                if ($child)
                    echo Html::tag('option', "  &nbsp;&nbsp;&nbsp;&nbsp;" . $child->city, ['value' => $child->id, 'class' => 'optionChild']);
            }
            //$itemsFormatted += $this->getDropdownItems($item->id, $level + 1);

            ?>
        </select>

        <? echo Html::endTag('div');
        echo Html::endTag('div');
    else :

    echo Html::hiddenInput('centre', $centre);
    endif;


    echo Html::beginTag('div', ['class' => 'col-md-3 pad-remove']);
    echo Html::beginTag('div', ['class' => 'col-md-12 ']);
    echo Html::tag('button', 'Поиск', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'width:100%;text-align:center']);
    echo Html::endTag('div');
    echo Html::endTag('div');


    echo Html::endForm();
    echo Html::endTag('div');


    $items = [
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-stats "></div> Цифровой отчет',
            'content' => $this->render('/report/digital', ['report' => $report, 'dataProvider' => $dataProvider]),
            'active' => true,
        ],
        [
            'label' => '<div class="tab-icon fa fa-line-chart" style="font-size: 35px;"></div> Графический отчет',
            'content' => $this->render('/report/pre-graphics', ['report' => $report, 'dataProvider' => $dataProvider]),
        ],

    ];
    ?>

    <div class="col-md-12 pad-remove top-20-marginer report-form-type">
        <?
        if (isset($_GET["year_from"])) {
            echo TabsX::widget([
                'enableStickyTabs' => true,
                'items' => $items,
                'encodeLabels' => false,
                'options' => ['class' => 'tab-margin']
            ]);
        } ?>
    </div>


</div>
