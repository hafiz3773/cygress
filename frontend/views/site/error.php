<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;

$this->registerJs('');

?>
<style>
    .error-page {
        min-height: 70vh;
        background: linear-gradient(45deg, #fb6f00 0%, #ffffff 100%);
    }

    .error-container {
        max-width: 100%;
    }

    .error-code {
        font-size: 6rem;
        font-weight: 900;
        background: linear-gradient(to right, #fff, rgba(255, 255, 255, 0.1));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: pulse 2s infinite;
    }

    .error-message {
        color: rgba(255, 255, 255, 0.9);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .btn-glass {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        transition: all 0.3s ease;
    }

    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
    }
</style>
<div class="error-page d-flex align-items-center justify-content-center" style="">
    <div class="error-container text-center p-4 col-md-6 w-100 w-md-50">
        <h1 class="error-code mb-0">Uops!</h1>
<!--        <h2 class="display-6 error-message mb-3">--><?php //= Html::encode($this->title) ?><!--</h2>-->
        <p class="lead error-message mb-5"><div class="alert alert-warning">
            <?= nl2br(Html::encode($message)) ?>
        </div></p>
        <p class="lead error-message mb-5 err">
            Please contact us if you think this is a server error. <br> Thank you.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/" class="btn btn-glass px-4 py-2">Go Home</a>
        </div>
    </div>
</div>