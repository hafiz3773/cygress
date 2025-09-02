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
use common\models\User;

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
    <link rel="icon" type="image/png" href="/icon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .cursor_pointer {cursor: pointer !important;}
        .dropdown-menu a.dropdown-item {color: #343434 !important;}
        .flagicon {width: 25px}
        .dropdown-menu.show {padding: 0px;background: #ffffff40;min-width:31px !important;}
        .alert {z-index:9999 !important;margin-bottom:0px !important;}
        header .cta-btn, .header .cta-btn:focus {
            color: #fffff9 !important;
            font-size: 13px;
            font-weight: 500 !important;
            padding: 7px 15px !important;
            transition: 0.3s;
            border: 1px solid var(--contrast-color) !important;
        }
        /*.acc_ulli li {background: #ffecd0}*/
        .acc_ulli li:hover {background: #ffe7c4
        }
        table.subm tr:hover {
                            background-color: #ffe7c4; /* Light blue, change to whatever you like */
                            cursor: pointer;
                        }
        /*  digital watch style */
        .mini-clock {
            /*position: fixed;*/
            /*bottom: 1rem;*/
            /*left: 1rem;*/
            width: 100px;
            z-index: 1050;
        }
        .clock {
            font-variant-numeric: tabular-nums;
            letter-spacing: .04em;
        }
        .tick {
            display: inline-block;
            transition: transform .2s ease, opacity .2s ease;
        }
        .ticking {
            transform: scale(1.05);
            opacity: .85;
        }
        .progress, .progress-stacked {
            --bs-progress-bar-bg: #fb6f00 !important;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 index-page <?=Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? '':'scrolled'?>">
<?php $this->beginBody() ?>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
             <img src="/iconew.png" alt="" class="d-none d-sm-block">
<!--            <h1 class="sitename">Dewi</h1>-->
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="<?=Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? 'active':''?>"><?=Yii::t('app','home')?></a></li>
<!--                <li><a href="#">About</a></li>-->
<!--                <li><a href="#">Services</a></li>-->

                <?php
                if(!Yii::$app->user->isGuest && (Yii::$app->user->identity->user_status !== User::USER_STUDENT)):?>
                    <li><a href="<?=Url::to(['training/'])?>" class="<?=Yii::$app->controller->id == 'training' ? 'active':''?>">Training</a></li>
                    <li><a href="<?=Url::to(['site/user'])?>" class="<?=Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'user' ? 'active':''?>">User</a></li>
                <?php endif;?>
                <li><a href="<?=Url::to(['attendance/checkin'])?>" class="<?=Yii::$app->controller->id == 'attendance' ? 'active':''?>">Checkin</a></li>
<!--                <li><a href="--><?//=Url::to(['attendance/'])?><!--" class="--><?php //=Yii::$app->controller->id == 'attendance' ? 'active':''?><!--">Attendance</a></li>-->
<!--                <li><a href="#team">Team</a></li>-->
<!--                <li><a href="#contact">Contact</a></li>-->
                <?php if(!Yii::$app->user->isGuest):?>
                    <li class="dropdown"><a href="#"><span>My Account</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul class="acc_ulli">
                            <table class="subm" style="color: #444444;font-size: 19px;">
                                <tr><td style="padding-left: 12px"><i class="bi bi-person-fill"></i></td><td style="padding-right: 12px"> <a href="<?=Url::to(['site/profile'])?>" style="padding: 10px 2px">Profile</a></td></tr>
                                <tr><td style="padding-left: 12px"><i class="bi bi-box-arrow-right"></i></td><td style="padding-right: 12px"><a class="cta-btnx" data-method="post" href="<?=Url::to(['site/logout'])?>" style="padding: 10px 2px"> Logout (<strong><?=Yii::$app->user->identity->user_id?></strong>)</a></td></tr>
                            </table>
                        </ul>
                    </li>
                <?php else :?>
                    <li><a href="<?=Url::to(['site/login'])?>">Login</a></li>
                <?php endif;?>
                <?php if(Yii::$app->user->isGuest):?>
                    <li class="<?=Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'register' ? 'active':''?>"><a href="<?=Url::to(['site/register'])?>">Register</a></li>
                <?php endif;?>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
            <a class="cta-btns dropdown-toggle cursor_pointer ms-md-4" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?= LanguageDropdown::label(Yii::$app->language)?>
            </a>
            <?= Html::decode(LanguageDropdown::widget())?>

        <?php //if(Yii::$app->user->isGuest):?>
<!--            <a class="cta-btn" href="--><?php //=Url::to(['site/login'])?><!--">Login</a>-->
        <?php //else:?>
<!--            <a class="cta-btn" data-method="post" href="--><?php //=Url::to(['site/logout'])?><!--">Logout ( --><?php //=Yii::$app->user->identity->user_id?><!-- )</a>-->
        <?php //endif;?>

    </div>
</header>

<main role="main" class="flex-shrink-0">
        <?php //= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</main>

<footer id="footer" class="footer dark-background">

    <div class="container footer-top d-none">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Dewi</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mb-3">
        <div class="credits">
            <p>&copy;<strong class="px-1 sitename" style="color: #fb6f00"><?= Html::encode(Yii::$app->name) ?></strong> <?= date('Y') ?> <span>All Rights Reserved</span></p>

            <p class="cardx shadowx mini-clockxx">
                <div class="card-body py-1 px-1 text-center">

                    <div class="fw-bold clock mb-2">
                        <span class="tick" id="h">--</span>:
                        <span class="tick" id="m">--</span>:
                        <span class="tick" id="s">--</span>
                    </div>

                    <div class="progress" role="progressbar" aria-label="Minute progress"
                         aria-valuemin="0" aria-valuemax="60" style="height:1px;">
                        <div class="progress-bar" id="minuteBar" style="width:0%"></div>
                    </div>
                </div>
            </p>
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
<!--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon-->

        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<!--<div id="preloader"></div>-->

<?php
$js = <<<JS
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000); //--> milliseconds = 3 seconds
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>
<script>
    const elH = document.getElementById('h');
    const elM = document.getElementById('m');
    const elS = document.getElementById('s');
    const bar = document.getElementById('minuteBar');


    function pad(n) { return String(n).padStart(2, '0'); }

    function tick() {
        const now = new Date();
        let h = now.getHours();
        const m = now.getMinutes();
        const s = now.getSeconds();

        elH.textContent = pad(h);
        elM.textContent = pad(m);
        elS.textContent = pad(s);

        // pulse animation
        [elH, elM, elS].forEach(el => {
            el.classList.remove('ticking');
            void el.offsetWidth;
            el.classList.add('ticking');
            setTimeout(() => el.classList.remove('ticking'), 180);
        });

        // minute progress
        const msIntoMinute = s * 1000 + now.getMilliseconds();
        const pct = (msIntoMinute / 60000) * 100;
        bar.style.width = pct.toFixed(2) + '%';
        bar.setAttribute('aria-valuenow', Math.floor(msIntoMinute / 1000));
    }

    setInterval(tick, 100);
    tick();
</script>
<?php $this->endBody() ?>
<?php if(isset($this->blocks['JsBlock'])):?>
    <?=$this->blocks['JsBlock']?>
<?php endif;?>
<script>
    $('#dropdownMenuButton1').mouseover(function (e) {
        $(this).trigger('click');
    })
</script>
</body>
</html>
<?php $this->endPage();
