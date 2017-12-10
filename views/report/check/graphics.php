<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart','bar']});
    google.charts.setOnLoadCallback(drawSexChart);
    google.charts.setOnLoadCallback(drawAgeChart);
    google.charts.setOnLoadCallback(drawSocialChart);
    google.charts.setOnLoadCallback(drawCivilChart);

    google.charts.setOnLoadCallback(drawConsultChart);

    google.charts.setOnLoadCallback(drawViSexChart);
    google.charts.setOnLoadCallback(drawViAgeChart);
    google.charts.setOnLoadCallback(drawViSocialChart);
    google.charts.setOnLoadCallback(drawViCivilChart);

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
        chart.draw(data, options);
    }
    function drawSexChart() {
        var data = google.visualization.arrayToDataTable([
            ['Пол', 'Количество'],
            ['Мужчины', vi_men],
            ['Женщины', vi_women],
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
        var chart = new google.visualization.PieChart(document.getElementById('visexpiechart'));
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
        chart.draw(data, options);
    }

    var legacy = parseInt("<?=$model->legacy;?>");
    var donation_register = parseInt("<?=$model->donation_register;?>");
    var private_property = parseInt("<?=$model->private_property;?>");
    var entity_registration = parseInt("<?=$model->entity_registration;?>");
    var civil_contract = parseInt(" <?=$model->civil_contract;?>");
    var trade_contract = parseInt("<?=$model->trade_contract;?>");
    var donation_contract = parseInt("<?=$model->donation_contract;?>");
    var authority_procedural_action = parseInt("<?=$model->authority_procedural_action;?>");
    var family_law = parseInt("<?=$model->family_law;?>");
    var labor_disputes = parseInt("<?=$model->labor_disputes;?>");
    var land_disputes = parseInt("<?=$model->land_disputes;?>");
    var housing_disputes = parseInt("<?=$model->housing_disputes;?>");
    var social_protection = parseInt("<?=$model->social_protection;?>");
    var criminal_case = parseInt("<?=$model->criminal_case;?>");
    var administrative_offense = parseInt("<?=$model->administrative_offense;?>");
    var moral_material_harm = parseInt("<?=$model->moral_material_harm;?>");
    var divorce = parseInt("<?=$model->divorce;?>");
    var alimony = parseInt("<?=$model->alimony;?>");
    var identity_document = parseInt("<?=$model->identity_document;?>");
    var domestic_violence = parseInt("<?=$model->domestic_violence;?>");

    function drawConsultChart() {
        var data = google.visualization.arrayToDataTable([
            ['Консультации', '',{ role: 'style' }],
            ['Вопросы наследства(завещание)',legacy, '#B03A2E'],
            ['Оформление договора дарения',donation_register, '#76448A'],
            ['Вопросы, связанные с правом собственности',private_property, '#2471A3 '],
            ['Регистрация юридического лица',entity_registration, '#229954'],
            ['Составление гражданско-правовых договоров',civil_contract, '#F1C40F'],
            [ 'Вопросы, связанные с договором купли и продажи',trade_contract,'#D35400'],
            ['Вопросы, связанные с договором дарения',donation_contract, '#5DADE2'],
            ['Вопросы по процессуальным действиям госорганов',authority_procedural_action,'#48C9B0'],
            ['Семейное право',family_law, '#F535AA'],
            ['Трудовые споры',labor_disputes, '#B6B6B4'],
            ['Земельные споры',land_disputes, '#657383'],
            ['Жилищные споры',housing_disputes, '#2B65EC'],
            ['Вопросы социальной защиты(пенсии, пособии)',social_protection, '#FF4500'],
            ['По уголовным делам',criminal_case, '#800000'],
            ['По административным правонарушениям',administrative_offense, '#0000FF'],
            ['О взыскании морального и материального вреда',moral_material_harm, '#FF4000'],
            ['Вопросы расторжении брака(разделение имущества)',divorce, '#1C1C1C'],
            ['Вопросы, связанные с алиментами',alimony, '#9F81F7'],
            ['Оформление документов удостоверяющих личность',identity_document, '#78866B'],
            ['Вопросы, связанные с домашним насилием',domestic_violence, '#806517'],
        ]);

        var options = {
            'title': 'Вопрос предоставленных консультаций',
            'chartArea': {  width: 500,left: 250, top:50,height:720},
            'legend': { position: "none",
                maxLines: 2,
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
            chart.draw(data, options);
    }

</script>

<div id="sexpiechart" class="piechart"></div>
<div id="agepiechart" class="piechart"></div>
<div id="socialpiechart" class="piechart"></div>
<div id="civilpiechart" class="piechart"></div>
<div id="consultbarchart" class="barchart"></div>

<div class="main-heading centre-align" style="margin-top: 35px;">По вопросам домашнего насилия и насильственных действий</div>

<div id="visexpiechart" class="piechart"></div>
<div id="viagepiechart" class="piechart"></div>
<div id="visocialpiechart" class="piechart"></div>
<div id="vicivilpiechart" class="piechart"></div>
