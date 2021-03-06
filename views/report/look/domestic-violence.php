<?

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="main-heading centre-align">По вопросам домашнего насилия</div>
<div class="report-type-cover">
    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'vi_general_amount'
        ],
    ]) ?>
    <div class="general_heading">
        В том числе по полу:
    </div>

    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'vi_men',
            'vi_women'
        ],
    ]) ?>
</div>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'vi_age_20',
            'vi_age_21_35',
            'vi_age_36_60',
            'vi_age_60',
        ],
    ]) ?>
</div>


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>
    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'vi_social_poor',
            'vi_social_pensioner',
            'vi_social_worker',
            'vi_social_unemployed',
            'vi_social_underage',
            'vi_social_disabled',
        ],
    ]); ?>

</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>
    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'vi_civil_kyrgyz_republic',
            'vi_civil_foreign',
            'vi_civil_without',
            'vi_civil_refugee',
        ],
    ]); ?>
</div>





