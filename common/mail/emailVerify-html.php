<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->full_name) ?>,</p><br>

    <p>Thank you for joining our team.</p>
    <p>Below are your details:</p>

    <ul>
        <li>Name: <strong><?= Html::encode($user->full_name) ?></strong></li>
        <li>User ID: <strong><?= Html::encode($user->user_id) ?></strong></li>
        <li>Email: <strong><?= Html::encode($user->email) ?></strong></li>
    </ul>

    <p>Follow the link below to verify your email:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
