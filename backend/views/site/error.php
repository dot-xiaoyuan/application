<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */

/** @var Exception $exception */

use yii\helpers\Html;

$this->title = '404';
?>
<div class="site-error">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">404</div>
                <p class="empty-title"><?= Yii::t('app', 'Oops… You just found an error page') ?></p>
                <p class="empty-subtitle text-secondary">
                    <?= Yii::t('app', 'We are sorry but the page you are looking for was not found') ?>
                </p>
                <div class="empty-action">
                    <a href="/" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l14 0"/>
                            <path d="M5 12l6 6"/>
                            <path d="M5 12l6 -6"/>
                        </svg>
                        <?= Yii::t('app', 'Take me home') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
