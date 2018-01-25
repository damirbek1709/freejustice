<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart','bar']});
    google.charts.setOnLoadCallback(drawSexChart);
    google.charts.setOnLoadCallback(drawAgeChart);
    google.charts.setOnLoadCallback(drawSocialChart);
    google.charts.setOnLoadCallback(drawCivilChart);

    google.charts.setOnLoadCallback(drawConsultChart);

    /*google.charts.setOnLoadCallback(drawViSexChart);
    google.charts.setOnLoadCallback(drawViAgeChart);
    google.charts.setOnLoadCallback(drawViSocialChart);
    google.charts.setOnLoadCallback(drawViCivilChart);*/
    google.charts.setOnLoadCallback(removeCss);

    function removeCss(){
        setTimeout(function(){$('#tab2visible').remove();}, 1000);
    }

    var men = "<?=$model->men;?>";
    var women = "<?=$model->women;?>";
    men = parseInt(men);
    women = parseInt(women);

    var vi_men = "<?=$model->vi_men;?>";
    var vi_women = "<?=$model->vi_women;?>";
    vi_men = parseInt(vi_men);
    vi_women = parseInt(vi_women);

    function drawViSexChart() {
        var data = google.visualization.arrayToDataTable([
            ['Пол', 'Количество'],
            ['Мужчины', men],
            ['Женщины', women],
        ]);

        var options = {
            'title': 'Итог консультаций по полу',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('sexpiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('sex_vi_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }
    function drawSexChart() {
        var data = google.visualization.arrayToDataTable([
            ['Пол', 'Количество'],
            ['Мужчины', men],
            ['Женщины', women],
        ]);

        var options = {
            'title': 'Итог консультаций по полу',
            'legend.position': 'bottom',
            'pieSliceTextStyle': {
                'fontSize': 15,
            },
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('sexpiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('sex_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }

    var age_20 = "<?=$model->age_20;?>";
    var age_21_35 = "<?=$model->age_21_35;?>";
    var age_36_60 = "<?=$model->age_36_60;?>";
    var age_60 = "<?=$model->age_60;?>";

    age_20 = parseInt(age_20);
    age_21_35 = parseInt(age_21_35);
    age_36_60 = parseInt(age_36_60);
    age_60 = parseInt(age_60);

    var vi_age_20 = "<?=$model->vi_age_20;?>";
    var vi_age_21_35 = "<?=$model->vi_age_21_35;?>";
    var vi_age_36_60 = "<?=$model->vi_age_36_60;?>";
    var vi_age_60 = "<?=$model->vi_age_60;?>";

    vi_age_20 = parseInt(vi_age_20);
    vi_age_21_35 = parseInt(vi_age_21_35);
    vi_age_36_60 = parseInt(vi_age_36_60);
    vi_age_60 = parseInt(vi_age_60);

    var civil_kyrgyz_republic = parseInt("<?=$model->civil_kyrgyz_republic;?>");
    var civil_foreign = parseInt("<?=$model->civil_foreign;?>");
    var civil_without = parseInt("<?=$model->civil_without;?>");
    var civil_refugee = parseInt("<?=$model->civil_refugee;?>");

    function drawAgeChart() {
        var data = google.visualization.arrayToDataTable([
            ['Возраст', 'Количество'],
            ['< 20', age_20],
            ['21-35', age_21_35],
            ['36-60', age_36_60],
            ['60+', age_60],
        ]);

        var options = {
            'title': 'Итог консультаций по возрасту',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('agepiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('age_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }
    function drawViAgeChart() {
        var data = google.visualization.arrayToDataTable([
            ['Возраст', 'Количество'],
            ['< 20', vi_age_20],
            ['21-35', vi_age_21_35],
            ['36-60', vi_age_36_60],
            ['60+', vi_age_60],
        ]);

        var options = {
            'title': 'Итог консультаций по возрасту',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('viagepiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('age_vi_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }
    function drawCivilChart() {
        var data = google.visualization.arrayToDataTable([
            ['Гражданский статус', 'Количество'],
            ['Гражданин Кыргызской Республики', civil_kyrgyz_republic],
            ['Иностранцы', civil_foreign],
            ['Лица без гражданства',civil_without],
            ['Беженцы',civil_refugee],
        ]);

        var options = {
            'title': 'Итог консультаций по гражданскому статусу',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('civilpiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('civil_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }
    var vi_civil_kyrgyz_republic = parseInt("<?=$model->vi_civil_kyrgyz_republic;?>");
    var vi_civil_foreign = parseInt("<?=$model->vi_civil_foreign;?>");
    var vi_civil_without = parseInt("<?=$model->vi_civil_without;?>");
    var vi_civil_refugee = parseInt("<?=$model->vi_civil_refugee;?>");

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
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('civil_vi_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }

    var social_poor = parseInt("<?=$model->social_poor;?>");
    var social_pensioner = parseInt("<?=$model->social_pensioner;?>");
    var social_worker = parseInt("<?=$model->social_worker;?>");
    var social_unemployed = parseInt("<?=$model->social_unemployed;?>");
    var social_underage = parseInt("<?=$model->social_underage;?>");
    var social_disabled = parseInt("<?=$model->social_disabled;?>");

    var vi_social_poor = parseInt("<?=$model->vi_social_poor;?>");
    var vi_social_pensioner = parseInt("<?=$model->vi_social_pensioner;?>");
    var vi_social_worker = parseInt("<?=$model->vi_social_worker;?>");
    var vi_social_unemployed = parseInt("<?=$model->vi_social_unemployed;?>");
    var vi_social_underage = parseInt("<?=$model->vi_social_underage;?>");
    var vi_social_disabled = parseInt("<?=$model->vi_social_disabled;?>");

    function drawSocialChart() {
        var data = google.visualization.arrayToDataTable([
            ['Социальный статус', 'Количество'],
            ['Малоимущие', social_poor],
            ['Пенсинеры', social_pensioner],
            ['Занятые', social_worker],
            ['Безработные', social_unemployed],
            ['Несовершеннолетние', social_underage],
            ['ЛОВЗ', social_disabled],
        ]);

        var options = {
            'title': 'Итог консультаций по социальному статусу',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('socialpiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('social_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }
    function drawViSocialChart() {
        var data = google.visualization.arrayToDataTable([
            ['Социальный статус', 'Количество'],
            ['Малоимущие', vi_social_poor],
            ['Пенсинеры', vi_social_pensioner],
            ['Занятые', vi_social_worker],
            ['Безработные', vi_social_unemployed],
            ['Несовершеннолетние', vi_social_underage],
            ['ЛОВЗ', vi_social_disabled],
        ]);

        var options = {
            'title': 'Итог консультаций по социальному статусу',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('visocialpiechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('social_vi_input').value = chart.getImageURI();
        });
        chart.draw(data, options);
    }

    var legacy = parseInt("<?=$model->legacy;?>");
    var donation_register = parseInt("<?=$model->donation_register;?>");
    var private_property = parseInt("<?=$model->private_property;?>");
    var entity_registration = parseInt("<?=$model->entity_registration;?>");
    var civil_contract = parseInt("<?=$model->civil_contract;?>");
    var divorce = parseInt("<?=$model->divorce;?>");
    var property_division = parseInt("<?=$model->property_division;?>");
    var alimony = parseInt("<?=$model->alimony;?>");
    var parent_rights = parseInt("<?=$model->parent_rights;?>");
    var family_law = parseInt("<?=$model->family_law;?>");
    var labor_disputes = parseInt("<?=$model->labor_disputes;?>");
    var labor_refund = parseInt("<?=$model->labor_refund;?>");
    var labor_civil = parseInt("<?=$model->labor_civil;?>");
    var labor_other = parseInt("<?=$model->labor_other;?>");
    var land_disputes = parseInt("<?=$model->land_disputes;?>");
    var land_trade = parseInt("<?=$model->land_trade;?>");
    var housing_disputes = parseInt("<?=$model->housing_disputes;?>");
    var guardianship = parseInt("<?=$model->guardianship;?>");
    var social_protection = parseInt("<?=$model->social_protection;?>");
    var privileges = parseInt("<?=$model->privileges;?>");
    var social_other = parseInt("<?=$model->social_other;?>");
    var criminal_case = parseInt("<?=$model->criminal_case;?>");
    var administrative_offense = parseInt("<?=$model->administrative_offense;?>");
    var moral_material_harm = parseInt("<?=$model->moral_material_harm;?>");
    var identity_document = parseInt("<?=$model->identity_document;?>");
    var evidence_document = parseInt("<?=$model->evidence_document;?>");
    var document_other = parseInt("<?=$model->document_other;?>");
    var domestic_violence = parseInt("<?=$model->domestic_violence;?>");
    var other = parseInt("<?=$model->other;?>");



    function drawConsultChart() {
        var data = google.visualization.arrayToDataTable([
            ['Консультации', '',{ role: 'style' }],
            ['Вопросы, связанные с наследством (завещание, выделение доли из наследства)' , legacy,'#B03A2E'],
            ['Вопросы, связанные с дарением имущества и имущественных прав' , donation_register,'#76448A'],
            [ 'Право собственности на движимое и недвижимое имущество (взыскание долга, купля-продажа)' , private_property,'#2471A3 '],
            ['Вопросы, связанные с регистрацией юридического лица' , entity_registration,'#229954'],
            ['Вопросы, связанные с подрядом, займом, залогом' , civil_contract,'#F1C40F'],
            ['Вопросы, связанные с заключением и расторжением брака', divorce,'#D35400'],
            ['Вопросы, связанные разделением имущества' , property_division,'#5DADE2'],
            ['Вопросы, связанные с алиментами' , alimony,'#48C9B0'],
            ['Вопросы, связанные с родительскими правами(лишение, ограничение и восстановление)' , parent_rights,'#F535AA'],
            ['Другие вопросы семейного права' , family_law,'#B6B6B4'],
            ['Вопросы, связанные с трудовым договором' , labor_disputes,'#657383'],
            ['Вопросы, связанные с гарантиями и компенсациями (оплатой) в трудовом праве', labor_refund,'#2B65EC'],
            ['Вопросы, связанные с регулированием труда отдельных категорий граждан' , labor_civil,'#FF4500'],
            ['Другие вопросы трудового права' , labor_other, '#800000'],
            ['Вопросы, связанные с предоставлением земельного участка и оформлением документов на земельный участок' , land_disputes,'#0000FF'],
            ['Передача земельного участка и другие вопросы земельного права', land_trade,'#FF4000'],
            ['Жилищное право' , housing_disputes, '#1C1C1C'],
            ['Вопросы, связанные с опекунством и попечительством', guardianship,'#9F81F7'],
            ['Вопросы, связанные с пенсиями и пособиями' , social_protection,'#78866B'],
            ['Вопросы, связанные с инвалидностью и льготами' , privileges,'#806517'],
            ['Другие вопросы социальной защиты' , social_other,'#B03A2E'],
            ['Уголовное право' , criminal_case ,'#76448A'],
            ['Административные правонарушения' , administrative_offense, '#2471A3 '],
            ['Взыскание морального и материального вреда', moral_material_harm,'#F1C40F'],
            ['Вопросы, связанные с паспортом и другими документами удостоверяющих личность' , identity_document,'#D35400'],
            ['Вопросы, связанные с оформлением свидетельства о рождении и о смерти', evidence_document ,'#F535AA'],
            ['Другие вопросы документирования', document_other, '#B6B6B4'],
            ['Вопросы, связанные с домашним насилием', domestic_violence, '#2B65EC'],
            ['По другим вопросам (не указанным выше)', other, '#FF4500'],
        ]);

        var options = {
            'title': 'Вопрос предоставленных консультаций',
            'chartArea': {  width: 500,left: 250, top:50,height:720},
            'legend': { position: "none",
                maxLines: 2,
                minLines: 2,
                textStyle: {
                    fontSize: 10
                } },
            'width': 770,
            'height': 750,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            },
            'hAxis' : { textStyle : { fontSize: 11},format: '0'},
            'vAxis' : { textStyle : {fontSize: 11},format: '0'},

        };
            var chart = new google.visualization.BarChart(document.getElementById('consultbarchart'));
        google.visualization.events.addListener(chart, 'ready', function () {
            document.getElementById('consult_input').value = chart.getImageURI();
        });
            chart.draw(data, options);
    }

</script>
<div class="graphics_view">
    <button id="print_graphics" class="hidden-print btn btn-default btn-xs pull-right"><i class="fa fa-print" aria-hidden="true"></i> Распечатать</button>
    <form action="/report/export-graph" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <input name='range' type="hidden" value="<?=$model->user->city." - ".$model->getMonth($model->month)." ".$model->year?>" />
        <input name='sex' id='sex_input' type="hidden" />
        <input name='age' id='age_input' type="hidden" />
        <input name='social' id='social_input' type="hidden" />
        <input name='civil' id='civil_input' type="hidden" />
        <input name='consult' id='consult_input' type="hidden" />

        <!--<input name='sex_vi' id='sex_vi_input' type="hidden" />
        <input name='age_vi' id='age_vi_input' type="hidden" />
        <input name='social_vi' id='social_vi_input' type="hidden" />
        <input name='civil_vi' id='civil_vi_input' type="hidden" />-->
        <button type="submit" class="btn btn-primary btn-xs hidden-print" formtarget="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Экспортировать в PDF</button>
    </form>
    <div class="text-center font18 bold play"><?=$model->user->city." - ".$model->getMonth($model->month)." ".$model->year?></div>
    <div id="sexpiechart" class="piechart"></div>
    <div id="agepiechart" class="piechart"></div>
    <div id="socialpiechart" class="piechart"></div>
    <div class="print-page-break"></div>
    <div id="civilpiechart" class="piechart"></div>
    <div id="consultbarchart" class="barchart"></div>

    <div class="print-page-break"></div>
   <!--<div class="main-heading centre-align" style="margin-top: 35px;">По вопросам домашнего насилия и насильственных действий</div>

    <div id="visexpiechart" class="piechart"></div>
    <div id="viagepiechart" class="piechart"></div>
    <div class="print-page-break"></div>
    <div id="visocialpiechart" class="piechart"></div>
    <div id="vicivilpiechart" class="piechart"></div>-->
</div>