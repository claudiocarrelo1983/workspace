<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\Event;


?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_create_forms')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_forms') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_create_forms') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="build-wrap form-wrapper-div"></div>
    </div>
</div>
