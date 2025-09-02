<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Training $model */

$this->title = Yii::t('app', 'Create Training');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <style>
        .form-control {border: 1px solid #ced4da !important;margin-bottom: 0!important;height: 47px !important;color: #7d7d7d !important;}
        textarea.form-control {height: 77px !important;}
        .form-group {padding:7px 0 !important;}
        .control-label {font-weight:500;margin-bottom:5px}

    </style>
<div class="page-title dark-background-x" data-aos="fade" style="background-image: url(/asset/img/register1.png);">
    <div class="container position-relative">
        <h1><?= Html::encode($this->title) ?></h1>
        <!--        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>-->
        <nav class="breadcrumbs">
            <ol>
                <li class="current" onclick="history.back()"><a href="#">Back</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="training-create contact-sectionx spadx">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 align-self-center section-titlex">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>

    </div>
</div>
<?php $this->beginBlock('JsBlock') ?>
    <script>
        $(document).ready(function(){

            $('#training-date_temp').on('change', function() {
                const selectedDate = $(this).val(); // Format: YYYY-MM-DD
                const timestampInput = $('#training-date');

                if (selectedDate) {
                    const dateObject = new Date(selectedDate);
                    const timestamp = Math.floor(dateObject.getTime() / 1000); // Unix timestamp in seconds

                    timestampInput.val(timestamp);
                } else {
                    timestampInput.val(''); // Clear the timestamp if no date is selected
                }
            });

        });



    </script>
<?php $this->endBlock()?>