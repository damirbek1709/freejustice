<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;

/**
 * ReportSearch represents the model behind the search form about `app\models\Report`.
 */
class ReportSearch extends Report
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'month', 'legacy', 'donation_register', 'private_property', 'entity_registration', 'civil_contract', 'trade_contract', 'donation_contract', 'authority_procedural_action', 'family_law', 'labor_disputes', 'land_disputes', 'housing_disputes', 'social_protection', 'criminal_case', 'administrative_offense', 'moral_material_harm', 'divorce', 'alimony', 'identity_document', 'domestic_violence', 'men', 'women', 'age_20', 'age_21_35', 'age_36_60', 'age_60', 'social_poor', 'social_pensioner', 'social_worker', 'social_unemployed', 'social_underage', 'social_disabled', 'civil_kyrgyz_republic', 'civil_foreign', 'civil_without', 'civil_refugee', 'equipment_issue', 'lawyer_duty_issue', 'bother_issue', 'vi_men', 'vi_women', 'vi_age_20', 'vi_age_21_35', 'vi_age_36_60', 'vi_age_60', 'vi_social_poor', 'vi_social_pensioner', 'vi_social_worker', 'vi_social_unemployed', 'vi_social_underage', 'vi_social_disabled', 'vi_civil_kyrgyz_republic', 'vi_civil_foreign', 'vi_civil_without', 'vi_civil_refugee'], 'integer'],
            [['equipment_issue_comment', 'lawyer_duty_issue_comment', 'bother_issue_comment', 'traning_issue'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Report::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'month' => $this->month,
            'legacy' => $this->legacy,
            'donation_register' => $this->donation_register,
            'private_property' => $this->private_property,
            'entity_registration' => $this->entity_registration,
            'civil_contract' => $this->civil_contract,
            'trade_contract' => $this->trade_contract,
            'donation_contract' => $this->donation_contract,
            'authority_procedural_action' => $this->authority_procedural_action,
            'family_law' => $this->family_law,
            'labor_disputes' => $this->labor_disputes,
            'land_disputes' => $this->land_disputes,
            'housing_disputes' => $this->housing_disputes,
            'social_protection' => $this->social_protection,
            'criminal_case' => $this->criminal_case,
            'administrative_offense' => $this->administrative_offense,
            'moral_material_harm' => $this->moral_material_harm,
            'divorce' => $this->divorce,
            'alimony' => $this->alimony,
            'identity_document' => $this->identity_document,
            'domestic_violence' => $this->domestic_violence,
            'men' => $this->men,
            'women' => $this->women,
            'age_20' => $this->age_20,
            'age_21_35' => $this->age_21_35,
            'age_36_60' => $this->age_36_60,
            'age_60' => $this->age_60,
            'social_poor' => $this->social_poor,
            'social_pensioner' => $this->social_pensioner,
            'social_worker' => $this->social_worker,
            'social_unemployed' => $this->social_unemployed,
            'social_underage' => $this->social_underage,
            'social_disabled' => $this->social_disabled,
            'civil_kyrgyz_republic' => $this->civil_kyrgyz_republic,
            'civil_foreign' => $this->civil_foreign,
            'civil_without' => $this->civil_without,
            'civil_refugee' => $this->civil_refugee,
            'equipment_issue' => $this->equipment_issue,
            'lawyer_duty_issue' => $this->lawyer_duty_issue,
            'bother_issue' => $this->bother_issue,
            'vi_men' => $this->vi_men,
            'vi_women' => $this->vi_women,
            'vi_age_20' => $this->vi_age_20,
            'vi_age_21_35' => $this->vi_age_21_35,
            'vi_age_36_60' => $this->vi_age_36_60,
            'vi_age_60' => $this->vi_age_60,
            'vi_social_poor' => $this->vi_social_poor,
            'vi_social_pensioner' => $this->vi_social_pensioner,
            'vi_social_worker' => $this->vi_social_worker,
            'vi_social_unemployed' => $this->vi_social_unemployed,
            'vi_social_underage' => $this->vi_social_underage,
            'vi_social_disabled' => $this->vi_social_disabled,
            'vi_civil_kyrgyz_republic' => $this->vi_civil_kyrgyz_republic,
            'vi_civil_foreign' => $this->vi_civil_foreign,
            'vi_civil_without' => $this->vi_civil_without,
            'vi_civil_refugee' => $this->vi_civil_refugee,
        ]);

        $query->andFilterWhere(['like', 'equipment_issue_comment', $this->equipment_issue_comment])
            ->andFilterWhere(['like', 'lawyer_duty_issue_comment', $this->lawyer_duty_issue_comment])
            ->andFilterWhere(['like', 'bother_issue_comment', $this->bother_issue_comment])
            ->andFilterWhere(['like', 'traning_issue', $this->traning_issue]);

        return $dataProvider;
    }
}
