<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
            
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
              
                <?= Html::a(
                    Yii::t('app',
                    '                    <div class="navbar-box-small">
                        <span class="logo-sm">
                            <img src="assets/images/logo.png" alt="" height="50">
                        </span>	
                    </div>
                    <div class="navbar-box-big">
                        <span class="logo-lg">	
                            <div class="header-logo">					
                                <span class="text-color-light font-weight-normal text-5 ">My</span>
                                <span class="text-color-light font-weight-extra-bold text-5  ">Special</span>
                                <span class="font-weight-extra-bold blue-lettering text-5 ">Gym</span>	
                            </div>
                        </span>	
                    </div>	
                        '),
                    Url::home(),     
                    [
                    'class' => 'logo logo-light',
                    'data-hash' => '',         
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 130,  
                    ]      
                ) ?>
      
            </div>


       

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            <div class="dropdown dropdown-mega d-none d-lg-block p-3">                    
                    
                    <?= Html::a(
                        Yii::t('app', 'Home'), 
                        Url::home(),     
                        [
                        'class' => 'btn',
                        'data-hash' => '',         
                        'data-hash-offset' => 0,  
                        'data-hash-offset-lg' => 130,  
                        ]      
                    ) ?>                
                                        
                  
                 
                            
            </div>

            <?php //$this->render('/site/mainmenu'); ?>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown dropdown-mega d-none d-lg-block p-3">
              <?= Html::a(
                        Yii::t('app', '
                        <span class="pr-2">
                        <svg fill="none" height="22" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg" id="icon_241655987234908" data-filename="icon-cloud.svg"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" x2="12" y1="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                        </span>
                        Download App'), 
                        Url::toRoute('site/download-app'),     
                        [
                        'class' => 'btn btn-primary',
                        'data-hash' => '',         
                        'data-hash-offset' => 0,  
                        'data-hash-offset-lg' => 130,  
                        ]      
                    ) ?>
            </div>
            <?= $this->render('/admin/countries'); ?>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>                  

            <div class="dropdown d-inline-block">                        
                <?= $this->render('/admin/notifications'); ?>
            </div>

            <div class="dropdown d-inline-block">
                <?= $this->render('/admin/myaccount'); ?>
            </div>    

        </div>
    </div>
</header>