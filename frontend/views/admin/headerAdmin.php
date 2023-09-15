<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\Helpers\Helpers;


?>
 
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">              
                <?= Html::a(
                    Yii::t('app',
                        '<div class="navbar-box-small">
                            <span class="logo-sm">
                                <img src="assets/images/logo.png" alt="" height="50">
                            </span>	
                        </div>
                        <div class="navbar-box-big">
                            <span class="logo-lg">	
                                <div class="header-logo">					
                                    '. Helpers::logoHeader(5).'
                                </div>
                            </span>	
                        </div>'),
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


            <div class="dropdown dropdown-mega d-none d-lg-block p-3">                    
                    
                    <?= Html::a(
                        Yii::t('app', 'home'), 
                        Url::home(),     
                        [
                        'class' => 'btn',
                        'data-hash' => '',         
                        'data-hash-offset' => 0,  
                        'data-hash-offset-lg' => 130,  
                        ]      
                    ) ?>                
         
            </div>  
            
            <div class="dropdown dropdown-mega d-none d-lg-block p-3">  
                <?=              
                    Html::a(
                        '<span class="text-3">
                            <i class="bx dripicons-web align-middle me-3"></i>'
                            .Yii::t('app', 'website').
                        '</span>', 
                        ['/page', 'code' => Yii::$app->user->identity->company_code_url],     
                        [
                            'class' => 'btn btn-primary',
                            'target' => '_blank'
                        ]      
                    );                
                ?>
            </div>
      
        
            <?php //$this->render('/site/mainmenu'); ?>

        </div>

        <div class="d-flex">
            <!--
            <div class="dropdown dropdown-mega d-none d-lg-block p-3">
        
            </div>
            -->
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