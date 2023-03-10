<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'My Yii Application';

?>
<div class="header-row">
    <div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-no-transform header-nav-bottom-line-active-text-light header-nav-bottom-line-effect-1 header-nav-light-text order-2 order-lg-1">
        <div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-text-size-3 header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-effect-2 header-nav-main-sub-effect-1">
            <?= $this->render('client-menu'); ?>
        </div>
        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
            <i class="fas fa-bars"></i>
        </button>
    </div>	                   					
</div>

