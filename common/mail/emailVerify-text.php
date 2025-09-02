<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Hello <?= $user->full_name ?>,

Thank you for joining our team.
Below are your details:
1. Name: <?= $user->full_name?>
2. User ID: <?= $user->user_id ?>
3. Email: <?= $user->email ?>

Follow the link below to verify your email:

<?= $verifyLink ?>