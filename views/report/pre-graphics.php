<?php
use yii\helpers\Html;
/*echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Экспортировать в PDF', ['/report/export','layout'=>'graphics'], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
]);*/
?>
<?=$this->render('graphics',['report'=>$report,'dataProvider'=>$dataProvider]);?>