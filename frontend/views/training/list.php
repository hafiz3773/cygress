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

    table {
        width: 100%; /* Optional: Make the table take full width */
        border-collapse: collapse; /* Optional: Collapse borders for a cleaner look */
    }

    th:nth-child(2),
    td:nth-child(2) {
        width: 150px; /* Replace 150px with your desired width */
    }

    @media print {
        .noprint,#footer, #header, .dark-background-x, .header {
            display: none !important;
        }
        table tr:nth-child(2) {
            display: none !important;
        }
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
<div class="container pt-5" style="">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="attendance-index mb-5">
                <p><h4>Attendances: <strong><?=$model->title?></strong></h4></p>
                <p style="float:right" class="noprint">
                    <button class="btn btn-danger" onclick="window.print();return false;">Print It!</button>
                </p>
                <!--                <div class="row mt-5">-->
                <!--                    <div class="col">-->
                <!--                        --><?php //= Html::a(Yii::t('app', 'Create Attendance'), ['create'], ['class' => 'btn custom_btn float-right']) ?>
                <!--                    </div>-->
                <!--                </div>-->

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
//                    'filterRowOptions' => ['style' => 'display: none;'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'training_id',
//            'user_id',
                        [
                            'attribute' => 'user_id',
                            'label' => 'Student ID',
                            'format' => 'raw',
                            'filter' => false,
                            'value' => function($model) {
                                return '<b>'.$model->user_id.'</b>';
                            }
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => 'Student Name',
                            'format' => 'raw',
                            'filter' => true,
                            'value' => function($model) {
                                return ucwords($model->user->full_name) .' ('.$model->user->phone.')';
                            }
                        ], [
                            'attribute' => 'fee',
                            'label' => 'Has Paid?',
                            'format' => 'raw',
                            'value' => function($model) {
                                if($model->fee === 0) {
                                    $text = '<span class="badge bg-warning text-dark">X</span>';
                                    $text .= ' <span style="cursor:pointer" data-status="'.$model->fee.'" data-id="'.$model->id.'" class="badge bg-primary update_training_fee">Update</span>';
                                }
                                else
                                    $text = '<span class="badge bg-success">Yes</span>';

                                return $text;
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
<?php $this->beginBlock('JsBlock') ?>
<script>
    $(document).ready(function(){

        // $('.update_training_fee').click(function () {
        //     let id = $(this).data('id');
        //     let curval = $(this).data('curval');
        // });

        $('.update_training_fee').on('click', function() {
            var itemId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus ? 0 : 1; // Toggle status

            $.ajax({
                url: '<?= Url::to(['training/toggle-status']) ?>', // Replace with your controller and action
                type: 'POST',
                data: {
                    id: itemId,
                    status: newStatus,
        },
            success: function(response) {

                    console.log(response.message);
                if (response.success) {
                    var targetRow = $('tr[data-key="'+itemId+'"]');
                    targetRow.find('td:last-child').html('<span class="badge bg-success">Yes</span>');
                } else {
                    alert('Error updating status: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('There was an error processing your request.');
                console.error(xhr, status, error);
            }
        });
        });



    });



</script>
<?php $this->endBlock()?>
