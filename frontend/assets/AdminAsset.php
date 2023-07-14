<?php

namespace frontend\assets;

use yii\web\AssetBundle;


/**
 * Main frontend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'assets/libs/@fullcalendar/core/main.min.css',
        'css/bootstrap.min.css',       
        'css/icons.min.css',
        'css/app.min.css',
        'css/site.css',
        'assets/libs/dropzone/min/dropzone.min.css',
        'css/skins/default.css',
        'css/theme.css',
        'assets/libs/@fullcalendar/core/main.min.css',
        'assets/libs/@fullcalendar/daygrid/main.min.css',
        'assets/libs/@fullcalendar/bootstrap/main.min.css',
        'assets/libs/@fullcalendar/timegrid/main.min.css'
    ];

    public $js = [
        //'assets/libs/jquery/jquery.min.js',
        'assets/libs/bootstrap/js/bootstrap.bundle.min.js',
        'assets/libs/metismenu/metisMenu.min.js',
        'assets/libs/simplebar/simplebar.min.js',
        'assets/libs/node-waves/waves.min.js',
        'assets/libs/apexcharts/apexcharts.min.js',
        'js/pages/dashboard.init.js',
        'js/form-builder.min.js',
        'js/script.js',
        'assets/libs/dropzone/min/dropzone.min.js',
        'assets/libs/moment/min/moment.min.js',
        'assets/libs/jquery-ui-dist/jquery-ui.min.js',
        'js/main.js',
        //'assets/libs/@fullcalendar/core/main.min.js',
        //'assets/libs/@fullcalendar/bootstrap/main.min.js',
        //'assets/libs/@fullcalendar/daygrid/main.min.js',
       // 'assets/libs/@fullcalendar/timegrid/main.min.js',
        //'assets/libs/@fullcalendar/interaction/main.min.js',
        //'js/pages/calendars-full.init.js',
        'js/app.js',        
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

}

