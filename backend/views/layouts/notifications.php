<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$notifications =  array(
    array(
        'username' => ' TW_Ccarrelo',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/flags/portugal.png'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),

    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
);


$rows = count($notifications);


?>

<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-bell bx-tada"></i>
        <span class="badge bg-danger rounded-pill"><?= $rows ?></span>
    </button>


                            
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
    <div class="p-3">
        <div class="row align-items-center">
            <div class="col">
                <h6 class="m-0" key="t-notifications"> 
                    Notifications
                </h6>
            </div>
         
        </div>
    </div>
    <div data-simplebar style="max-height: 230px;">

        <?php foreach ($notifications as $key => $message): ?>                   

                <a href="javascript: void(0);" class="text-reset notification-item">
                    <div class="d-flex">                        
                        <div class="flex-grow-1">
                            <h6 class="mb-1" key="t-your-order"><?= $message['title'] ?></h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer"><?= $message['message'] ?></p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago"><?= $message['time'] ?></span></p>
                            </div>
                        </div>
                    </div>
                </a>   

        <?php endforeach; ?>

    </div>
    <div class="p-2 border-top d-grid">
        <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= Url::toRoute('site/notifications-list') ?>">
            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
        </a>
    </div>
</div>


