<?php

use common\models\Attendance;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
<div class="page-title dark-background-x" data-aos="fade" style="background-image: url(/asset/img/register1.png);">
    <div class="container position-relative">
        <h1><?= Html::encode($this->title) ?></h1>
        <!--        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>-->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Attendance</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container pt-5" style="">
    <div class="row">
        <div class="col-lg-12">
            <div class="attendance-index mb-5">
                <p class="text-end">
                    <?= Html::a(Yii::t('app', 'Check In'), ['create'], ['class' => 'btn btn-success float-right']) ?>
                </p>

                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'training_id',
                        [
                            'attribute' => 'training_id',
                            'label' => 'Training List',
                            'format' => 'raw',
                            'value' => function($model) {
//                                $v1 = $model->event->title;
//                                $v2 = ' <a href="'.Url::toRoute(['view?id='.$model->id]).'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
//                                $v3 = Html::a(Yii::t('app', '<i class="fa fa-eye" aria-hidden="true"></i>'), ['view', 'id' => $model->id], ['class' => 'btn btn-success']);
//                                $v4 = '<a class="btn btn-primary" href="/attendance/view?id='.$model->id.'">Update</a>';
                                return $model->event->title;
                            },
                            'filter' => Html::activeDropDownList(
                                $searchModel,
                                'training_id',
                                Attendance::getAttendedEventList(),
//                                \yii\helpers\ArrayHelper::map(Attendance::find()->select('training_id')->distinct()->all(), 'training_id', 'training_id'),
                                ['class' => 'form-control', 'prompt' => 'Select Training Session']
                            ),
                        ],
//            'user_id',
//            'created_at',
//            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Attendance $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
                    ],
                ]); ?>

                <?php Pjax::end(); ?>


            </div>
        </div>
    </div>

</div>
