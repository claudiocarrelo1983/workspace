<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$notifications =  array(
    array(
        'username' => ' TW_Ccarrelo',
        'title' => ' Portuguese1',
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
  <?php foreach ($notifications as $key => $message): ?>   

    <?php endforeach; ?>


<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?= Yii::$app->name ?></span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
</button>
<div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a class="dropdown-item" href="<?= Url::toRoute('profile/index') ?>">
        <i class="bx bx-user font-size-16 align-middle me-1"></i> 
        <span key="t-profile">Profile</span>
    </a>
    <a class="dropdown-item d-block" href="<?= Url::toRoute('definition/index') ?>">
        <i class="bx bx-cog  font-size-16 align-middle me-1"></i> 
        <span key="t-settings">Settings</span>
    </a> 
    <div class="dropdown-divider"></div>
    <?=                                            
        Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
        . Html::submitButton(
            '<i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout',
            ['class' => 'dropdown-item text-danger']
        )
        . Html::endForm()
    ?> 
</div>
