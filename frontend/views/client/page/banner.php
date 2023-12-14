<?php

use yii\helpers\Url;
use common\helpers\Helpers;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- Banner -->

<section class="section  banner-header-client  section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" style="background-image: url(<?= $companyArr['path'].$companyArr['image_banner'] ?>); background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards; min-height: 645px;">
	<div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light" style="padding: 8rem 0;"></div>
    <div class="container pt-lg-5 mt-5">
        <div class="row pt-3 pb-lg-0 pb-xl-0">
            <div class="col-lg-6 pt-4 mb-5 mb-lg-0">               
                <p class="font-weight-light opacity-7 pb-2 mb-4 pt-5">
                    <h1 class="font-weight-bold text-10 text-xl-10 line-height-2">                     
                        <?= Yii::t('app', 'page_booking_text') ?>          
                    </h1>
                </p>
                
                <?php                   
                    echo Html::a(
                        '<i class="bx bx bx-calendar mr-1"></i> '.Yii::t('app', Yii::t('app', 'book_now_button')),                      
                        Url::toRoute(['/choose-location', 
                            'code' => Yii::$app->request->get('code'),
                            'team' => '*',
                            'location' =>  '*',
                            'service' =>  '*',             
                            'day' =>  '*',
                            'time' =>  '*'                         
                        ]),
                        [                     
                            'class' => 'btn btn-gradient-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3',                                                  
                            'data-hash-offset' => 0,  
                            'data-hash-offset-lg' => 130,  
                        ] 
                    );
                ?>
            </div>

        </div>
    </div>
</section>






<!--End  Banner -->