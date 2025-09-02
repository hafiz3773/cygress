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

$this->title = Yii::t('app', 'Training');
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

</style>
<div class="page-title dark-background-x" data-aos="fade" style="background-image: url(/asset/img/register1.png);">
    <div class="container position-relative">
        <h1><?= Html::encode($this->title) ?></h1>
<!--        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>-->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Training</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pt-5" style="">
    <div class="row">
        <div class="col-lg-12">
            <div class="training-index mb-5">

                <p class="text-end">
                    <?= Html::a(Yii::t('app', 'Create Training'), ['create'], ['class' => 'btn btn-success float-right']) ?>
                </p>

                <?php \yii\widgets\Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => SerialColumn::class],
//            'id',
//                        'title',
                        [
                            'attribute' => 'title',
                            'filterInputOptions' => [
                                'class' => 'form-control', // Default Bootstrap class
                                'placeholder' => 'Search by title', // Your placeholder text
                            ],
                        ],
//                        'description:ntext',
//                        'date:date',
                        [
                            'attribute'=>'date',
                            'value'=> function($model) {
                                return Yii::$app->formatter->asDate($model->date);
                            },
                            'filter'=>false,
                            //'enableSorting'=>true
                        ],
                        [
                            'attribute'=>'date',
                            'label' => 'Attendance',
                            'format' => 'raw',
                            'value'=> function($model) {
                                return Html::a(Yii::t('app', 'View Attendance'), ['list', 'training_id' => $model->id], ['class' => 'btn btn-success']);
//                                return '<a href="'.Url::to(['list?training_id=' . $model->id]).'" class="btn btn-primary" href="">View Attendance</a>';
                            },
                            'filter'=>false,
                            //'enableSorting'=>true
                        ],
//            'created_at',
                        //'updated_at',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Training $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
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

        document.getElementsByName("input[name='TrainingSearch[title]']").placeholder = "Type name here..";

    });



</script>
<?php $this->endBlock()?>
