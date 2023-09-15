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
<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="cssload-speeding-wheel-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
</div>
<div class="body"> 

<!--Top Menu -->    
    <?= $content ?>
    
    <section class=" call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="call-to-action-content">
                        <h2 class="font-weight-normal text-5 mb-0">
                            My Calendar                   
                        </h2>
                        <p class="mb-0">
                            Secure Your Spot Now: Book Instantly and Hassle-Free with Our Quick and Easy Online Booking Button!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?= $this->render('/site/footer_simple'); ?>			

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
