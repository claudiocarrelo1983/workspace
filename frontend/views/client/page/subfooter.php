<?php

use yii\helpers\Url;
use common\helpers\Helpers;
use yii\helpers\Html;

?>

<section class="section section-dark section-angled border-0 pb-0 m-0 lazyloaded" style="background-size: 100%; background-position: center top; background-image: url(&quot;images/generic/build_bg.jpg&quot;);" data-bg-src="images/generic/build_bg.jpg">
    <div class="section-angled-layer-top section-angled-layer-increase-angle bg-color-light-scale-0" style="padding: 4rem 0;"></div>
    <div class="container text-center my-5 py-5">
        <h2 class="font-weight-bold line-height-3 text-12 mt-5 mb-1 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-appear-animation-duration="750" style="animation-delay: 250ms;">
            <?= (isset($companyArr['company_name']) ? $companyArr['company_name'] : '') ?>
        </h2>
        <div class="overflow-hidden mb-5">
            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">         
                <?= ((empty($companyArr['subtitle_pt']) && empty($companyArr['subtitle_en'])) ? '' : Yii::t('app',$companyArr['page_code_subtitle'])) ?>                                 
            </p>
        </div>
        <?php
            echo Html::a(
                Yii::t('app', Yii::t('app', 'book_now_button')),                      
                Url::toRoute(['/choose-location', 
                    'code' => Yii::$app->request->get('code'),
                    'team' => '*',
                    'location' =>  '*',
                    'service' =>  '*',             
                    'day' =>  '*',
                    'time' =>  '*'                         
                ]),
                [                     
                    'class' => 'btn btn-dark btn-modern btn-rounded px-5 btn-py-3 text-4 appear-animation animated fadeIn appear-animation-visible',                                                  
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 130,  
                ] 
            );
        ?>
    </div>
    <div class="row border border-start-0 border-bottom-0 divider-left-border  border-end-0 border-color-light-2">
        <div class="col-6 col-md-4 text-center d-flex align-items-center justify-content-center py-4">
            <div class="icon-box">
                <i class="icon-event icons text-12 text-color-light"></i>
                <h4 class="text-4 mb-0">
                    <?= Yii::t('app','sheddule') ?>
                </h4>
            </div>
        </div>
        <div class="col-6 col-md-4 text-center divider-top-border divider-left-border border-color-light-2 d-flex align-items-center justify-content-center py-4">
            <div class="icon-box">
                <i class="icon-book-open icons text-12 text-color-light"></i>
                <h4 class="text-4 mb-0">
                    <?= Yii::t('app','services') ?>
                </h4>
            </div>          
        </div>
        <div class="col-12 col-md-4 text-center divider-top-border divider-left-border  border-color-light-2 d-flex align-items-center justify-content-center py-4">          
            <div class="icon-box">
                <i class="icon-bg icon-menu-2"></i>
                <h4 class="text-4 mb-0">
                    <?= Yii::t('app','contact_us') ?>
                </h4>
            </div>   
        </div>  
    </div>
</section>