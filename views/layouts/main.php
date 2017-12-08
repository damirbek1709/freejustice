<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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
            ['label' => 'Отчеты', 'url' => ['/site/index']],
            ['label' => 'Пользователи', 'url' => ['/user/admin']],
            ['label' => 'Выход', 'url' => ['/user/logout'],
                'linkOptions' => ['data-method' => 'post']]
        ];
    } else {
        $items_arr = [
            ['label' => 'Мои отчеты', 'url' => ['/site/index']],
            ['label' => 'Добавить отчет', 'url' => ['/report/create']],
            ['label' => 'Выход', 'url' => ['/user/logout'],
                'linkOptions' => ['data-method' => 'post']]
        ];
    }

    NavBar::begin([
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
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
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
