<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AdminAsset;
use common\Helpers\Helpers;

AdminAsset::register($this);

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
    <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<!-- <body data-plugin-page-transition> -->
<body data-sidebar="dark" class="loading-overlay-showing" data-loading-overlay data-plugin-options="{'hideDelay': 500, 'effect': 'speedingWheel'}">
<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="cssload-speeding-wheel-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
</div>
<div class="body"> 

 <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?= $this->render('/admin/headerAdmin'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">   

                        <?= $this->render('/admin/sidebar-left'); ?>
    
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <?= $content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Page-content -->

            <?= $this->render('/admin/footer'); ?>

        </div>
        <!-- END layout-wrapper -->    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
