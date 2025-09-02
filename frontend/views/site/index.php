<?php

use common\components\LanguageDropdown;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

if($user)
    $dialog = true;
else
    $dialog = false;

if ($dialog) {
    $this->registerJs('const myModal = new bootstrap.Modal("#welcomeModal");myModal.show();');
}
?>
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">



    <img src="/asset/img/hero-bg.jpg" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center">

        <h2 data-aos="fade-up" data-aos-delay="100">PLAN. LAUNCH. GROW.</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            <a href="<?=\yii\helpers\Url::to(['site/register'])?>" class="btn-get-started">Let's Joining</a>
<!--            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
        </div>
    </div>
</section><!-- /Hero Section -->

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#welcomeModal">-->
<!--    Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true" style="margin-top:71px !important;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
<!--            <div class="modal-header">-->
<!--                <h1 class="modal-title fs-5" id="welcomeModalLabel">Modal title</h1>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
            <div class="modal-body">
                <div class="card border-secondaryxxx mb-3 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="z-index:9999">
                    <div class="card-body text-secondary">
                        <h3 class="text-center" style="padding: 15px 5px;color: #fb6f00"><?=Yii::t('app','register_p20')?> <?=$user->nick_name ?? ''?> 🎉</h3>
                        <p class="text-start"><?=Yii::t('app','register_p21')?></p><br>
                        <p class="text-start"><strong><?=Yii::t('app','register_p22')?></strong></p>
                        <ul class="text-start">
                            <li><?=Yii::t('app','register_p22_1')?></li>
                            <li><?=Yii::t('app','register_p22_2')?></li>
                            <li><?=Yii::t('app','register_p22_3')?></li>
                            <li><?=Yii::t('app','register_p22_4')?></li>
                            <li><?=Yii::t('app','register_p22_5')?></li>
                        </ul>
                        <p class="text-start"><?=Yii::t('app','register_p23')?>🚀</p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('.btn-close').trigger('click')" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    // window.onload = () => {
        // const myModal = new bootstrap.Modal('#welcomeModal');
        //     myModal.show();

    // }
</script>
