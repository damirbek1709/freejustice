<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link href="https://fonts.googleapis.com/css?family=Play:400,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) {
        $items_arr = [
            ['label' => 'Центры', 'url' => ['/site/index']],
            ['label' => 'Управление центрами', 'url' => ['/user/admin']],
            ['label' => 'Отчеты', 'url' => ['/report/index']],
            ['label' => 'История', 'url' => ['/site/history']],
            ['label' => 'Рассылка', 'url' => ['/user/mail']],
//            ['label' => 'Выход', 'url' => ['/user/logout'],
//                'linkOptions' => ['data-method' => 'post']]
        ];
    } elseif (!Yii::$app->user->isGuest && Yii::$app->user->identity->parent!=0) {
        $items_arr = [
            ['label' => 'Мои отчеты', 'url' => ['/site/index']],
            ['label' => 'Сводный отчет', 'url' => ['/site/summary']],
            ['label' => 'Добавить отчет', 'url' => ['/report/create']],
            ['label' => 'Выход', 'url' => ['/user/logout'],
                'linkOptions' => ['data-method' => 'post']]
        ];
    }

    elseif (!Yii::$app->user->isGuest && Yii::$app->user->identity->parent==0) {
        $items_arr = [
            ['label' => 'Центры', 'url' => ['/site/index']],
            ['label' => 'Сводный отчет', 'url' => ['/site/summary']],
            ['label' => 'Добавить отчет', 'url' => ['/report/create']],
            ['label' => 'Выход', 'url' => ['/user/logout'],
                'linkOptions' => ['data-method' => 'post']]
        ];
    }
    ?>
    <div class="container" style="padding: 10px 0 15px">
        <div class="col-md-12 shapka">
            <div class="col-md-3" style="padding-left: 0;">
                <?= Html::a(Html::img(Url::base() . '/images/site/logo.png'), ['/site/index'], ['class' => 'logo']); ?>
            </div>

            <div class="col-md-6">
                <div class="general_heading">Центр по оказании бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР</div>
            </div>
            <div class="col-md-3" style="text-align: right;">
                <?=Html::a('Выход',['/user/logout'],['class'=>'logout-link','data-method'=>'post']);?>
            </div>

        </div>
    </div>

    <div class="container" style="padding-top: 25px;">
        <div class="left-bar col-md-3">
            <?php
            echo Nav::widget([
                'options' => [
                    'class' => 'nav-pills nav-stacked',
                ],
                'items' => $items_arr,
            ]); ?>
        </div>


        <? /*NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            ],
            ]);
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items_arr
            ]);
            NavBar::end();*/
        ?>


        <div class="col-md-9">
            <? /*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget()*/ ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        © Центр по оказанию бесплатной юридической помощи (ЦБЮП)
        Министерства юстиции КР.<br> Все права защищены
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
