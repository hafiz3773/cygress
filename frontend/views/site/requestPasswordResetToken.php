<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-backdrop {
        background-color: transparent !important;
    }
    .form-label {color:#666666}
    .field-loginform-password {margin-top:0 !important;}
</style>
<section id="site_request-password-reset" class="hero section dark-background">
    <img src="/asset/img/hero-bg.jpg" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center">
        <div class="card" style="" data-aos="fade-up" data-aos-delay="200" class="row gy-4">
            <div class="card-header fs-3">
                <?= Html::encode($this->title) ?>
            </div>

            <div class="card-body px-4">
                <label class="form-label" for="">Please fill out your email. A link to reset password will be sent there.</label>

                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>

        <!--        <h2 data-aos="fade-up" data-aos-delay="100">PLAN. LAUNCH. GROW.</h2>-->
        <!--        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>-->
        <!--        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">-->
        <!--            <a href="#about" class="btn-get-started">Get Started</a>-->
        <!--            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
        <!--        </div>-->
    </div>
</section><!-- /Hero Section -->
