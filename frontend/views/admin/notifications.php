<?php

/* @var $this yii\web\View */
use common\Helpers\Helpers;
use yii\helpers\Url;
use common\models\Tickets;
use yii\helpers\Html;


$notifications = Tickets::find()->where(
    [
        'company_code' => Yii::$app->user->identity->company_code,
        'type' => 'message',
        'read' => '0'
    ])->asArray()->all();

$rows = count($notifications);


?>

<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-bell bx-tada"></i>
        <?php
            if($rows > 0){
        ?>
            <span class="badge bg-danger rounded-pill"><?= $rows ?></span>
        <?php
            }
        ?>
    </button>


                            
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
    <div class="p-3">
        <div class="row align-items-center">
            <div class="col">
                <h6 class="m-0" key="t-notifications">                      
                     <?= Yii::t('app', 'menu_admin_settings_notifications') ?>
                </h6>
            </div>
            <div class="col-auto">
                <a href="<?= Url::toRoute('/notifications-list') ?>" class="small" key="t-view-all">
                    <?= Yii::t('app', 'view_all') ?> 
                </a>
            </div>
        </div>
    </div>
    <div data-simplebar style="max-height: 230px;">
    <?php
            if($rows > 0){
                 foreach ($notifications as $key => $value): ?>            

                    <a href="<?= Url::toRoute(['/notifications-list/reply', 'id' => $value['id']]) ?>" class="text-reset notification-item">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h6 class="mb-1" key="t-your-order">
                                    <?= $value['full_name'] ?>
                                </h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1" key="t-grammer">                             
                                        <?= Helpers::getBegginningOfString($value['text'], 120) ?>
                                    </p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 
                                        <span key="t-min-ago">
                                            <?= $value['created_date'] ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
    

        <?php endforeach; 
        
            }else{
        ?>
                <a href="javascript: void(0);" class="text-reset notification-item">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <?= Yii::t('app', 'nothing_to_show') ?>                   
                        </div>
                    </div>
                </a>   
           
        <?php
            }
        ?>

    </div>
    <div class="p-2 border-top d-grid">
        <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= Url::toRoute('/notifications-list') ?>">
            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">
                <?= Yii::t('app', 'view_more') ?>
            </span> 
        </a>
    </div>
</div>


