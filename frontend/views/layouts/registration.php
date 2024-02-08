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
    <script>window.kvDatepicker_d6088889 = {"autoclose":true,"format":"dd-mm-yyyy","todayHighlight":true};</script>
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

<div class="body" > 

<!--Top Menu -->    
    <?= $content ?>

    <?= $this->render('/site/footer_simple'); ?>
</div>



<?php $this->endBody() ?>

<script>jQuery(function ($) {
jQuery.fn.kvDatepicker.dates={};
jQuery&&jQuery.pjax&&(jQuery.pjax.defaults.maxCacheLength=0);
if (jQuery('#date-calendar-search1').data('kvDatepicker')) { jQuery('#date-calendar-search1').kvDatepicker('destroy'); }
jQuery('#date-calendar-search1-kvdate').kvDatepicker(kvDatepicker_d6088889);

initDPRemove('date-calendar-search1');
initDPAddon('date-calendar-search1');
if (jQuery('#date-calendar-search2').data('kvDatepicker')) { jQuery('#date-calendar-search2').kvDatepicker('destroy'); }
jQuery('#date-calendar-search2-kvdate').kvDatepicker(kvDatepicker_d6088889);

initDPRemove('date-calendar-search2');
initDPAddon('date-calendar-search2');
jQuery('#submit-location').yiiActiveForm([{"id":"choice-location-cl20231124194308451","name":"location_code","container":".field-choice-location-cl20231124194308451","input":"#choice-location-cl20231124194308451","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Location Code must be a string.","max":255,"tooLong":"Location Code should contain at most 255 characters.","skipOnEmpty":1});}},{"id":"choice-location-cl202311241943084512","name":"location_code","container":".field-choice-location-cl202311241943084512","input":"#choice-location-cl202311241943084512","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Location Code must be a string.","max":255,"tooLong":"Location Code should contain at most 255 characters.","skipOnEmpty":1});}},{"id":"select-service","name":"service_code","container":".field-select-service","input":"#select-service","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Service Cat cannot be blank."});yii.validation.string(value, messages, {"message":"Service Cat must be a string.","max":255,"tooLong":"Service Cat should contain at most 255 characters.","skipOnEmpty":1});}}], []);
});</script>
</body>
</html>
<?php $this->endPage();
