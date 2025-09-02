<?php

use common\models\Attendance;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var common\models\AttendanceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Attendances');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .custom_btn {width: 165px}
    /*.grid-view, .grid-view table {color: white}*/
    input.form-control {
        border: 1px solid #363636;
        padding-left: 20px;
        padding-right: 5px;
        margin-bottom: 0 !important;
    }
    input[name="TrainingSearch[title]"] {
        /*background: red;*/
    }
    .form-control {border: 1px solid #ced4da !important;margin-bottom: 0!important;height: 37px !important;}

</style>
<h1>ahhhahahahahahahahahahahahaahahahh</h1>

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
        <div class="col-lg-8">
            <div class="attendance-index mb-5">
                <!--                <div class="row mt-5">-->
                <!--                    <div class="col">-->
                <!--                        --><?php //= Html::a(Yii::t('app', 'Create Attendance'), ['create'], ['class' => 'btn custom_btn float-right']) ?>
                <!--                    </div>-->
                <!--                </div>-->

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'training_id',

//            'user_id',
                        [
                            'attribute' => 'user_id',
                            'label' => 'Student',
                            'format' => 'raw',
                            'value' => function($model) {
                                return $model->user->full_name . ' ('.$model->user_id.')';
                            }
                        ],
//            'created_at',
//            'updated_at',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Attendance $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
                    ],
                ]); ?>

            </div>
        </div>
    </div>

</div>
