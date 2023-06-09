<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\PublicAsset;



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
    )      
);

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
    <?= $this->render('/site/headerPublicDark'); ?>
    
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
