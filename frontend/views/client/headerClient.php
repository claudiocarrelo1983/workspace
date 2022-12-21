<?php

use yii\helpers\Html;



$structure = array(

    'logo-dark' => array(
        'img-sm' => '@web/images/logo.svg',
        'img-lg' => '@web/images/logo-dark.png',
        'url' => '#'
    ),
    'logo-light' => array(
        'img-sm' => '@web/images/logo-light.svg',
        'img-lg' => '@web/images/logo-light.png',
        'url' => '#'
    ),         

);

?>

            
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= $structure['logo-dark']['url'] ?>" class="logo logo-dark">
                    <span class="logo-sm">                                                               
                        <?= Html::img($structure['logo-dark']['img-sm'], ['alt'=>'', 'height'=>22]);?>  
                    </span>
                    <span class="logo-lg">                                 
                        <?= Html::img($structure['logo-dark']['img-lg'], ['alt'=>'', 'height'=>17]);?>    
                    </span>
                </a>

                <a href="<?= $structure['logo-dark']['url'] ?>" class="logo logo-light">
                    <span class="logo-sm">                              
                        <?= Html::img($structure['logo-light']['img-sm'], ['alt'=>'', 'height'=>22]);?>
                    </span>
                    <span class="logo-lg">
                        <?= Html::img($structure['logo-light']['img-lg'], ['alt'=>'', 'height'=>19]);?>                                
                    </span>
                </a>
            </div>

           
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

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