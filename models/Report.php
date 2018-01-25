<?php

namespace app\models;

use Yii;

use app\models\User;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $city_id
 * @property integer $month
 * @property integer $legacy
 * @property integer $donation_register
 * @property integer $private_property
 * @property integer $entity_registration
 * @property integer $civil_contract
 * @property integer $trade_contract
 * @property integer $donation_contract
 * @property integer $authority_procedural_action
 * @property integer $family_law
 * @property integer $labor_disputes
 * @property integer $land_disputes
 * @property integer $housing_disputes
 * @property integer $social_protection
 * @property integer $criminal_case
 * @property integer $administrative_offense
 * @property integer $moral_material_harm
 * @property integer $divorce
 * @property integer $alimony
 * @property integer $identity_document
 * @property integer $domestic_violence
 * @property integer $men
 * @property integer $women
 * @property integer $age_20
 * @property integer $age_21_35
 * @property integer $age_36_60
 * @property integer $age_60
 * @property integer $social_poor
 * @property integer $social_pensioner
 * @property integer $social_worker
 * @property integer $social_unemployed
 * @property integer $social_underage
 * @property integer $social_disabled
 * @property integer $civil_kyrgyz_republic
 * @property integer $civil_foreign
 * @property integer $civil_without
 * @property integer $civil_refugee
 * @property integer $equipment_issue
 * @property integer $lawyer_duty_issue
 * @property integer $bother_issue
 * @property string $equipment_issue_comment
 * @property string $lawyer_duty_issue_comment
 * @property string $bother_issue_comment
 * @property string $traning_issue
 * @property integer $vi_men
 * @property integer $vi_women
 * @property integer $vi_age_20
 * @property integer $vi_age_21_35
 * @property integer $vi_age_36_60
 * @property integer $vi_age_60
 * @property integer $vi_social_poor
 * @property integer $vi_social_pensioner
 * @property integer $vi_social_worker
 * @property integer $vi_social_unemployed
 * @property integer $vi_social_underage
 * @property integer $vi_social_disabled
 * @property integer $vi_civil_kyrgyz_republic
 * @property integer $vi_civil_foreign
 * @property integer $vi_civil_without
 * @property integer $vi_civil_refugee
 */
class Report extends \yii\db\ActiveRecord
{
    public $userType;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    public static function getTotal($provider, $columnName)
    {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$columnName];
        }
        return $total;
    }


    public function getDropdownItems($parentId = 0, $level = 0)
    {
        $itemsFormatted = array();

        $items = User::find()->andWhere(['parent' => $parentId])->andFilterWhere(['!=', 'id', 75])->all();

        foreach ($items as $item) {
            $children = User::find()->where("parent=:parent_id", [":parent_id" => $item->id])->all();
            $child_options = [];
            foreach ($children as $child) {
                $child_options[$child->id] = $child->city;
            }
            $itemsFormatted[$item->city] = $child_options;
            //$itemsFormatted += $this->getDropdownItems($item->id, $level + 1);
        }

        return $itemsFormatted;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'month', 'year', 'equipment_issue', 'lawyer_duty_issue', 'bother_issue', 'userType'], 'required'],
            [[
                'general_amount', 'other', 'vi_general_amount', 'date_created', 'date_updated','property_division', 'parent_rights','labor_refund','guardianship','social_other',
                'labor_civil','labor_other','land_trade','privileges','evidence_document','document_other','user_id', 'month', 'equipment_issue_comment', 'lawyer_duty_issue_comment',
                'bother_issue_comment', 'traning_issue', 'sort_date'], 'safe'],

            [['property_division', 'parent_rights','labor_refund','labor_civil','labor_other','land_trade','guardianship','privileges','social_other','evidence_document','document_other',
                'general_amount','vi_general_amount', 'user_id', 'month', 'legacy',
                'donation_register', 'private_property', 'entity_registration', 'civil_contract', 'trade_contract', 'donation_contract', 'authority_procedural_action', 'family_law', 'labor_disputes', 'land_disputes', 'housing_disputes', 'social_protection', 'criminal_case', 'administrative_offense', 'moral_material_harm', 'divorce', 'alimony', 'identity_document', 'domestic_violence', 'men', 'women', 'age_20', 'age_21_35', 'age_36_60', 'age_60', 'social_poor', 'social_pensioner', 'social_worker', 'social_unemployed', 'social_underage', 'social_disabled', 'civil_kyrgyz_republic', 'civil_foreign', 'civil_without', 'civil_refugee', 'equipment_issue', 'lawyer_duty_issue', 'bother_issue', 'vi_men', 'vi_women', 'vi_age_20', 'vi_age_21_35', 'vi_age_36_60', 'vi_age_60', 'vi_social_poor', 'vi_social_pensioner', 'vi_social_worker', 'vi_social_unemployed', 'vi_social_underage', 'vi_social_disabled', 'vi_civil_kyrgyz_republic', 'vi_civil_foreign', 'vi_civil_without', 'vi_civil_refugee'], 'integer'],
            [['traning_issue'], 'string'],
            [['equipment_issue_comment', 'lawyer_duty_issue_comment', 'bother_issue_comment'], 'string', 'max' => 1000],
        ];
    }

    public function getMonth($num)
    {
        $month_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
            5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
            9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];
        return $month_arr[$num];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->date_created = date("Y-m-d");
            $this->date_updated = date("Y-m-d");
        } else {
            $this->date_updated = date("Y-m-d");
        }
        return parent::beforeSave($insert);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'year' => Yii::t('app', 'Год'),
            'month' => Yii::t('app', 'Месяц'),


            'legacy' => Yii::t('app', 'Вопросы, связанные с наследством (завещание, выделение доли из наследства)'),
            'donation_register' => Yii::t('app', 'Вопросы, связанные с дарением имущества и имущественных прав'),
            'private_property' => Yii::t('app', 'Право собственности на движимое и недвижимое имущество (взыскание долга, купля-продажа)'),
            'entity_registration' => Yii::t('app', 'Вопросы, связанные с регистрацией юридического лица'),
            'civil_contract' => Yii::t('app', 'Вопросы, связанные с подрядом, займом, залогом'),
            'divorce' => Yii::t('app', 'Вопросы, связанные с заключением и расторжением брака'),
            'property_division' => Yii::t('app', 'Вопросы, связанные разделением имущества'),
            'alimony' => Yii::t('app', 'Вопросы, связанные с алиментами'),
            'parent_rights'=> Yii::t('app', 'Вопросы, связанные с родительскими правами(лишение, ограничение и восстановление)'),
            'family_law' => Yii::t('app', 'Другие вопросы семейного права'),
            'labor_disputes' => Yii::t('app', 'Вопросы, связанные с трудовым договором'),
            'labor_refund' => Yii::t('app', 'Вопросы, связанные с гарантиями и компенсациями (оплатой) в трудовом праве'),
            'labor_civil' => Yii::t('app', 'Вопросы, связанные с регулированием труда отдельных категорий граждан'),
            'labor_other' => Yii::t('app', 'Другие вопросы трудового права'),
            'land_disputes' => Yii::t('app', 'Вопросы, связанные с предоставлением земельного участка и оформлением документов на земельный участок'),
            'land_trade' => Yii::t('app', 'Передача земельного участка и другие вопросы земельного права'),
            'housing_disputes' => Yii::t('app', 'Жилищное право'),
            'guardianship' => Yii::t('app', 'Вопросы, связанные с опекунством и попечительством'),
            'social_protection' => Yii::t('app', 'Вопросы, связанные с пенсиями и пособиями'),
            'privileges' => Yii::t('app', 'Вопросы, связанные с инвалидностью и льготами'),
            'social_other'=>Yii::t('app', 'Другие вопросы социальной защиты'),
            'criminal_case' => Yii::t('app', 'Уголовное право'),
            'administrative_offense' => Yii::t('app', 'Административные правонарушения'),
            'moral_material_harm' => Yii::t('app', 'Взыскание морального и материального вреда'),
            'identity_document' => Yii::t('app', 'Вопросы, связанные с паспортом и другими документами удостоверяющих личность'),
            'evidence_document'=>'Вопросы, связанные с оформлением свидетельства о рождении и о смерти',
            'document_other'=>'Другие вопросы документирования',
            'domestic_violence' => Yii::t('app', 'Вопросы, связанные с домашним насилием'),
            'other' => Yii::t('app', 'По другим вопросам (не указанным выше)'),






            'men' => Yii::t('app', 'Мужчины'),
            'women' => Yii::t('app', 'Женщины'),
            'age_20' => Yii::t('app', 'Младше 20 лет'),
            'age_21_35' => Yii::t('app', 'от 20 до 35 лет'),
            'age_36_60' => Yii::t('app', 'от 36 до 60 лет'),
            'age_60' => Yii::t('app', 'Старше 60 лет'),
            'social_poor' => Yii::t('app', 'Малоимущие'),
            'social_pensioner' => Yii::t('app', 'Пенсионеры'),
            'social_worker' => Yii::t('app', 'Занятые'),
            'social_unemployed' => Yii::t('app', 'Безработные'),
            'social_underage' => Yii::t('app', 'Несовершеннолетние'),
            'social_disabled' => Yii::t('app', 'ЛОВЗ'),

            'civil_kyrgyz_republic' => Yii::t('app', 'Граждане КР'),
            'civil_foreign' => Yii::t('app', 'Иностранцы'),
            'civil_without' => Yii::t('app', 'Лица без гражданства'),
            'civil_refugee' => Yii::t('app', 'Беженцы'),

            'equipment_issue' => Yii::t('app', 'Были ли какие проблемы с оборудованием в центре?'),
            'lawyer_duty_issue' => Yii::t('app', 'Были ли какие проблемы с соблюдением граффика дежурства адвокатами?'),
            'bother_issue' => Yii::t('app', 'Возникали ли какие нибудь проблемы во время консультаций (конфликт, угроза со стороны клиентов, нарушение конфиденциальности и т.д.)?'),

            'equipment_issue_comment' => Yii::t('app', 'Пожалуйста опишите проблему в деталях'),
            'lawyer_duty_issue_comment' => Yii::t('app', 'Пожалуйста опишите проблему в деталях'),
            'bother_issue_comment' => Yii::t('app', 'Пожалуйста опишите проблему в деталях'),

            'traning_issue' => Yii::t('app', 'Пожалуйста, укажите по каким вопросам, вы бы хотели улучшить свои знания и пройти обучающие тренинги? Напишите как можно подробнее.'),


            'vi_men' => Yii::t('app', 'Мужчины'),
            'vi_women' => Yii::t('app', 'Женщины'),
            'vi_age_20' => Yii::t('app', 'Младше 20 лет'),
            'vi_age_21_35' => Yii::t('app', 'от 20 до 35 лет'),
            'vi_age_36_60' => Yii::t('app', 'от 36 до 60 лет'),
            'vi_age_60' => Yii::t('app', 'Старше 60 лет'),
            'vi_social_poor' => Yii::t('app', 'Малоимущие'),
            'vi_social_pensioner' => Yii::t('app', 'Пенсионеры'),
            'vi_social_worker' => Yii::t('app', 'Занятые'),
            'vi_social_unemployed' => Yii::t('app', 'Безработные'),
            'vi_social_underage' => Yii::t('app', 'Несовершеннолетний'),
            'vi_social_disabled' => Yii::t('app', 'ЛОВЗ'),

            'vi_civil_kyrgyz_republic' => Yii::t('app', 'Граждане КР'),
            'vi_civil_foreign' => Yii::t('app', 'Иностранцы'),
            'vi_civil_without' => Yii::t('app', 'Лица без гражданства'),
            'vi_civil_refugee' => Yii::t('app', 'Беженцы'),

            'date_created' => Yii::t('app', 'Дата добавления'),
            'date_updated' => Yii::t('app', 'Дата изменения'),
            'general_amount' => Yii::t('app', 'Итого консультаций'),
            'vi_general_amount' => Yii::t('app', 'Итого консультаций'),
        ];
    }
}
