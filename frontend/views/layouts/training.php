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
<body data-plugin-page-transition>

<div class="body">

<!--Top Menu -->
    <header id="header" class="header-dark header-effect-shrink " data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-top-0 bg-dark box-shadow-none overflow-visible">
            <div class="header-top">
                <div class="container">
                    <div class="header-row py-2">	                     
                        <div class="header-column justify-content-start">	
                            <div class="header-row">
                                <nav class="header-nav-top">	  
                                    |
                                <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                                <span class="px-2 language" data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                                <?php endforeach; ?>	
                            </div>
                        </div>   
                
                        <div class="header-column justify-content-end">
                            <div class="header-row">                            
                                <?= $this->render('/site/top_header'); ?>	                                        
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="header-container container">
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
                        Url::home(),     
                        [
                        'class' => 'logo-url',
                        'data-hash' => '',         
                        'data-hash-offset' => 0,  
                        'data-hash-offset-lg' => 130,  
                        ]      
                    ) ?>
                    <div class="header-column justify-content-end">                       
                        <?= $this->render('/client/headerPublicDark'); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <div class="spacer"></div>
    
    <div role="main" class="main">

            <?= $content ?>
    </div>

    <div class="spacer"></div>

    <?= $this->render('/site/footer'); ?>			

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
