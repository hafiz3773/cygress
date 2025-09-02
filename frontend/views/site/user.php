<?php

use yii\grid\SerialColumn;
use common\models\Training;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TrainingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
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

    .pagination {
        display: flex;
        list-style: none;
        padding-left: 0;
        gap: 4px;
    }

    .pagination li {
        display: inline;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 12px;
        color: #007bff;
        text-decoration: none;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        background-color: #fff;
        transition: background-color 0.2s ease;
    }

    .pagination li a:hover {
        background-color: #e9ecef;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
        cursor: default;
    }

    .pagination li.disabled span {
        color: #6c757d;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        cursor: not-allowed;
    }


</style>
<div class="page-title dark-background-x" data-aos="fade" style="background-image: url(/asset/img/register1.png);">
    <div class="container position-relative">
        <h1><?= Html::encode($this->title) ?></h1>
        <!--        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>-->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">User List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pt-5" style="">
    <div class="row">
        <div class="col-lg-12">
            <div class="training-index mb-5">

                <p class="text-end">
                    <?= Html::a(Yii::t('app', 'Add New User'), ['register'], ['class' => 'btn btn-success float-right']) ?>
                </p>

                <?php \yii\widgets\Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => SerialColumn::class],
//            'id',
//                        'user_id',
                        [
                            'attribute'=>'user_id',
                            'value'=> function($model) {
                                return '<a href="'.Url::to('/site/user-details?user_id='.$model->id).'">'.$model->user_id.'</a>';
//                                return '<a href="'.Url::to('/site/user-view?id='.$model->user_id).'">'.$model->user_id.'</a>';
                            },
                            'format' => 'raw',
                            'filter'=>true,
                            //'enableSorting'=>true
                        ],
//                        'full_name',
//                        [
//                            'attribute' => 'title',
//                            'filterInputOptions' => [
//                                'class' => 'form-control', // Default Bootstrap class
//                                'placeholder' => 'Search by title', // Your placeholder text
//                            ],
//                        ],
//                        'description:ntext',
//                        'date:date',
                        [
                            'attribute'=>'full_name',
                            'value'=> function($model) {
                                return $model->full_name .' ( '. $model->nick_name.' )';
                            },
                            'filter'=>true,
                            //'enableSorting'=>true
                        ],
                        'ic',
                        'phone',
                        'address',
//                        [
//                            'attribute'=>'date',
//                            'label' => 'Attendance',
//                            'format' => 'raw',
//                            'value'=> function($model) {
//                                return Html::a(Yii::t('app', 'View Attendance'), ['list', 'training_id' => $model->id], ['class' => 'btn btn-success']);
////                                return '<a href="'.Url::to(['list?training_id=' . $model->id]).'" class="btn btn-primary" href="">View Attendance</a>';
//                            },
//                            'filter'=>false,
//                            //'enableSorting'=>true
//                        ],
//            'created_at',
                        //'updated_at',
//                        [
//                            'class' => ActionColumn::className(),
//                            'urlCreator' => function ($action, \common\models\User $model, $key, $index, $column) {
//                                return Url::toRoute([$action, 'id' => $model->id]);
//                            }
//                        ],
//                        [
//                            'class' => 'yii\grid\ActionColumn',
//                            'template' => '{view}', // include your custom button
////                            'template' => '{view} {update} {delete}', // include your custom button
//                            'buttons' => [
//                                'custom' => function ($url, $model, $key) {
//                                    return Html::a('<i class="fa fa-key"></i>', $url, [
//                                        'title' => 'Reset Password',
//                                        'data-confirm' => 'Are you sure you want to reset this user\'s password?',
//                                        'data-method' => 'post',
//                                        'class' => 'btn btn-sm btn-warning',
//                                    ]);
//                                },
//                            ],
//                            'urlCreator' => function ($action, $model, $key, $index) {
//                                if ($action === 'view') {
//                                    return Url::to(['site/user-view', 'id' => $model->user_id]);
//                                }
//                                return Url::to([$action, 'id' => $model->id]);
//                            },
//                        ],
                    ],
                ]); ?>
                <?php \yii\widgets\Pjax::end(); ?>


            </div>
        </div>
    </div>
</div>
<?php $this->beginBlock('JsBlock') ?>
<script>
    $(document).ready(function(){

        // $('a[title="Delete"]').hide();
        // $('a[title="Update"]').hide();

        // document.getElementsByName("input[name='TrainingSearch[title]']").placeholder = "Type name here..";

    });



</script>
<?php $this->endBlock()?>
