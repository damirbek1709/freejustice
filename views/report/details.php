<?php
use yii\helpers\Html;
?>
<div class="centre-align"><?=$range;?></div>
<div class="main-heading centre-align">Общая статистика консультаций</div>



<div class="report-type-cover">

    <table id="w0" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Итого консультаций</th>
            <td><?= $report->getTotal($dataProvider->models, 'general_amount'); ?></td>
        </tr>
        </tbody>
    </table>
</div>


<div class="report-type-cover">
    <div class="general_heading mt10">
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
            <th>от 21 до 35 лет</th>
            <td><?= $report->getTotal($dataProvider->models, 'age_21_35'); ?></td>
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
            <th>Несовершеннолетние</th>
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
<div class="print-page-break"></div>
<div class="main-heading centre-align mt0">
    Вопросы предоставленных консультаций
</div>

<div class="report-type-cover">
    <?php
    $data_arr = [
        'Вопросы, связанные с наследством (завещание, выделение доли из наследства)'=>'legacy',
        'Вопросы, связанные с дарением имущества и имущественных прав'=>'donation_register',
        'Право собственности на движимое и недвижимое имущество (взыскание долга, купля-продажа)'=>'private_property',
        'Вопросы, связанные с регистрацией юридического лица'=>'entity_registration',
        'Вопросы, связанные с подрядом, займом, залогом'=>'civil_contract',
        'Вопросы, связанные с заключением и расторжением брака'=>'divorce',
        'Вопросы, связанные разделением имущества'=>'property_division',
        'Вопросы, связанные с алиментами'=>'alimony',
        'Вопросы, связанные с родительскими правами(лишение, ограничение и восстановление)'=>'parent_rights',
        'Другие вопросы семейного права'=>'family_law',
        'Вопросы, связанные с трудовым договором'=>'labor_disputes',
        'Вопросы, связанные с гарантиями и компенсациями (оплатой) в трудовом праве'=>'labor_refund',
        'Вопросы, связанные с регулированием труда отдельных категорий граждан'=>'labor_civil',
        'Другие вопросы трудового права'=>'labor_other',
        'Вопросы, связанные с предоставлением земельного участка и оформлением документов на земельный участок'=>'land_disputes',
        'Передача земельного участка и другие вопросы земельного права'=>'land_trade',
        'Жилищное право'=>'housing_disputes',
        'Вопросы, связанные с опекунством и попечительством'=>'guardianship',
        'Вопросы, связанные с пенсиями и пособиями'=>'social_protection',
        'Вопросы, связанные с инвалидностью и льготами'=>'privileges',
        'Другие вопросы социальной защиты'=>'social_other',
        'Уголовное право'=>'criminal_case' ,
        'Административные правонарушения'=>'administrative_offense',
        'Взыскание морального и материального вреда'=>'moral_material_harm',
        'Вопросы, связанные с паспортом и другими документами удостоверяющих личность'=>'identity_document',
        'Вопросы, связанные с оформлением свидетельства о рождении и о смерти'=>'evidence_document' ,
        'Другие вопросы документирования'=>'document_other',
        'Вопросы, связанные с домашним насилием'=>'domestic_violence',
        'По другим вопросам (не указанным выше)'=>'other',
    ]
    ?>

    <div class="general_heading mt0">
        В том числе:
    </div>
    <table id="w4" class="table table-striped table-bordered detail-view">
        <tbody>
        <?php
        foreach ($data_arr as $key=>$val){
            echo Html::beginTag('tr');
            echo Html::tag('th',$key,['style'=>'width:50%']);
            echo Html::tag('td',$report->getTotal($dataProvider->models, $val));
            echo Html::endTag('tr');
        }
        ?>

        </tbody>
    </table>
</div>
<pagebreak />


<!--<div class="main-heading centre-align">По вопросам домашнего насилия</div>-->

<!--<div class="report-type-cover">
    <div class="general_heading">
        В том числе по полу:
    </div>
    <table id="w0" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Мужчины</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_men'); */?></td>
        </tr>
        <tr>
            <th>Женщины</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_men'); */?></td>
        </tr>
        </tbody>
    </table>
</div>-->

<!-----------------------------------------AGE STATUS ------------------------------------------------->


<!--<div class="report-type-cover">
    <div class="general_heading">
        В том числе по возрастам:
    </div>
    <table id="w1" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Младше 20 лет</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_age_20'); */?></td>
        </tr>
        <tr>
            <th><?/*= $report->getTotal($dataProvider->models, 'vi_age_21_35'); */?></th>
            <td>6</td>
        </tr>
        <tr>
            <th>от 36 до 60 лет</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_age_36_60'); */?></td>
        </tr>
        <tr>
            <th>Старше 60 лет</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_age_60'); */?></td>
        </tr>
        </tbody>
    </table>
</div>-->


<!-----------------------------------------SOCIAL STATUS ------------------------------------------------->

<!--<div class="print-page-break"></div>-->
<!--<div class="report-type-cover">
    <div class="general_heading">
        В том числе по социальному статусу:
    </div>
    <table id="w2" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Малоимущие</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_poor'); */?></td>
        </tr>
        <tr>
            <th>Пенсионеры</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_pensioner'); */?></td>
        </tr>
        <tr>
            <th>Занятые</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_worker'); */?></td>
        </tr>
        <tr>
            <th>Безработные</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_unemployed'); */?></td>
        </tr>
        <tr>
            <th>Несовершеннолетний</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_underage'); */?></td>
        </tr>
        <tr>
            <th>ЛОВЗ</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_social_disabled'); */?></td>
        </tr>
        </tbody>
    </table>
</div>-->

<!-----------------------------------------CIVIL STATUS ------------------------------------------------->


<!--<div class="report-type-cover pdf-mb0 pdf-pb0 pdf-bb0">
    <div class="general_heading">
        В том числе по по гражданскому статусу:
    </div>
    <table id="w3" class="equal-divider table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Граждане КР</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_civil_kyrgyz_republic'); */?></td>
        </tr>
        <tr>
            <th>Иностранцы</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_civil_foreign'); */?></td>
        </tr>
        <tr>
            <th>Лица без гражданства</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_civil_without'); */?></td>
        </tr>
        <tr>
            <th>Беженцы</th>
            <td><?/*= $report->getTotal($dataProvider->models, 'vi_civil_refugee'); */?></td>
        </tr>
        </tbody>
    </table>
</div>-->