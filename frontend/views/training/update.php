<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Training $model */

$this->title = Yii::t('app', 'Update Training', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <style>
        .form-control {border: 1px solid #ced4da !important;margin-bottom: 0!important;height: 47px !important;}
        textarea.form-control {height: 77px !important;}

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
<div class="training-update contact-sectionx spadx">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 section-titlex">

                <div class="row d-block d-sm-none">
                    <div class="col">
                        <h4 class="mt-5 text-center">Update Training</h4>
                        <hr style="margin-top: .1rem;border-top: 1px dashed rgba(221,0,0,.2)">
                    </div>
                </div>

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

            $('#training-date_temp').val(convertTimestampToDate($('#training-date').val()));

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


        function convertTimestampToDate(timestamp) {
            // Create a new Date object.  Note that JavaScript uses milliseconds,
            // so if your timestamp is in seconds, you need to multiply by 1000.
            const date = new Date(timestamp * 1000);

            // 1.  toLocaleDateString() -  Uses locale conventions
            const localeDateString = date.toLocaleDateString();
            console.log("Locale Date String:", localeDateString);

            // 2.  YYYY-MM-DD format (good for databases, APIs)
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(date.getDate()).padStart(2, '0');
            const yyyyMmDd = `${year}-${month}-${day}`;
            return yyyyMmDd;
            // console.log("YYYY-MM-DD:", yyyyMmDd);

            // 3.  More verbose date and time
            // const verboseDate = date.toLocaleString();
            // console.log("Verbose Date/Time:", verboseDate);

            // 4. Custom format (example)
            // const customFormat = `${day}/${month}/${year} ${date.getHours()}:${String(date.getMinutes()).padStart(2, '0')}:${String(date.getSeconds()).padStart(2, '0')}`;
            // console.log("Custom Format", customFormat);

            // Return a value, or the Date object, as needed.
            // return date; // Returns a Date object.
            // return localeDateString; // Returns a Date object.
            // Or return a formatted string:  return yyyyMmDd;
        }



    </script>
<?php $this->endBlock()?>