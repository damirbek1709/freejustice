<?php
use yii\helpers\Html;
/*echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF', ['/report/export','layout'=>'graphics'], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Откроет сгенерированный PDF в новом окне'
]);*/
?>
<?=$this->render('graphics',['report'=>$report,'dataProvider'=>$dataProvider]);?>