<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Attendance $model */

$this->title = Yii::t('app', 'Create Attendance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attendances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-control {border: 1px solid #ced4da !important;margin-bottom: 0!important;height: 47px !important;}
    textarea.form-control {height: 77px !important;}
    .jumbotron {
        background-color: #f8f8f8;
    }

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

<div class="attendance-create mt-5">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 align-self-center section-titlex">

                <?php

                    if($event === null):
                        echo '<div class="container">
                          <div class="jumbotron text-center">
                            <br><h3>We sincerely apologize,</h3>  <br>    
                            <p>But, there is no training scheduled for today.</p><br>
                          </div>
                        </div>';
                    else :

                ?>

                <?= $this->render('_form', [
                    'model' => $model,
                    'event' => $event,
                ]) ?>
                <?php endif;?>

            </div>
        </div>

    </div>

</div>

<br><br><br>
