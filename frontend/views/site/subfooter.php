<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;


?>

<section class=" call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="call-to-action-content">
                    <h2 class="font-weight-normal text-6 mb-0">
						<?= Yii::t('app', 'subfooter_'.$path2.'_title') ?>
                    </h2>
                    <p class="mb-0"><?= Yii::t('app', 'subfooter_'.$path2.'_subtitle') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>