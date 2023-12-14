<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

$teamArr = Helpers::arrayTeam();

   $size = 12;
   $size2 = 12;

   $teamMembers = count($teamArr);

   switch( $teamMembers){
       case '0':
           $size = '12 text-center';
           break;
       case '1':                    
           $size = 3;
           $size2 = 9;
           break;
       default:
            $size = 6;
            $size2 = 6;
           break;
       break;
   }

 ?>

<div class="container"> 
    <section class="section section-figures section-height-1 bg-light position-relative border-0 m-0" id="team">
        <div class="container"> 
            <div id="tour" class="container container-xl-custom  ">
                <h1 class="font-weight-normal">
                    <?= Yii::t('app','menu_team') ?>
                </h1>   
            <div>
            <div class="row  my-5">
                <div class="col-md-<?= $size ?> order-2 order-md-1 text-center text-md-start">
                    <?php if(count($teamArr) > 1){ ?>                
                        <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0 owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}" style="height: auto;">
                            <div class="owl-stage-outer">       
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1308px; padding-left: 40px; padding-right: 40px;">
                                    <?php } ?>                     
                                    <?php foreach($teamArr as $key => $team): ?>                           
                                        <div class="owl-item active" style="width: <?= ((count($teamArr) >= 2) ? '100%' : '100%') ?> ; margin-right: 25px;">
                                            <div>     
                                                <?php
                                                    $file = (file_exists($team['path'].$team['image']) ? $team['path'].$team['image'] : 'images/team/team-default.jpg');
                                                ?>                                
                                                <?= Html::img($file, ['class' => 'img-fluid img-thumbnail rounded-0 mb-4']);?>
                                                <h3 class="font-weight-bold text-color-dark text-4 mb-0">
                                                    <?= $team['first_name'] ?>
                                                </h3>
                                                <p class="text-2 mb-0">
                                                    <?= Yii::t('app', $team['job_title']) ?>
                                                </p>
                                            </div>
                                        </div>                     
                                    <?php endforeach; ?> 
                                    <?php if(count($teamArr) >= 2){ ?>
                                </div>
                            </div>    
                            <?php if(count($teamArr) >= 3){ ?>             
                            <div class="owl-nav">
                                <button type="button" role="presentation" class="owl-prev"></button>
                                <button type="button" role="presentation" class="owl-next disabled"></button>
                            </div>
                            <div class="owl-dots disabled"></div>        
                            <?php } ?>         
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-<?= $size2 ?> order-1 order-md-2 text-center text-md-start mb-5 mb-md-0">
                    <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1">
                        <strong class="font-weight-extra-bold"> 
                            <?= Yii::t('app', $companyArr['page_code_team_title']) ?>
                        </strong>
                    </h2>
                    <p class="lead">
                        <?= Yii::t('app', $companyArr['page_code_team_text']) ?>
                    </p>
                </div>
            </div>    
        </div>  
    </section>
</div>