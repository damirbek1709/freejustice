<?

use yii\widgets\DetailView;
use yii\helpers\Html;

?>
<div class="main-heading centre-align">
    Вопросы предоставленных консультаций
</div>
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
            'civil_contract',
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

