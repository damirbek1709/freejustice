<script src="https://use.fontawesome.com/02d1fd9ded.js"></script>

<?php
use yii\helpers\Html;
echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF', ['/report/export','layout'=>'details'], [
    'class'=>'btn btn-primary',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
]);
?>
<?=$this->render('details',['report'=>$report,'dataProvider'=>$dataProvider])?>