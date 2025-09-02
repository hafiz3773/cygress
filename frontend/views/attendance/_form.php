<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Attendance $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    .form-group, .control-label {padding:6px 0}
</style>
<div class="attendance-form px-5">

    <h4 class="text-center mb-3"><?=$event->title?></h4>
    
    <div class="row <?=$event->file ? '':'d-none'?>">
        <div class="col">
            <img src="/<?=$event->file?>" class="img-fluid rounded mx-auto d-block" alt="...">
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'training_id')->hiddenInput(['value' => $event->id])->label(false) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'oninput' => "this.value = this.value.toUpperCase()"])->label('Enter Your User ID') ?>

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="form-group px-3">
                <?= Html::submitButton(Yii::t('app', 'Check in'), ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
