<script src="https://use.fontawesome.com/02d1fd9ded.js"></script>
<div class="text_view">
    <?php
    use yii\helpers\Html;
    $params=Yii::$app->request->queryParams;
    $arr=['/report/export','layout'=>'details'];
    $arr2=array_merge($arr,$params);
    echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF', $arr2, [
        'class'=>'btn btn-primary btn-sm hidden-print',
        'target'=>'_blank',
        'data-toggle'=>'tooltip',
        'title'=>'Откроет сгенерированный PDF в новом окне'
    ]);
    ?>
    <button id="print_text" class="hidden-print btn btn-default btn-sm pull-right"><i class="fa fa-print" aria-hidden="true"></i> Распечатать</button>
    <?=$this->render('details',['report'=>$report,'dataProvider'=>$dataProvider,'range'=>$range])?>
</div>
