<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$adminLink = Yii::$app->urlManager->createAbsoluteUrl(['site/user']);
?>
<div>
    <p>Hello Admin,</p>

    <p>A new user has just signed up to the Cygress system. Here are the details:</p>
    <ul>
        <li>Name: <strong><?= $user->full_name ?></strong></li>
        <li>User ID: <strong><?= $user->user_id ?></strong></li>
        <li>Email: <strong><?= $user->email ?></strong></li>
        <li>Phone: <strong><?= $user->phone ?></strong></li>
    </ul>

    <p><?= Html::a('Please review', $adminLink) ?> and take any necessary actions.</p>

</div>
