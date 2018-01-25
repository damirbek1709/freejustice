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
            'divorce',
            'property_division',
            'alimony',
            'parent_rights',
            'family_law',
            'labor_disputes',
            'labor_refund',
            'labor_civil',
            'labor_other',
            'land_disputes',
            'land_trade',
            'housing_disputes',
            'guardianship',
            'social_protection',
            'privileges',
            'social_other',
            'criminal_case',
            'administrative_offense',
            'moral_material_harm',
            'identity_document',
            'evidence_document',
            'document_other',
            'domestic_violence',
            'other',
        ],
    ]);

    ?>
</div>

