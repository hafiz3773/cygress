<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Training $model */

$this->title = $model->nick_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    /*body {background-color: #151515}*/
    /*table {color: white !important}*/
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

<div class="container pt-5" style="">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="training-view mb-5">

                <div class="row mt-5">
                    <div class="col">
                        <p>
                            <?= Html::a(Yii::t('app', 'Back'), ['user'], ['class' => 'btn btn-success']) ?>
                            <?php //= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?php //=Html::a(Yii::t('app', 'View Attendance'), ['list', 'training_id' => $model->id], ['class' => 'btn btn-success']);?>
                        </p>
                    </div>
                </div>



                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//                        'id',
//                        'user_id',
                        [
                            'attribute' => 'user_id',   // assume $model->roles is an array
                            'format' => 'raw',
                            'value' => '<button type="button" class="btn btn-outline-primary">'.$model->user_id.'</button>',
                        ],
                        'full_name',
                        'nick_name',
                        'email',
                        'ic',
                        'phone',
                        'phone1',
                        'address',
                        'econtact1_fullname',
                        'econtact1_phone',
                        'econtact1_relation',
                        'econtact2_fullname',
                        'econtact2_phone',
                        'econtact2_relation',
                        'experience',
                        [
                            'attribute' => 'position',   // assume $model->roles is an array
                            'value' => is_array($model->position) ? implode(', ', $model->position) : $model->position,
                        ],

                        'illness',
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
</div>

