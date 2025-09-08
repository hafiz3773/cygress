<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
$wassapLink = \yii\helpers\Html::a('Jopin Group WhatsApp', [''], ['class' => 'profile-link']);

?>
<div class="verify-email">
    <p>Hello Cyra - <?= $user->nick_name ?>,</p>

    <p>Below are the summary of your account: <?= $user->nick_name ?>,</p>
    <ul>
        <li>Full Name: <strong><?= Html::encode($user->full_name) ?></strong></li>
        <li>Nick Name: <strong><?= Html::encode($user->nick_name) ?></strong></li>
        <li>User ID: <strong><?= Html::encode($user->user_id) ?></strong></li>
        <li>Email: <strong><?= Html::encode($user->email) ?></strong></li>
    </ul>

    <p>Follow the link below to verify your email for account activation:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>


<p>Once you sign up, you’re officially part of the crew! 🚀💥</p>

<p>Jump into our group chat now and vibe with the team! 🎉⚡️</p>

<p>Pick your squad based on your mission here; whether you wanna level up, have fun, or just bring the energy, there’s always a spot for you! 💪🏐✨</p>

<p><a href="https://chat.whatsapp.com/Cr83Jh4EG9VEtLLfIYFphG?mode=ems_copy_h_c">Join WhatsApp Group</a></p>
</div>