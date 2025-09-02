<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Attendance $model */

$this->title = $model->event->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attendances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
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
                            <?= Html::a(Yii::t('app', 'Home'), ['index'], ['class' => 'btn btn-success']) ?>
                            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                    </div>
                </div>



                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//            'id',
//            'training_id',
                        [
                            'attribute' => 'training_id',
                            'label' => 'Training Titlexxx',
                            'format' => 'raw',
                            'value' => function($model) {
                                return $model->event->title;
                            }
                        ],
//            'user_id',
                        [
                            'attribute' => 'user_id',
                            'label' => 'Student',
                            'format' => 'raw',
                            'value' => function($model) {
                                return $model->user->full_name;
//                    return $model->user_id;
                            }
                        ],
                        'created_at:datetime',
//                        'updated_at:datetime',
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