<?php

namespace backend\assets;

use yii\web\AssetBundle;


/**
 * Main frontend application asset bundle.
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/fontawesome-free/css/all.min.css',
        //'vendor/animate/animate.compat.cs',
        'vendor/animate/animate.compat.css',
        'vendor/simple-line-icons/css/simple-line-icons.min.css',
        'vendor/owl.carousel/assets/owl.carousel.min.css',
        'vendor/owl.carousel/assets/owl.theme.default.min.css',
        'vendor/magnific-popup/magnific-popup.min.css',
        'css/theme.css',
        'css/theme-elements.css',
        'css/theme-blog.css',
        'css/theme-shop.css',
        'css/demos/demo-finance.css',
        'css/skins/skin-finance.css',
        'css/custom.css',
        'vendor/circle-flip-slideshow/css/component.css',
        'css/skins/default.css',
        //'css/skins/custom.css',            
        'css/icons.min.css',
        'css/site.css',
        'css/demos/demo-app-landing.css',
        'vendor/animate/animate.compat.css'       
    ]; 

    public $js = [
        //'vendor/jquery/jquery.min.js',
        'vendor/jquery.appear/jquery.appear.min.js',
        'vendor/jquery.easing/jquery.easing.min.js',
        'vendor/jquery.cookie/jquery.cookie.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/jquery.validation/jquery.validate.min.js',
        'vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js',
        'vendor/jquery.gmap/jquery.gmap.min.js',
        'vendor/lazysizes/lazysizes.min.js',
        'vendor/isotope/jquery.isotope.min.js',
        'vendor/owl.carousel/owl.carousel.min.js',
        'vendor/magnific-popup/jquery.magnific-popup.min.js',
        'vendor/vide/jquery.vide.min.js',
        'vendor/vivus/vivus.min.js',
        'vendor/circle-flip-slideshow/js/jquery.flipshow.min.js',
        'js/main.js',
        'js/views/view.home.js',
        'js/theme.js',
        'js/custom.js',
        'js/theme.init.js',
        //'assets/libs/metismenu/metisMenu.min.js',
        'assets/libs/simplebar/simplebar.min.js',
        //'assets/libs/node-waves/waves.min.js',
        //'assets/libs/apexcharts/apexcharts.min.js',
        //'js/pages/dashboard.init.js',
        //'js/app.js'
        'js/theme.init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
