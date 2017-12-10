<?php
use yii\helpers\Html;
echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Экспортировать в PDF', ['/report/export'], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
]);
?>

<div class="main-heading centre-align">Общая статистика консультаций</div>
<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>
    <table id="w0" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Мужчины</th>
            <td><?= $report->getTotal($dataProvider->models, 'men'); ?></td>
        </tr>
        <tr>
            <th>Женщины</th>
            <td><?= $report->getTotal($dataProvider->models, 'women'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<!-----------------------------------------AGE STATUS ------------------------------------------------->


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <table id="w1" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Младше 20 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'age_20'); ?></td>
        </tr>
        <tr>
            <th><?= $report->getTotal($dataProvider->models, 'age_21_35'); ?></th>
            <td>6</td>
        </tr>
        <tr>
            <th>от 36 до 60 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'age_36_60'); ?></td>
        </tr>
        <tr>
            <th>Старше 60 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'age_60'); ?></td>
        </tr>
        </tbody>
    </table>
</div>


<!-----------------------------------------SOCIAL STATUS ------------------------------------------------->

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>
    <table id="w2" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Малоимущие</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_poor'); ?></td>
        </tr>
        <tr>
            <th>Пенсионеры</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_pensioner'); ?></td>
        </tr>
        <tr>
            <th>Занятые</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_worker'); ?></td>
        </tr>
        <tr>
            <th>Безработные</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_unemployed'); ?></td>
        </tr>
        <tr>
            <th>Несовершеннолетний</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_underage'); ?></td>
        </tr>
        <tr>
            <th>ЛОВЗ</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_disabled'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<!-----------------------------------------CIVIL STATUS ------------------------------------------------->

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>
    <table id="w3" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Граждане КР</th>
            <td><?= $report->getTotal($dataProvider->models, 'civil_kyrgyz_republic'); ?></td>
        </tr>
        <tr>
            <th>Иностранцы</th>
            <td><?= $report->getTotal($dataProvider->models, 'civil_foreign'); ?></td>
        </tr>
        <tr>
            <th>Лица без гражданства</th>
            <td><?= $report->getTotal($dataProvider->models, 'civil_without'); ?></td>
        </tr>
        <tr>
            <th>Беженцы</th>
            <td><?= $report->getTotal($dataProvider->models, 'civil_refugee'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<!----------------------------------------------------------------------------------------------->

<div class="main-heading centre-align">
    Вопросы предоставленных консультаций
</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе:
    </div>
    <table id="w4" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Вопросы наследства(завещание)</th>
            <td><?= $report->getTotal($dataProvider->models, 'legacy'); ?></td>
        </tr>
        <tr>
            <th>Оформление договора дарения</th>
            <td><?= $report->getTotal($dataProvider->models, 'donation_register'); ?></td>
        </tr>
        <tr>
            <th>Вопросы, связанные с правом собственности</th>
            <td><?= $report->getTotal($dataProvider->models, 'private_property'); ?></td>
        </tr>
        <tr>
            <th>Регистрация юридического лица</th>
            <td><?= $report->getTotal($dataProvider->models, 'entity_registration'); ?></td>
        </tr>
        <tr>
            <th>Составление гражданско-правовых договоров</th>
            <td><?= $report->getTotal($dataProvider->models, 'civil_contract'); ?></td>
        </tr>
        <tr>
            <th>Вопросы, связанные с договором купли и продажи</th>
            <td><?= $report->getTotal($dataProvider->models, 'trade_contract'); ?></td>
        </tr>
        <tr>
            <th>Вопросы, связанные с договором дарения</th>
            <td><?= $report->getTotal($dataProvider->models, 'donation_contract'); ?></td>
        </tr>
        <tr>
            <th>Вопросы по процессуальным действиям госорганов</th>
            <td><?= $report->getTotal($dataProvider->models, 'authority_procedural_action'); ?></td>
        </tr>
        <tr>
            <th>Семейное право</th>
            <td><?= $report->getTotal($dataProvider->models, 'family_law'); ?></td>
        </tr>
        <tr>
            <th>Трудовые споры</th>
            <td><?= $report->getTotal($dataProvider->models, 'labor_disputes'); ?></td>
        </tr>
        <tr>
            <th>Земельные споры</th>
            <td><?= $report->getTotal($dataProvider->models, 'land_disputes'); ?></td>
        </tr>
        <tr>
            <th>Жилищные споры</th>
            <td><?= $report->getTotal($dataProvider->models, 'housing_disputes'); ?></td>
        </tr>
        <tr>
            <th>Вопросы социальной защиты(пенсии, пособии)</th>
            <td><?= $report->getTotal($dataProvider->models, 'social_protection'); ?></td>
        </tr>
        <tr>
            <th>По уголовным делам</th>
            <td><?= $report->getTotal($dataProvider->models, 'criminal_case'); ?></td>
        </tr>
        <tr>
            <th>По административным правонарушениям</th>
            <td><?= $report->getTotal($dataProvider->models, 'administrative_offense'); ?></td>
        </tr>

        <tr>
            <th>О взыскании морального и материального вреда</th>
            <td><?= $report->getTotal($dataProvider->models, 'moral_material_harm'); ?></td>
        </tr>
        <tr>
            <th>Вопросы расторжении брака(разделение имущества)</th>
            <td><?= $report->getTotal($dataProvider->models, 'divorce'); ?></td>
        </tr>
        <tr>
            <th>Вопросы, связанные с алиментами</th>
            <td><?= $report->getTotal($dataProvider->models, 'alimony'); ?></td>
        </tr>
        <tr>
            <th>Оформление документов удостоверяющих личность</th>
            <td><?= $report->getTotal($dataProvider->models, 'identity_document'); ?></td>
        </tr>
        <tr>
            <th>Вопросы, связанные с домашним насилием</th>
            <td><?= $report->getTotal($dataProvider->models, 'domestic_violence'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="main-heading centre-align">По вопросам домашнего насилия</div>

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>
    <table id="w0" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Мужчины</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_men'); ?></td>
        </tr>
        <tr>
            <th>Женщины</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_men'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<!-----------------------------------------AGE STATUS ------------------------------------------------->


<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <table id="w1" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Младше 20 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_age_20'); ?></td>
        </tr>
        <tr>
            <th><?= $report->getTotal($dataProvider->models, 'vi_age_21_35'); ?></th>
            <td>6</td>
        </tr>
        <tr>
            <th>от 36 до 60 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_age_36_60'); ?></td>
        </tr>
        <tr>
            <th>Старше 60 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_age_60'); ?></td>
        </tr>
        </tbody>
    </table>
</div>


<!-----------------------------------------SOCIAL STATUS ------------------------------------------------->

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>
    <table id="w2" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Малоимущие</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_poor'); ?></td>
        </tr>
        <tr>
            <th>Пенсионеры</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_pensioner'); ?></td>
        </tr>
        <tr>
            <th>Занятые</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_worker'); ?></td>
        </tr>
        <tr>
            <th>Безработные</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_unemployed'); ?></td>
        </tr>
        <tr>
            <th>Несовершеннолетний</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_underage'); ?></td>
        </tr>
        <tr>
            <th>ЛОВЗ</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_social_disabled'); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<!-----------------------------------------CIVIL STATUS ------------------------------------------------->

<div class="report-type-cover">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>
    <table id="w3" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Граждане КР</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_civil_kyrgyz_republic'); ?></td>
        </tr>
        <tr>
            <th>Иностранцы</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_civil_foreign'); ?></td>
        </tr>
        <tr>
            <th>Лица без гражданства</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_civil_without'); ?></td>
        </tr>
        <tr>
            <th>Беженцы</th>
            <td><?= $report->getTotal($dataProvider->models, 'vi_civil_refugee'); ?></td>
        </tr>
        </tbody>
    </table>
</div>