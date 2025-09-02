<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$netball_positions = [
    Yii::t('app','register_p17') => Yii::t('app','register_p17'),
    Yii::t('app','register_p18') => Yii::t('app','register_p18'),
    'GK' => 'Goal Keeper',
    'GD' => 'Goal Defence',
    'WD' => 'Wing Defense',
    'C' => 'Centre',
    'WA' => 'Wing Attack',
    'GA' => 'Goal Attack',
    'GS' => 'Goal Shooter'
];

?>
<style>
    .services .details p {
        font-size: 17px;
    }
    .card:hover {border:1px solid #ff7100 !important}
    section {margin-top: 31px}
    .card-header {background-color: #fff4ef !important;font-weight: 500;color: #003466 !important;font-size: 18px;}
    #header {background-color: rgba(21, 34, 43, 0.85) !important}
    @media only screen and (max-width: 600px) {
        .p1 {margin: -309px 12px 21px !important;}
    }
    label.form-label {float:left !important;color: #003466 !important}
    small {color:#fb6f00 !important;font-size: 0.57rem}

    #signupform-illness::placeholder, #signupform-address::placeholder, ::placeholder {
        color: #fcc689 !important;
        opacity: 1; /* Firefox */
    }

    #signupform-illness::-ms-input-placeholder, #signupform-address::-ms-input-placeholder, ::-ms-input-placeholder { /* Edge 12-18 */
        color: #fcc689 !important;
    }
    /* Most modern browsers */
    textarea::placeholder {
        color: #000000 !important; /* Replace with your color value (e.g., red, #007bff, rgba(0, 0, 0, 0.5)) */
        opacity: 1; /* Firefox needs this to fully show the placeholder */
    }

    /* Older versions of Chrome, Safari and Opera */
    textarea::-webkit-input-placeholder {
        color: #000000 !important;
    }

    /* Older versions of Firefox */
    textarea:-moz-placeholder {
        color: #000000 !important;
        opacity: 1; /* For older Firefox versions */
    }

    /* Older versions of Internet Explorer 10 and 11 */
    textarea:-ms-input-placeholder {
        color: #000000 !important;
    }
</style>

<section id="services" class="services section mt-5">

    <!-- Section Title -->
    <div class="container section-title mt-0 mt-sm-4" data-aos="fade-up">
        <h2><?=Yii::t('app','register_p00')?></h2>
        <p style="font-size: 18px"><?=Yii::t('app','register_p0')?></p>
    </div><!-- End Section Title -->

    <div class="container p-0 p-sm-2" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5 mx-0 mx-sm-5 mb-4">

            <div class="col-xl-12 col-md-12 p-0 p-sm-4 mt-0" data-aos="zoom-in" data-aos-delay="300">
                <div class="service-item">
                    <div class="img" style="height: 433px !important;">
                        <img src="/asset/img/register1.png" id="registration_main_img" style="width: 100%" class="img-fluid" alt="">
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <div id="signup_form1" class="details position-relative p1 px-1 px-sm-4">
                            <div class="icon">
                                <img src="/asset/img/ball1.png" alt="" style="width:73px">
<!--                                <i class="bi bi-broadcast"></i>-->
                            </div>
                            <div class="card border-secondaryxxx mb-3 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="">
                                <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt1')?></div>
                                <div class="card-body text-secondary">
                                    <h3><?=Yii::t('app','register_p1')?></h3>
                                    <p class="text-start"><?=Yii::t('app','register_p2')?></p>
                                </div>
                            </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt2')?></div>
                            <div class="card-body text-secondary">
                                <ol style="text-align: left;line-height: 2.8;">
                                    <li><p><?=Yii::t('app','register_p3')?></p></li>
                                    <li><p><?=Yii::t('app','register_p4')?></p></li>
                                </ol>

                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt3')?></div>
                            <div class="card-body text-secondary">
                                <ol style="text-align: left;line-height: 2.8;">
                                    <li><p><?=Yii::t('app','register_p5')?></p></li>
                                    <li><p><?=Yii::t('app','register_p6')?></p></li>
                                    <li><p><?=Yii::t('app','register_p7')?></p></li>
                                </ol>

                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt4')?></div>
                            <div class="card-body text-secondary">
                                <ol style="text-align: left;line-height: 2.8;">
                                    <li><p><?=Yii::t('app','register_p8')?></p></li>
                                    <li><p><?=Yii::t('app','register_p9')?></p></li>
                                </ol>

                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt5')?></div>
                            <div class="card-body text-secondary">
                                <ol style="text-align: left;line-height: 2.8;">
                                    <li><p><?=Yii::t('app','register_p10')?></p></li>
                                    <li><p><?=Yii::t('app','register_p11')?></p></li>
                                </ol>

                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt6')?></div>
                            <div class="card-body text-secondary">
                                <ol style="text-align: left;line-height: 2.8;">
                                    <li><p><?=Yii::t('app','register_p12')?></p></li>
                                    <li><p><?=Yii::t('app','register_p13')?></p></li>
                                </ol>

                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt7')?></div>
                            <div class="card-body text-secondary-emphasis text-start">
                                <strong style="font-size: 17px"><?=Yii::t('app','register_p14')?></strong>
                                <div class="form-check form-switch" style="cursor: pointer;font-size: 21px;margin-top: 15px">
                                    <input class="form-check-input" type="checkbox" id="tnc_button" name="tnc" value="<?=Yii::t('app','register_pt71')?>">
                                    <label class="form-check-label" for="tnc_button"><?=Yii::t('app','register_pt71')?></label>
                                </div>

                            </div>
                            <div id="next1" class="card-footer d-none">
                                <a id="next_btn1" class="btn btn-primary float-end"><?=Yii::t('app','register_p15')?> <i style="font-weight: bold" class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        </div>
                        <div id="signup_form2" class="details position-relative p1 px-1 px-sm-4 d-none">
                            <div class="icon">
                                <i class="bi bi-broadcast"></i>
                            </div>
                            <div class="icon">
                                <img src="/asset/img/ball1.png" alt="" style="width:73px">
<!--                            <i class="bi bi-broadcast"></i>-->
                        </div>
                        <div class="card border-secondaryxxx mb-3 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="">
                            <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt1')?></div>
                            <div class="card-body text-secondary">
                                <p class="text-start"><?=Yii::t('app','register_p16')?></p>
                            </div>
                        </div>
                            <div class="card border-secondaryxxx mb-3" style="">
                                <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt8')?></div>
                                <div class="card-body text-secondary">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'full_name')->textInput(['placeholder' => Yii::t('app', 'full_name')])->label(Yii::t('app',"full_name"). ' <small>'.Yii::t('app',"full_name1").'</small>') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'nick_name')->textInput(['placeholder' => Yii::t('app', 'nick_name')])->label(Yii::t('app',"nick_name")) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'email')])->label(Yii::t('app','email')) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'password')])->label(Yii::t('app','password')) ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'ic')->textInput(['placeholder' => Yii::t('app', 'ic'), 'maxlength' => 12])->label(Yii::t('app','ic')) ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('app', 'phone')])->label(Yii::t('app','phone')) ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'phone1')->textInput(['placeholder' => Yii::t('app', 'phone1')])->label(Yii::t('app','phone1')) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'address')->textarea(['placeholder' => Yii::t('app', 'address')])->label(Yii::t('app','address')) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'illness')->textarea(['placeholder' => Yii::t('app', 'illness')])->label(Yii::t('app','illness')) ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card border-secondaryxxx mb-3 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="">
                                <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt9')?></div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12"><h3 style="font-weight: 600;font-size: 19px" class="text-decoration-underline"><?=Yii::t('app','register_pt10')?></h3></div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact1_fullname')->textInput(['placeholder' => Yii::t('app', 'econtact1_fullname')])->label(Yii::t('app',"econtact1_fullname")) ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact1_phone')->textInput(['placeholder' => Yii::t('app', 'econtact1_phone')])->label(Yii::t('app',"econtact1_phone")) ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact1_relation')->textInput(['placeholder' => Yii::t('app', 'econtact1_relation')])->label(Yii::t('app',"econtact1_relation")) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12"><h3 style="font-weight: 600;font-size: 19px" class="text-decoration-underline"><?=Yii::t('app','register_pt11')?></h3></div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact2_fullname')->textInput(['placeholder' => Yii::t('app', 'econtact2_fullname')])->label(Yii::t('app',"econtact2_fullname")) ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact2_phone')->textInput(['placeholder' => Yii::t('app', 'econtact2_phone')])->label(Yii::t('app',"econtact2_phone")) ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'econtact2_relation')->textInput(['placeholder' => Yii::t('app', 'econtact2_relation')])->label(Yii::t('app',"econtact2_relation")) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-secondaryxxx mb-3 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="">
                                <div class="card-header" style="text-align: left"><?=Yii::t('app','register_pt12')?></div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12"><h3 style="font-weight: 600;font-size: 19px" class="text-decoration-underline"><?=Yii::t('app','register_pt13')?></h3></div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'experience')->dropDownList(
                                                        [
                                                            Yii::t('app','experience_1') => Yii::t('app','experience_1'),
                                                            Yii::t('app','experience_2') => Yii::t('app','experience_2'),
                                                            Yii::t('app','experience_3') => Yii::t('app','experience_3'),
                                                            Yii::t('app','experience_4') => Yii::t('app','experience_4'),
                                                        ],
                                                        ['prompt' => Yii::t('app','experience_0')]
                                                    )->label(false) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12"><h3 style="font-weight: 600;font-size: 19px" class="text-decoration-underline"><?=Yii::t('app','register_pt14')?></h3></div>
                                                <div class="col-md-12">
                                                    <?= $form->field($model, 'position')->widget(Select2::classname(), [
                                                        'data' => $netball_positions,
                                                        'options' => ['placeholder' => Yii::t('app','register_p19'), 'multiple' => true],
                                                        'pluginOptions' => [
                                                            // Add any specific Select2 plugin options for multiple select
                                                        ],
                                                    ]) ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= Html::submitButton(
                                                    '<span class="button-text">Sign up</span><span class="spinner d-none"></span>',
                                                    ['class' => 'btn btn-primary', 'id' => 'btn-signup']
                                                ) ?>
                                                <?php //= Html::submitButton('Signup <i class="fa fa-spinner fa-spin d-nonexx"></i>', ['class' => 'btn btn-primary', 'name' => 'signup-button', 'id' => 'signup_button']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div><!-- End Service Item -->

        </div>

    </div>

</section>

<?php $this->beginBlock('JsBlock') ?>
<script>
    $(document).ready(function(){

        $('#tnc_button').change(function() {
            if ($(this).is(':checked')) {
                $('#next1').removeClass('d-none');
            }else
            {
                $('#next1').addClass('d-none');
            }
        });

        $('#next_btn1').click(() => {
            $('#signup_form1').addClass('d-none');
            $('#signup_form2').removeClass('d-none');
            $('html, body').animate({
                scrollTop: $('#services').offset().top
            }, 100);
        });

        $('#signupform-phone').keyup(function(){
            console.log(this.value);
            $('#signupform-phone1').val(this.value);
        });

        $('#signupform-nick_name').keyup(function(){
            console.log(this.value);
            $('#cyra_nickname').text(this.value);
        });

        // ONLY NUMBERS ==============
        const inputField = document.querySelector('#signupform-ic');

        inputField.onkeydown = (event) => {
            // Only allow if the e.key value is a number or if it's 'Backspace'
            if(isNaN(event.key) && event.key !== 'Backspace') {
                event.preventDefault();
            }
        };
        //    ======================================

        // $('#signup_button').click(function () {
        //     alert('clickkkk');
        // });
        $('#form-signup').on('beforeSubmit', function() {
            var btn = $('#btn-signup');
            btn.prop('disabled', true);
            btn.find('.button-text').text('Submitting...');
            btn.find('.spinner').removeClass('d-none'); // show spinner
        });


    });

</script>
<?php $this->endBlock()?>
