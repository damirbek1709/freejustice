<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages': ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawSexChart);
    google.charts.setOnLoadCallback(drawAgeChart);
    google.charts.setOnLoadCallback(drawSocialChart);
    google.charts.setOnLoadCallback(drawCivilChart);

    google.charts.setOnLoadCallback(drawConsultChart);

    google.charts.setOnLoadCallback(drawViSexChart);
    google.charts.setOnLoadCallback(drawViAgeChart);
    google.charts.setOnLoadCallback(drawViSocialChart);
    google.charts.setOnLoadCallback(drawViCivilChart);

    var men = "<?=$report->getTotal($dataProvider->models, 'men');?>";
    var women = "<?=$report->getTotal($dataProvider->models, 'women');?>";
    men = parseInt(men);
    women = parseInt(women);

    var vi_men = "<?=$report->getTotal($dataProvider->models, 'vi_men');?>";
    var vi_women = "<?=$report->getTotal($dataProvider->models, 'vi_women');?>";
    vi_men = parseInt(vi_men);
    vi_women = parseInt(vi_women);

    function drawSexChart() {
        var data = google.visualization.arrayToDataTable([
            ['Пол', 'Количество'],
            ['Мужчины', men],
            ['Женщины', women],
        ]);

        var options = {
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('sexpiechart'));
        chart.draw(data, options);
    }

    function drawViSexChart() {
        var data = google.visualization.arrayToDataTable([
            ['Пол', 'Количество'],
            ['Мужчины', vi_men],
            ['Женщины', vi_women],
        ]);


        var options = {
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('visexpiechart'));
        chart.draw(data, options);
    }

    var age_20 = "<?=$report->getTotal($dataProvider->models, 'age_20');?>";
    var age_21_35 = "<?=$report->getTotal($dataProvider->models, 'age_21_35');?>";
    var age_36_60 = "<?=$report->getTotal($dataProvider->models, 'age_36_60');?>";
    var age_60 = "<?=$report->getTotal($dataProvider->models, 'age_60');?>";

    age_20 = parseInt(age_20);
    age_21_35 = parseInt(age_21_35);
    age_36_60 = parseInt(age_36_60);
    age_60 = parseInt(age_60);

    var vi_age_20 = "<?=$report->getTotal($dataProvider->models, 'vi_age_20');?>";
    var vi_age_21_35 = "<?=$report->getTotal($dataProvider->models, 'vi_age_21_35');?>";
    var vi_age_36_60 = "<?=$report->getTotal($dataProvider->models, 'vi_age_36_60');?>";
    var vi_age_60 = "<?=$report->getTotal($dataProvider->models, 'vi_age_60');?>";

    vi_age_20 = parseInt(vi_age_20);
    vi_age_21_35 = parseInt(vi_age_21_35);
    vi_age_36_60 = parseInt(vi_age_36_60);
    vi_age_60 = parseInt(vi_age_60);

    var civil_kyrgyz_republic = parseInt("<?=$report->getTotal($dataProvider->models, 'civil_kyrgyz_republic');?>");
    var civil_foreign = parseInt("<?=$report->getTotal($dataProvider->models, 'civil_foreign');?>");
    var civil_without = parseInt("<?=$report->getTotal($dataProvider->models, 'civil_without');?>");
    var civil_refugee = parseInt("<?=$report->getTotal($dataProvider->models, 'civil_refugee');?>");

    function drawAgeChart() {
        var data = google.visualization.arrayToDataTable([
            ['Возраст', 'Количество'],
            ['< 20', age_20],
            ['21-35', age_21_35],
            ['36-60', age_36_60],
            ['60+', age_60],
        ]);

        var options = {
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('agepiechart'));
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
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('viagepiechart'));
        chart.draw(data, options);
    }

    function drawCivilChart() {
        var data = google.visualization.arrayToDataTable([
            ['Гражданский статус', 'Количество'],
            ['Гражданин Кыргызской Республики', civil_kyrgyz_republic],
            ['Иностранцы', civil_foreign],
            ['Лица без гражданства', civil_without],
            ['Беженцы', civil_refugee],
        ]);

        var options = {
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('civilpiechart'));
        chart.draw(data, options);
    }

    var vi_civil_kyrgyz_republic = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_kyrgyz_republic');?>");
    var vi_civil_foreign = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_foreign');?>");
    var vi_civil_without = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_without');?>");
    var vi_civil_refugee = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_civil_refugee');?>");

    function drawViCivilChart() {
        var data = google.visualization.arrayToDataTable([
            ['Гражданский статус', 'Количество'],
            ['Гражданин Кыргызской Республики', vi_civil_kyrgyz_republic],
            ['Иностранцы', vi_civil_foreign],
            ['Лица без гражданства', vi_civil_without],
            ['Беженцы', vi_civil_refugee],
        ]);

        var options = {
            'title': '',
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

    var social_poor = parseInt("<?=$report->getTotal($dataProvider->models, 'social_poor');?>");
    var social_pensioner = parseInt("<?=$report->getTotal($dataProvider->models, 'social_pensioner');?>");
    var social_worker = parseInt("<?=$report->getTotal($dataProvider->models, 'social_worker');?>");
    var social_unemployed = parseInt("<?=$report->getTotal($dataProvider->models, 'social_unemployed');?>");
    var social_underage = parseInt("<?=$report->getTotal($dataProvider->models, 'social_underage');?>");
    var social_disabled = parseInt("<?=$report->getTotal($dataProvider->models, 'social_disabled');?>");

    var vi_social_poor = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_poor');?>");
    var vi_social_pensioner = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_pensioner');?>");
    var vi_social_worker = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_worker');?>");
    var vi_social_unemployed = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_unemployed');?>");
    var vi_social_underage = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_underage');?>");
    var vi_social_disabled = parseInt("<?=$report->getTotal($dataProvider->models, 'vi_social_disabled');?>");

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
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('socialpiechart'));
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
            'title': '',
            'legend.position': 'bottom',
            'width': 550,
            'height': 350,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('visocialpiechart'));
        chart.draw(data, options);
    }

    var legacy = parseInt("<?=$report->getTotal($dataProvider->models, 'legacy');?>");
    var donation_register = parseInt("<?=$report->getTotal($dataProvider->models, 'donation_register');?>");
    var private_property = parseInt("<?=$report->getTotal($dataProvider->models, 'private_property');?>");
    var entity_registration = parseInt("<?=$report->getTotal($dataProvider->models, 'entity_registration');?>");
    var civil_contract = parseInt(" <?=$report->getTotal($dataProvider->models, 'civil_contract');?>");
    var trade_contract = parseInt("<?=$report->getTotal($dataProvider->models, 'trade_contract');?>");
    var donation_contract = parseInt("<?=$report->getTotal($dataProvider->models, 'donation_contract');?>");
    var authority_procedural_action = parseInt("<?=$report->getTotal($dataProvider->models, 'authority_procedural_action');?>");
    var family_law = parseInt("<?=$report->getTotal($dataProvider->models, 'family_law');?>");
    var labor_disputes = parseInt("<?=$report->getTotal($dataProvider->models, 'labor_disputes');?>");
    var land_disputes = parseInt("<?=$report->getTotal($dataProvider->models, 'land_disputes');?>");
    var housing_disputes = parseInt("<?=$report->getTotal($dataProvider->models, 'housing_disputes');?>");
    var social_protection = parseInt("<?=$report->getTotal($dataProvider->models, 'social_protection');?>");
    var criminal_case = parseInt("<?=$report->getTotal($dataProvider->models, 'criminal_case');?>");
    var administrative_offense = parseInt("<?=$report->getTotal($dataProvider->models, 'administrative_offense');?>");
    var moral_material_harm = parseInt("<?=$report->getTotal($dataProvider->models, 'moral_material_harm');?>");
    var divorce = parseInt("<?=$report->getTotal($dataProvider->models, 'divorce');?>");
    var alimony = parseInt("<?=$report->getTotal($dataProvider->models, 'alimony');?>");
    var identity_document = parseInt("<?=$report->getTotal($dataProvider->models, 'identity_document');?>");
    var domestic_violence = parseInt("<?=$report->getTotal($dataProvider->models, 'domestic_violence');?>");

    function drawConsultChart() {
        var data = google.visualization.arrayToDataTable([
            ['Консультации', '', {role: 'style'}],
            ['Вопросы наследства(завещание)', legacy, '#B03A2E'],
            ['Оформление договора дарения', donation_register, '#76448A'],
            ['Вопросы, связанные с правом собственности', private_property, '#2471A3 '],
            ['Регистрация юридического лица', entity_registration, '#229954'],
            ['Составление гражданско-правовых договоров', civil_contract, '#F1C40F'],
            ['Вопросы, связанные с договором купли и продажи', trade_contract, '#D35400'],
            ['Вопросы, связанные с договором дарения', donation_contract, '#5DADE2'],
            ['Вопросы по процессуальным действиям госорганов', authority_procedural_action, '#48C9B0'],
            ['Семейное право', family_law, '#F535AA'],
            ['Трудовые споры', labor_disputes, '#B6B6B4'],
            ['Земельные споры', land_disputes, '#657383'],
            ['Жилищные споры', housing_disputes, '#2B65EC'],
            ['Вопросы социальной защиты(пенсии, пособии)', social_protection, '#FF4500'],
            ['По уголовным делам', criminal_case, '#800000'],
            ['По административным правонарушениям', administrative_offense, '#0000FF'],
            ['О взыскании морального и материального вреда', moral_material_harm, '#FF4000'],
            ['Вопросы расторжении брака(разделение имущества)', divorce, '#1C1C1C'],
            ['Вопросы, связанные с алиментами', alimony, '#9F81F7'],
            ['Оформление документов удостоверяющих личность', identity_document, '#78866B'],
            ['Вопросы, связанные с домашним насилием', domestic_violence, '#806517'],
        ]);

        var options = {
            'title': '',
            'chartArea': {width: 500, left: 250, top: 50, height: 750},
            'legend': {
                position: "none",
                maxLines: 2,
                textStyle: {
                    fontSize: 10
                }
            },
            'width': 770,
            'height': 750,
            'titleTextStyle': {
                'fontName': 'Play',
                'fontSize': 19,
            },
            'hAxis': {textStyle: {fontSize: 11}, format: '0'},
            'vAxis': {textStyle: {fontSize: 11}, format: '0'},

        };
        var chart = new google.visualization.BarChart(document.getElementById('consultbarchart'));
        chart.draw(data, options);
    }

</script>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций по полу</div>
<div id="sexpiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций по возрасту</div>
<div id="agepiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций по социальному статусу</div>
<div id="socialpiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций гражданскому статусу</div>
<div id="civilpiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Вопросы предоставленных консультаций</div>
<div id="consultbarchart" class="barchart"></div>

<div class="main-heading centre-align" style="margin-top: 35px;">По вопросам домашнего насилия и насильственных
    действий
</div>

<div id="visexpiechart" class="piechart"></div>vlb
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций по возрасту</div>
<div id="viagepiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций по социальному статусу</div>
<div id="visocialpiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Итог консультаций гражданскому статусу</div>
<div id="vicivilpiechart" class="piechart"></div>
<div style="font-size: 21px;font-weight: 700;" class="general_heading centre-align">Вопросы предоставленных консультаций</div>
