<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Training $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    .form-control {border: 1px solid #ced4da !important;margin-bottom: 0!important;height: 47px !important;color: #7d7d7d !important;}
    textarea.form-control {height: 77px !important;}
    .form-group {padding:7px 0 !important;}
    .control-label {font-weight:500;margin-bottom:5px}
    .help-block {color:red}

</style>
<div class="training-form general_input">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'g-bg-white g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30',
                ['enctype' => 'multipart/form-data']
            ]
        ]
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? 'Training for ' . date('d') .' '. date('F') .' '. date('Y'): $model->title, 'placeholder' => 'Title'])->label('Event Title') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 12, 'placeholder' => 'Description'])->label('Event Description') ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'date_temp')->input('date')->label('Event Date') ?>
            <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'file')->fileInput(['maxlength' => true,'class' => 'form-control  form-control-lg'])->label('File') ?>
        </div>
        <?php if($model->file):?>
            <div class="col-md-12" style="padding: 31px">
                <p>Current file:</p>
                <img src="/<?=$model->file?>" class="img-fluid rounded mx-auto d-block" style="border: 1px solid #d4d4d4; " alt="...">
            </div>
        <?php endif;?>
    </div>


    <div class="form-group text-center">
        <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
