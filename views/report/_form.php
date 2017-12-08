<?php

use yii\helpers\Html;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form report-form-type">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    $items = [
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-stats "></div> Общая статистика консультаций',
            'content' => $this->render('general-stats', ['form' => $form, 'model' => $model]),
            'active' => true,
            //'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=1'])]
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-question-sign"></div> Вопросы предоставленных консультаций',
            'content' => $this->render('consult', ['form' => $form, 'model' => $model]),
            //'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=2'])]
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-home"></div> По вопросам домашнего насилия',
            'content' => $this->render('domestic-violence', ['form' => $form, 'model' => $model]),
            //'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=2'])]
        ],
        [
            'label' => '<div class="tab-icon glyphicon glyphicon-folder-open"></div> Технические операционные условия',
            'content' => $this->render('operation', ['form' => $form, 'model' => $model]),
            //'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=2'])]
        ],

        [
            'label' => '<div class="tab-icon glyphicon glyphicon-blackboard"></div> Потребности в тренингах',
            'content' => $this->render('traning', ['form' => $form, 'model' => $model]),
            //'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=2'])]
        ],
    ];




    $year_arr = [date('Y')=>date('Y')];
    $month = date('m');
    if($month-1 == 0)
        $year_arr[]=date('Y', strtotime('-1 year'));
    echo $form->field($model, 'year')->dropDownList($year_arr);

    $month_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
        5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
        9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];



    if (!$model->isNewRecord) {
        echo $form->field($model, 'user_id')->hiddenInput(['value' => $model->user_id])->label(false);
        $model->month = $model->month;
    } else {
        $model->month = $month;
        echo $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false);
    }

    echo $form->field($model, 'month')->dropDownList($month_arr);


    echo TabsX::widget([
        'enableStickyTabs' => true,
        'position' => TabsX::POS_LEFT,
        'items' => $items,
        'encodeLabels' => false,
        'options' => ['class' => 'tab-margin']
    ]); ?>

    <div style=""><?= $form->errorSummary($model); ?></div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    $('.switch-tab').on('click', function () {
        $('html, body').animate({scrollTop: $('.field-report-month').position().top}, 'slow');
    });
    $("input[name='Report[equipment_issue]']:radio").click(function () {
        if ($('input[name="Report[equipment_issue]"]:checked').val() == 1) {
            $('.equip-fader').css('display', 'block');
        } else {
            $('.equip-fader').css('display', 'none');
        }
    });

    $("input[name='Report[lawyer_duty_issue]']:radio").click(function () {
        if ($('input[name="Report[lawyer_duty_issue]"]:checked').val() == 1) {
            $('.lawyer-fader').css('display', 'block');
        } else {
            $('.lawyer-fader').css('display', 'none');
        }
    });

    $("input[name='Report[bother_issue]']:radio").click(function () {
        if ($('input[name="Report[bother_issue]"]:checked').val() == 1) {
            $('.bother-fader').css('display', 'block');
        } else {
            $('.bother-fader').css('display', 'none');
        }
    });
</script>
