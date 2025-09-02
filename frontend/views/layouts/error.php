<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use common\components\LanguageDropdown;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .hero {
            padding: 12px 0 !important;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 index-page <?=Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? '':'scrolled'?>">
<?php $this->beginBody() ?>

<main role="main" class="flex-shrink-0">
    <section id="hero" class="hero section dark-background" style="background-image: url('/asset/img/hero-bg.jpg');background-size: cover;">
        <div class="container d-flex flex-column align-items-center">
            <?= $content ?>
        </div>
    </section>
</main>

<?php $this->endBody() ?>
<?php if(isset($this->blocks['JsBlock'])):?>
    <?=$this->blocks['JsBlock']?>
<?php endif;?>
<script>

</script>
</body>
</html>
<?php $this->endPage();
