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

$this->title = Yii::t('app', 'My Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .profile-card {
        text-align: center;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .profile-card img {
        width: 300px;
        /*height: 120px;*/
        border-radius: 50%;
        margin-bottom: 15px;
    }
    .social-links a {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: inherit;
        text-decoration: none;
    }
    .social-links i {
        width: 24px;
        margin-right: 8px;
    }
    .info-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .progress {
        height: 6px;
        border-radius: 3px;
    }

    .bord tr td {
        border: none;               /* remove all borders */
        border-bottom: 1px solid #d7d7d7; /* add only bottom border */
        padding-top: 15px;
    }
    .no-bord tr td {border: none !important;}

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
<div class="container py-5">
    <div class="row">
        <!-- Left Column -->
        <?php
        $arr = \common\models\User::USER_ARRAY;
        ?>
        <div class="col-md-4">
            <div class="profile-card mb-4">
                <img src="/asset/img/avatar1.jpg" alt="Profile Picture">
                <h5 class="mb-1" style="color: #fb6f00"><strong><?= Html::encode($model->full_name) ?> [ <?= Html::encode($model->user_id) ?> ]</strong></h5>
                <p class="text-muted"><?= Html::encode($model->email) ?><?php //= Html::encode($model->address) ?></p>
                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill" style="background-color: #ffddc2 !important">
                    <?= Html::encode($arr[$model->user_status]) ?>
                </span>
                <div class="d-flex justify-content-center mb-3 mt-4">
                    <a class="btn btn-primary btn-sm me-2" href="<?=Url::to(['site/update-profile'])?>">Edit Profile</a>
<!--                    <button class="btn btn-outline-primary btn-sm">Message</button>-->
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="col-md-8">
            <div class="info-card mb-4">
                <table class="bord" style="width: 100%">
                    <tr>
                        <td width="100%" colspan="2" style="text-align: center;border: none;"><h6 class="fw-bold mb-1">User ID</h6><p style="font-size: 21px;font-weight: 700;color: #fb6f00"><?= Html::encode($model->user_id) ?></p></td>
                    </tr>
                    <tr>
                        <td width="50%"><h6 class="fw-bold mb-1">Full Name</h6><p><?= Html::encode($model->full_name) ?></p></td>
                        <td width="50%"><h6 class="fw-bold mb-1">Nick Name</h6><p><?= Html::encode($model->nick_name) ?></p></td>
                    </tr>
                    <tr>
                        <td width="50%"><h6 class="fw-bold mb-1">IC</h6><p><?= Html::encode($model->ic) ?></p></td>
                        <td width="50%"><h6 class="fw-bold mb-1">Email</h6><p><?= Html::encode($model->email) ?></p></td>
                    </tr>
                    <tr>
                        <td width="50%"><h6 class="fw-bold mb-1">Phone 1</h6><p><?= Html::encode($model->phone) ?></p></td>
                        <td width="50%"><h6 class="fw-bold mb-1">Phone 2</h6><p><?= Html::encode($model->phone1) ?></p></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="2">
                            <strong>Emergency Contact 1</strong>
                            <table width="100%" class="no-bord">
                                <tr>
                                    <td width="33%" style="border: none;"><h6 class="fw-bold mb-1">Name</h6><p><?= Html::encode($model->econtact1_fullname) ?></p></td>
                                    <td width="33%"><h6 class="fw-bold mb-1">Phone</h6><p><?= Html::encode($model->econtact1_phone) ?></p></td>
                                    <td width="33%"><h6 class="fw-bold mb-1">Relationship</h6><p><?= Html::encode($model->econtact1_relation) ?></p></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="2">
                            <strong>Emergency Contact 2</strong>
                            <table width="100%" class="no-bord">
                                <tr>
                                    <td width="33%"><h6 class="fw-bold mb-1">Name</h6><p><?= Html::encode($model->econtact2_fullname) ?></p></td>
                                    <td width="33%"><h6 class="fw-bold mb-1">Phone</h6><p><?= Html::encode($model->econtact2_phone) ?></p></td>
                                    <td width="33%"><h6 class="fw-bold mb-1">Relationship</h6><p><?= Html::encode($model->econtact2_relation) ?></p></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="2"><h6 class="fw-bold mb-1">Experiences</h6><p><?= Html::encode($model->experience) ?></p></td>
                    </tr>
                    <tr>
                        <?php
                        $output = "";
                        if (is_array($model->position) && !empty($model->position)) {
                            $output = "<ul>";
                            foreach ($model->position as $item) {
                                $output .= "<li>" .  \common\models\User::position_arr[$item] . "</li>";
                            }

                            $output .= "</ul>";
                        }
                        ?>
                        <td width="100%" colspan="2"><h6 class="fw-bold mb-1">Position</h6><p><?= $output ?></p></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="2"><h6 class="fw-bold mb-1">Illness</h6><p style="padding: 7px; background: #fff5f0;"><?= Html::encode($model->illness) ?></p></td>
                    </tr>
                </table>

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

    });



</script>
<?php $this->endBlock()?>
