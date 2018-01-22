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
    $trade_contract = $model->trade_contract;
    $donation_contract = $model->donation_contract;
    $authority_procedural_action = $model->authority_procedural_action;
    $family_law = $model->family_law;
    $labor_disputes = $model->labor_disputes;
    $land_disputes = $model->land_disputes;
    $housing_disputes = $model->housing_disputes;
    $social_protection = $model->social_protection;
    $criminal_case = $model->criminal_case;
    $administrative_offense = $model->administrative_offense;
    $moral_material_harm = $model->moral_material_harm;
    $divorce = $model->divorce;
    $alimony = $model->alimony;
    $identity_document = $model->identity_document;
    $domestic_violence = $model->domestic_violence;
    $other = $model->other;
} else {
    $legacy = 0;
    $donation_register = 0;
    $private_property = 0;
    $entity_registration = 0;
    $civil_contract = 0;
    $trade_contract = 0;
    $donation_contract = 0;
    $authority_procedural_action = 0;
    $family_law = 0;
    $labor_disputes = 0;
    $land_disputes = 0;
    $housing_disputes = 0;
    $social_protection = 0;
    $criminal_case = 0;
    $administrative_offense = 0;
    $moral_material_harm = 0;
    $divorce = 0;
    $alimony = 0;
    $identity_document = 0;
    $domestic_violence = 0;
    $other = 0;
}
?>
    <div class="report-type-cover">
        <div class="general_heading">
            В том числе:
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('legacy'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'legacy')->textInput(['value' => $legacy, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('donation_register'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'donation_register')->textInput(['value' => $donation_register, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('private_property'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'private_property')->textInput(['value' => $private_property, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('entity_registration'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'entity_registration')->textInput(['value' => $entity_registration, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('civil_contract'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'civil_contract')->textInput(['value' => $civil_contract, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('trade_contract'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'trade_contract')->textInput(['value' => $trade_contract, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('donation_contract'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'donation_contract')->textInput(['value' => $donation_contract, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('authority_procedural_action'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'authority_procedural_action')->textInput(['value' => $authority_procedural_action, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('family_law'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'family_law')->textInput(['value' => $family_law, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('labor_disputes'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'labor_disputes')->textInput(['value' => $labor_disputes, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('land_disputes'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'land_disputes')->textInput(['value' => $land_disputes, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('housing_disputes'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'housing_disputes')->textInput(['value' => $housing_disputes, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('social_protection'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'social_protection')->textInput(['value' => $social_protection, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('criminal_case'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'criminal_case')->textInput(['value' => $criminal_case, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('administrative_offense'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'administrative_offense')->textInput(['value' => $administrative_offense, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('moral_material_harm'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'moral_material_harm')->textInput(['value' => $moral_material_harm, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('divorce'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'divorce')->textInput(['value' => $divorce, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('alimony'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'alimony')->textInput(['value' => $alimony, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('identity_document'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'identity_document')->textInput(['value' => $identity_document, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('domestic_violence'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'domestic_violence')->textInput(['value' => $domestic_violence, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

        <div class="col-md-12 vertical-padder">
            <label class="control-label col-md-6"><?= $model->getAttributeLabel('other'); ?></label>
            <div class="col-md-6" <?= $form->field($model, 'other')->textInput(['value' => $other, 'class' => 'col-md-6 form-control'])->label(false); ?>
        </div>

    </div>