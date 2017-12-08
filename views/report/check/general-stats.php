<?

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>

    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'men',
            'women'
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
            'age_20',
            'age_21_35',
            'age_36_60',
            'age_60',
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
            'social_poor',
            'social_pensioner',
            'social_worker',
            'social_unemployed',
            'social_underage',
            'social_disabled',
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
            'civil_kyrgyz_republic',
            'civil_foreign',
            'civil_without',
            'civil_refugee',
        ],
    ]); ?>
</div>
<?= Html::a('Далее', ["report/{$model->id}#w9-tab1"], ['class' => 'btn btn-primary switch-tab']); ?>





