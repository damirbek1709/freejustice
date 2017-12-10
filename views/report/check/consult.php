<?

use yii\widgets\DetailView;
use yii\helpers\Html;

?>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе:
    </div>
    <?= DetailView::widget([
        'options' => ['class' => 'equal-divider table table-striped table-bordered detail-view'],
        'model' => $model,
        'attributes' => [
            'legacy',
            'donation_register',
            'private_property',
            'entity_registration',
            'vi_civil_contract',
            'trade_contract',
            'donation_contract',
            'authority_procedural_action',
            'family_law',
            'labor_disputes',
            'land_disputes',
            'housing_disputes',
            'social_protection',
            'criminal_case',
            'administrative_offense',
            'moral_material_harm',
            'divorce',
            'alimony',
            'identity_document',
            'domestic_violence',
        ],
    ]);

    ?>
</div>
<?= Html::a('Далее', ["report/{$model->id}#w9-tab2"], ['class' => 'btn btn-primary switch-tab']); ?>

<script>
    var vi_civil_kyrgyz_republic = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_kyrgyz_republic');?>");
    var vi_civil_foreign = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_foreign');?>");
    var vi_civil_without = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_without');?>");
    var vi_civil_refugee = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_refugee');?>");

    function drawViCivilChart() {
        var data = google.visualization.arrayToDataTable([
            ['Гражданский статус', 'Количество'],
            ['Гражданин Кыргызской Республики', vi_civil_kyrgyz_republic],
            ['Иностранцы', vi_civil_foreign],
            ['Лица без гражданства',vi_civil_without],
            ['Беженцы',vi_civil_refugee],
        ]);

        var options = {
            'title': 'Итог консультаций по по гражданскому статусу',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('vicivilpiechart'));
        chart.draw(data, options);
    }

</script>
