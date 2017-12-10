<script src="https://use.fontawesome.com/02d1fd9ded.js"></script>
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Report;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index report-form-type">

    <?php
    $month_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
        5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
        9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];

    $year_arr = [
        date('Y') => date('Y'),
        date('Y', strtotime('-1 year')) => date('Y', strtotime('-1 year')),
        date('Y', strtotime('-2 year')) => date('Y', strtotime('-2 year'))
    ];
    $user =
    $centre_arr = ArrayHelper::map(\app\models\User::find()
        ->select(['id', 'city'])
        ->andFilterWhere(['!=', 'id', 1])
        ->asArray()->all(),
        'id', 'city');

    $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : 1;
    $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : 12;

    $year_from = isset($_GET["year_from"]) ? $_GET["year_from"] : date('Y');
    $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : date('Y');
    $centre = isset($_GET["centre"]) ? $_GET["centre"] : "";

    $report = new Report();

    $items = [
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-stats "></div> Цифровой отчет',
            'content' => $this->render('details', ['report' => $report,'dataProvider'=>$dataProvider]),
            'active' => true,
        ],
        [
            'label' => '<div class="tab-icon fa fa-line-chart" style="font-size: 35px;"></div> Графический отчет',
            'content' => $this->render('graphics', ['report' => $report,'dataProvider'=>$dataProvider]),
        ],

    ];
    ?>
    <!----------------------------------------------------------------------------------------------------------------->

    <?php
    echo Html::beginForm(['report/index'], 'get', ['class' => '']);
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

    echo Html::endTag('div');

    /*-------------------------------------------------------------------------------------------------*/
    echo Html::tag('div','',['class'=>'col-md-12 top-20-marginer']);

    echo Html::beginTag('div', ['class' => 'col-md-4 pad-remove-left']);
    echo Html::dropDownList('centre', $centre, $centre_arr, ['class' => 'form-control', 'prompt' => 'Все']);
    echo Html::endTag('div');

    echo Html::beginTag('div', ['class' => 'col-md-2 pad-remove-left pad-remove-right']);
    echo Html::tag('button', 'Поиск', ['type' => 'submit', 'class' => 'btn btn-primary' ,'style'=>'width:100%;text-align:center']);
    echo Html::endTag('div');

    //--   -----------------------------------------------------------------------------------------------------


    //$report = $report->getTotal($dataProvider->models, 'men');
    ?>


    <div class="col-md-12 pad-remove top-20-marginer">
        <?
        echo TabsX::widget([
            'enableStickyTabs' => true,
            'items' => $items,
            'encodeLabels' => false,
            'options' => ['class' => 'tab-margin']
        ]); ?>
    </div>

</div>
