<?php

use common\Helpers\Helpers;
use yii\helpers\Html;

?>
<div class="row">     
    <!-- Start Services -->                               
        <?= $this->render('@frontend/views/client/booking/date',[
             'day' => (empty($model->date) ? $day : $model->date),
             'oneLessDay' => $oneLessDay,
             'oneMoreDay' => $oneMoreDay,
        ]); ?>                     
    <!-- End Services -->                                                              
</div>  

                  
<div class="row">
    
    <?php if($closed == 'true'){  ?>

        <h4 class="text-10 text-center py-5">
            <?= Yii::t('app', 'booking_closed') ?>
        </h4> 

    <?php }else{ ?>   
   
        <?php if(empty($userShedduleArr)) { ?>
            <h4 class="text-10 text-center py-5">
                <?= Yii::t('app', 'no_more_booking_available_for_today') ?>
            </h4> 
        <?php }else{ ?> 
            <?php foreach($userShedduleArr as $keyDay => $arrServices): ?> 
                <div class="col text-center pt-5" >
                    <div class="row" >
                        <h4>
                            <?= Yii::t('app', $keyDay) ?>                 
                        </h4> 
                        <?php 
                        
                            foreach($arrServices as $dayHour => $values){ 
                              
                        ?>
                            <div class="col-lg-6">   
                                <div class="form-group field-choice-location-<?= $dayHour ?> has-success">                 
                                    <input type="radio" id="choice-schedule-<?= $dayHour ?>" class="d-none imgbgchk input-display-services" name="Sheddule[time]" value="<?= date('H:i',$dayHour) ?>"  aria-invalid="false"> 
                                </div>                                                     
                                <label class="btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2" id="choice-schedule-<?= $dayHour ?>" for="choice-schedule-<?= $dayHour ?>" style="width: 100%;" onclick="checkScheduleTick(this)">                     
                                    <?= date('H:i',$dayHour)  ?> 
                                    <div class="text-center">     
                                        <div id="tick-choice-services-cl202311241943084512"  style="display:none">
                                            <div class="tick-services"><i class="fa fa-check"></i></div>
                                        </div>	
                                    </div>                                                             
                                </label>                                               
                            </div>     
                        <?php                       
                            }  
                         ?>        
                    </div>
                </div>
        <?php 
            endforeach;
            };
        };
    ?>   
</div>
