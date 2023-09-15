<?php

use yii\helpers\Url;
use common\helpers\Helpers;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = $this->title;
$bgImg = '../../images/generic/header_bg-calendar.jpg';
$bgImg = '../../images/generic/painting-mountain-lake-with-mountain-background.jpg';

?>

<style>
    .banner-header-client{
        background-image: url(<?= $bgImg ?>);
        background-size: cover;
        background-position: center;
        animation-duration: 750ms;
        animation-delay: 300ms;
        animation-fill-mode: forwards;
        min-height: 500px;     
        opacity: 0.9;
        background-color:#000;
    }
    .bg-image-overlay {
        background-color:#000;
    }
</style>
<!-- Banner -->

<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover mb-5" style="height:380px">
    <span class="thumb-info-wrapper">
        <img src="<?= $bgImg ?>" class="img-fluid" alt=""  > 
        <span class="thumb-info-title">
            <div class="container pt-lg-5" style="margin: auto;">
                <div class="row pt-3 pb-lg-0 pb-xl-0">
                    <div class="col-lg-12 pt-4 mb-5 mb-lg-0" >  
                        <h1 class="font-weight-bold text-light text-5 text-xl-10 line-height-2 mb-3">
                            <?= Yii::t('app', 'menu_text'.Helpers::languageTranslations()) ?>
                        </h1>                 
                        <p class="font-weight-light opacity-7 pb-2 mb-4"></p>             
                            <?= 
                                Html::a(
                                    Yii::t('app', Yii::t('app', 'book_now_button')),                      
                                    Url::to(['/client-booking', 'code' => $code]),
                                    [
                                        'style' => 'border: 1px solid white;',
                                        'class' => 'btn btn-gradient-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3',                                                  
                                        'data-hash-offset' => 0,  
                                        'data-hash-offset-lg' => 130,  
                                    ] 
                                ) 
                            ?>            
                    </div>
                </div>
            </div>      
        </span>
    </span>
</span>

<!--End  Banner -->