<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$this->render('partials/header');?>

<div class="content">
    <div class="container">
        <div class="site-header"><!----------Шапка сайта------------>
            <div class="row">
                <div class="col-9 align-items-stretch">
                    <div class="site-header-left">
                        <div class="logo">
                            <img src="/theme/img/logo-white.png" alt="">
                        </div>
                        <span>Платформа для онлайн обучения в Satbayev University</span>
                        <div class="tags">
                            <div class="tag-text">Часто задаваемые вопросы</div>
                            <div class="tag-text">Обратная связь</div>
                            <div class="tag-text">Инструкция</div>
                            <div class="tag-text">Регистрация</div>
                        </div>
                        <div class="header-finish"></div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="site-header-right">
                        <img src="/theme/img/5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div> <!----------Шапка сайта-END----------->
        <div class="search-form"> <!--------------Форма поиска------------->
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Поиск по библиотеке" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>Найти</button>
            </div>
        </div><!--------------Форма поиска-END------------>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?=$this->render('partials/footer');?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();