<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container mt-5"> 
    <section class="section section-height-1 bg-light position-relative border-0 m-0" id="book">
        <div class="pt-5">
            <section class="call-to-action featured featured-primary-custom mb-5">
                <div class="col-sm-8 col-lg-8">
                    <div>
                        <h3>
                            <strong>
                                <?= Yii::t('app', 'page_booking_title') ?>                                
                            </strong>
                        </h3>
                        <p class="mb-0 opacity-7">
                            <?= Yii::t('app', 'page_booking_text') ?>       
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="call-to-action-btn">                   
                        <?= 
                        Html::a(
                            '<i class="bx bx bx-calendar mr-1"></i> '.Yii::t('app', 'book_now_button'),                      
                            Url::toRoute(['/booking', 
                                'code' => Yii::$app->request->get('code')
                            ]),
                            [
                                'class' => 'btn btn-primary btn-xl mb-2 text-5 py-3 px-5',                                                  
                                'data-hash-offset' => 0,  
                                'data-hash-offset-lg' => 130,  
                            ] 
                        ) 
                        ?> 
                    </div>
                </div>
            </section>
        </div> 
    </section>
</div>