<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-backdrop {
        background-color: transparent !important;
    }
    .form-label {color:#666666}
    .field-loginform-password {margin-top:0 !important;}
</style>
<section id="herox" class="hero section dark-background">
    <img src="/asset/img/hero-bg.jpg" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center">

        <div data-aos="fade-up" data-aos-delay="200" class="row gy-4" style="background: white;padding: 31px;border-radius:7px;max-width: 539px !important;">

            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<!--                <form action="forms/contact.php" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">-->
                    <div class="row gy-4">

<!--                        <div class="col-md-12">-->
<!--                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-12 ">-->
<!--                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">-->
<!--                        </div>-->
                        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <div class="my-1 mx-0" style="color:#999;">
                            <?=Yii::t('app', 'forgot_password')?> <?= Html::a(Yii::t('app', 'resetit'), ['site/request-password-reset']) ?>.
<!--                            <br>-->
<!--                            --><?php //=Yii::t('app', 'newemailverification')?><!-- --><?php //= Html::a(Yii::t('app', 'resendit'), ['site/resend-verification-email']) ?><!--.-->
                        </div>

                        <div class="col-md-12 text-center">
<!--                            <div class="loading">Loading</div>-->
<!--                            <div class="error-message"></div>-->
<!--                            <div class="sent-message">Your message has been sent. Thank you!</div>-->
                            <button type="submit" id="kt_sign_in_submit" style="padding: 7px 27px" onclick="$('#signin_progress_indicator').removeClass('d-none')" class="btn btn-primary">
                                <span class="indicator-label">Sign In</span>
                                <span id="signin_progress_indicator" class="d-none indicator-progress">... Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>

                    </div>
<!--                </form>-->
                <?php ActiveForm::end(); ?>
            </div><!-- End Contact Form -->

        </div>


<!--        <h2 data-aos="fade-up" data-aos-delay="100">PLAN. LAUNCH. GROW.</h2>-->
<!--        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>-->
<!--        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">-->
<!--            <a href="#about" class="btn-get-started">Get Started</a>-->
<!--            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
<!--        </div>-->
    </div>
</section><!-- /Hero Section -->