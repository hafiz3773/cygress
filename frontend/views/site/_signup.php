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
//    Yii::t('app','register_p17') => Yii::t('app','register_p17'),
//    Yii::t('app','register_p18') => Yii::t('app','register_p18'),
    'Not applicable' => 'Not applicable',
    'All position' => 'All position',
    'GK' => 'Goal Keeper',
    'GD' => 'Goal Defence',
    'WD' => 'Wing Defense',
    'C' => 'Centre',
    'WA' => 'Wing Attack',
    'GA' => 'Goal Attack',
    'GS' => 'Goal Shooter'
];

?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <div id="signup_form2" class="details position-relative p1 px-1 px-sm-4 d-noneee">
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
                                    'data' => \common\models\User::position_arr,
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
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>