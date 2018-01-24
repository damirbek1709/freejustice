<script src="https://use.fontawesome.com/02d1fd9ded.js"></script>

<?php
use yii\helpers\Html;
$params=Yii::$app->request->queryParams;
$arr=['/report/export','layout'=>'details'];
$arr2=array_merge($arr,$params);
echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF', $arr2, [
    'class'=>'btn btn-primary hidden-print',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Откроет сгенерированный PDF в новом окне'
]);
?>
<?=$this->render('details',['report'=>$report,'dataProvider'=>$dataProvider,'range'=>$range])?>