<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Report;
use app\models\User;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css" id="tab2visible">
    div.tab-content > .tab-pane {
        display: block;
    }
</style>
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
    $centre_arr = ArrayHelper::map(\app\models\User::find()
        ->select(['id', 'city'])
        ->andFilterWhere(['!=', 'id', 1])
        ->andFilterWhere(['!=', 'id', 75])
        ->asArray()->all(),
        'id', 'city');

    $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : 1;
    $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : 12;

    $year_from = isset($_GET["year_from"]) ? $_GET["year_from"] : date('Y');
    $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : date('Y');
    $centre = isset($_GET["centre"]) ? $_GET["centre"] : "";
    $center_name="Все центры";
    if(isset($centre_arr[$centre])){
        $center_name=$centre_arr[$centre];
    }
    if($year_from==$year_till){
        $range=$center_name.", ".$month_arr[$month_from]." - ".$month_arr[$month_till]." ".$year_till;
    }
    else{
        $range=$center_name.", ".$month_arr[$month_from]." ".$year_from." - ".$month_arr[$month_till]." ".$year_till;
    }


    $report = new Report();

    $items = [
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-stats "></div> Цифровой отчет',
            'content' => $this->render('digital', ['report' => $report,'dataProvider'=>$dataProvider,'range'=>$range]),
            'active' => true,
        ],
        [
            'label' => '<div class="tab-icon fa fa-line-chart" style="font-size: 35px;"></div> Графический отчет',
            'content' => $this->render('graphics', ['report' => $report,'dataProvider'=>$dataProvider,'range'=>$range]),
        ],

    ];
    ?>
    <!----------------------------------------------------------------------------------------------------------------->

    <?php
    echo Html::beginForm(['report/index'], 'get', ['class' => 'hidden-print']);
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
    echo Html::tag('div', '', ['class' => 'col-md-12 top-20-marginer']);

    echo Html::beginTag('div', ['class' => 'col-md-4 pad-remove-left']);?>

   <select class="form-control" name="centre">
        <option value="">Место</option>
        <?php
        $items2 = User::find()->andWhere(['parent' => 0])->andFilterWhere(['!=','id',75])->all();

        foreach ($items2 as $item) {
            $children = User::find()->where("parent=:parent_id", [":parent_id"=>$item->id])->all();
            echo Html::tag('option',$item->city,['value'=>$item->id,'class'=>'optionGroup']);
            foreach($children as $child) {
                echo Html::tag('option',"  &nbsp;&nbsp;&nbsp;&nbsp;".$child->city,['value'=>$child->id,'class'=>'optionChild']);
            }
            //$itemsFormatted += $this->getDropdownItems($item->id, $level + 1);
        }
        ?>
    </select>

    <? echo Html::endTag('div');

    echo Html::beginTag('div', ['class' => 'col-md-2 pad-remove-left pad-remove-right']);
    echo Html::tag('button', 'Поиск', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'width:100%;text-align:center']);
    echo Html::endTag('div');
    echo Html::endForm();

    //--   -----------------------------------------------------------------------------------------------------


    //$report = $report->getTotal($dataProvider->models, 'men');
    ?>
    <?
    if(isset($_GET["month_from"])) {
        ?>
        <button onclick="window.print()" class="hidden-print btn btn-default btn-sm pull-right"><i class="fa fa-print" aria-hidden="true"></i> Распечатать</button>
    <?php
    }
    ?>
    <div class="col-md-12 pad-remove top-20-marginer">
        <?
        if (isset($_GET["month_from"])) {
            echo TabsX::widget([
                'enableStickyTabs' => true,
                'items' => $items,
                'encodeLabels' => false,
                'options' => ['class' => 'tab-margin']
            ]);
        }
        ?>
    </div>

</div>
