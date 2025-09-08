<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
$wassapLink = \yii\helpers\Html::a('Jopin Group WhatsApp', ['https://chat.whatsapp.com/Cr83Jh4EG9VEtLLfIYFphG?mode=ems_copy_h_c'], ['class' => 'profile-link']);

?>
Hello Cyra - <?= $user->nick_name ?>,

Below are the summary of your account: <?= $user->nick_name ?>,
Full Name : <?= $user->full_name?>
Nick Name : <?= $user->nick_name ?>
Email : <?= $user->email ?>
User Id : <?= $user->user_id ?>

Follow the link below to verify your email for account activation:
<?= $verifyLink ?>

Once you sign up, you’re officially part of the crew! 🚀💥

Jump into our group chat now and vibe with the team! 🎉⚡️

Pick your squad based on your mission here; whether you wanna level up, have fun, or just bring the energy, there’s always a spot for you! 💪🏐✨

<?=$wassapLink?>