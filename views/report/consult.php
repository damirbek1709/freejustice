<?

use yii\helpers\Html;


$link = "create";
if (!$model->isNewRecord) {
    $link = "report/update/" . $model->id;
    $legacy = $model->legacy;
    $donation_register = $model->donation_register;
    $private_property = $model->private_property;
    $entity_registration = $model->entity_registration;
    $civil_contract = $model->civil_contract;
    $divorce = $model->divorce;
    $property_division = $model->property_division;
    $alimony = $model->alimony;
    $parent_rights = $model->parent_rights;
    $family_law = $model->family_law;
    $labor_disputes = $model->labor_disputes;
    $labor_refund = $model->labor_refund;
    $labor_civil = $model->labor_civil;
    $labor_other = $model->labor_other;
    $land_disputes = $model->land_disputes;
    $land_trade = $model->land_trade;
    $housing_disputes = $model->housing_disputes;
    $guardianship = $model->guardianship;
    $social_protection = $model->social_protection;
    $privileges = $model->privileges;
    $social_other = $model->social_other;
    $criminal_case = $model->criminal_case;
    $administrative_offense = $model->administrative_offense;
    $moral_material_harm = $model->moral_material_harm;
    $identity_document = $model->identity_document;
    $evidence_document = $model->evidence_document;
    $document_other = $model->document_other;
    $domestic_violence = $model->domestic_violence;
    $other = $model->other;
    
} else {
    $legacy = 0;
    $donation_register = 0;
    $private_property = 0;
    $entity_registration = 0;
    $civil_contract = 0;
    $divorce = 0;
    $property_division = 0;
    $alimony = 0;
    $parent_rights = 0;
    $family_law = 0;
    $labor_disputes = 0;
    $labor_refund = 0;
    $labor_civil = 0;
    $labor_other = 0;
    $land_disputes = 0;
    $land_trade = 0;
    $housing_disputes = 0;
    $guardianship = 0;
    $social_protection = 0;
    $privileges = 0;
    $social_other = 0;
    $criminal_case = 0;
    $administrative_offense = 0;
    $moral_material_harm = 0;
    $identity_document = 0;
    $evidence_document = 0;
    $document_other = 0;
    $domestic_violence = 0;
    $other = 0;
}
$field_arr = [
    'legacy'=>$legacy ,
    'donation_register'=>$donation_register ,
    'private_property'=>$private_property,
    'entity_registration'=>$entity_registration ,
    'civil_contract'=>$civil_contract,
    'divorce'=>$divorce,
    'property_division'=>$property_division,
    'alimony'=>$alimony,
    'parent_rights'=>$parent_rights,
    'family_law'=>$family_law,
    'labor_disputes'=>$labor_disputes,
    'labor_refund'=>$labor_refund,
    'labor_civil'=>$labor_civil,
    'labor_other'=>$labor_other,
    'land_disputes'=>$land_disputes ,
    'land_trade'=>$land_trade,
    'housing_disputes'=>$housing_disputes ,
    'guardianship'=>$guardianship ,
    'social_protection'=>$social_protection ,
    'privileges'=>$privileges,
    'social_other'=>$social_other,
    'criminal_case'=>$criminal_case ,
    'administrative_offense'=>$administrative_offense ,
    'moral_material_harm'=>$moral_material_harm,
    'identity_document'=>$identity_document,
    'evidence_document'=>$evidence_document ,
    'document_other'=>$document_other ,
    'domestic_violence'=>$domestic_violence ,
    'other'=>$other
];
?>

<div class="report-type-cover">
    <div class="main-heading centre-align">Вопросы предоставленных консультаций</div>
    <div class="general_heading">
        В том числе:
    </div>

    <?php
    foreach ($field_arr as $key=>$val){
        echo Html::beginTag('div',['class'=>'col-md-12 vertical-padder']);
        echo Html::tag('label',$model->getAttributeLabel($key),['class'=>'control-label col-md-6']);
        echo Html::tag('div',$form->field($model, $key)->textInput(['value' => $val, 'class' => 'col-md-6 form-control'])->label(false),['class'=>'col-md-6']);
        echo Html::endTag('div');
    }
    ?>
</div>