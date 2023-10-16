<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\PublicAsset;
use yii\helpers\Url;


PublicAsset::register($this);

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<!-- <body data-plugin-page-transition> -->
<body class="loading-overlay-showing" data-loading-overlay data-plugin-options="{'hideDelay': 500, 'effect': 'speedingWheel'}">

<div class="body header-body border-top-0 bg-dark box-shadow-none overflow-visible  mb-5">    
    <header id="header" class=" header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-top-0 bg-dark box-shadow-none overflow-visible">
            <div class="container-fluid header-top">
                <div class="container">
                    <div class="header-row  py-2 ">	
                                    |
                        <div class="header-column justify-content-start">	
                            <div class="header-row">
                                <nav class="header-nav-top">	
                                <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                                <span class="px-2 language" data-url ='<?= Url::base(true); ?>' data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                                <?php endforeach; ?>  
                            </div>
                        </div>                       
                    </div> 
                </div> 
            </div> 
            <div class="">
                <div class="container">             
                         
                    <div class="header-row py-2">	                         
                        <div class="header-column justify-content-start">	
                            <div class="header-row">
                                <div class="header-row">
                                    <?= Html::a(
                                        Yii::t('app',
                                        '<div class="header-row">
                                            <div class="header-logo">							
                                                    <span class="text-color-light font-weight-normal text-8 mb-2 mt-2">My </span>
                                                    <span class="text-color-light font-weight-extra-bold text-8 mb-2 mt-2">Special</span>
                                                    <span class="font-weight-extra-bold blue-lettering text-8 mb-2 mt-2">Gym</span>						
                                            </div>
                                        </div>'),
                                        str_replace('/frontend/web', '', Url::home()),  
                                        [
                                        'class' => 'logo-url',
                                        'data-hash' => '',         
                                        'data-hash-offset' => 0,  
                                        'data-hash-offset-lg' => 130,  
                                        ]      
                                    ) ?>
                                </div>
                            </div>
                        </div>                        
                        <div class="header-column justify-content-end">                          
                            <div class="header-row">  
                                <nav class="header-nav-top">							         
                                    <?php
                                
                                        if (!Yii::$app->user->isGuest) { ?>                                
                                        <span class="white-text  text-center">
                                            <div class="d-block d-lg-none">
                                                <i class="fas fa-user ms-1"> </i>
                                            </div>
                                            <div class="d-none d-lg-block">
                                                <i class="fas fa-user ms-1"> </i>
                                                <span class="m-1">					
                                                    <?= Yii::$app->user->identity->first_name ?>
                                                </span>
                                            </div>		
                                        </span>                              
                                            <?= Html::a(
                                                '<div class="d-block d-lg-none">'.Yii::t('app', 'training_small').'</div>'.
                                                '<div class="d-none d-lg-block">'.Yii::t('app', 'training_big').'</div>',
                                                Url::toRoute('client/index'),
                                                [
                                                    'class' => 'white-text text-center',
                                                    'data-hash' => '',
                                                    'data-hash-offset' => 0,
                                                    'data-hash-offset-lg' => 130,
                                                ]
                                            ) ?>
                                        <span class="m-2">|</span>                               
                                        <?=
                                                Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                                                . Html::submitButton(
                                                    Yii::t('app', 'login_logout'),
                                                    ['class' => 'btn-link logout white-text']
                                                )
                                                . Html::endForm()
                                        ?>  


                                    <?php } else { ?>

                                        <span class="m-2">|</span>   
                                        <?= Html::a(
                                                Yii::t('app', 'login'),                                            
                                                str_replace('/frontend/web', '',Url::toRoute('site/login')),  
                                                [
                                                    'class' => 'white-text',
                                                    'data-hash' => '',
                                                    'data-hash-offset' => 0,
                                                    'data-hash-offset-lg' => 130,
                                                ]
                                            ) ?>
                                        <span class="m-2">|</span>   
                            


                                    <?php }  ?>
                                </nav>	                                                                                                 
                            </div>
                        </div>
                    </div>          
                </div>
            </div>        
        </div>
    </header>
</div>