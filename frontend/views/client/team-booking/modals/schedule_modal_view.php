<?php

use kartik\date\DatePicker;
use yii\helpers\Html;

?>

<div class="modal fade" id="client-view-<?= $inc ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"><?= date('H:i',$dayHour) ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body text-left text-3">
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'booking_code') ?>: </strong>
                    <?= $model->booking_code ?>
                </p>
            
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'full_name') ?>: </strong>
                    <?= $model->full_name ?>
                </p>
            
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'service_name') ?>: </strong>
                    <?=  Yii::t('app',$model->service_name)  ?>
                </p>               
            
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'contact_number') ?>: </strong>
                    <?=  $model->contact_number  ?>
                </p>
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'email') ?>: </strong>
                    <?=  $model->email  ?>
                </p>
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'date') ?>: </strong>
                    <?=  $model->date  ?>
                </p>
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'time') ?>: </strong>
                    <?=  date('H:i', strtotime($model->time))  ?>
                </p>
                <?php  if($model->nif != '') { ?>
                    <p class="pb-2">
                        <strong><?= Yii::t('app', 'nif') ?>: </strong>
                        <?=  $model->nif ?>
                    </p>    
                <?php } ?> 
                <p class="pb-2">
                    <strong><?= Yii::t('app', 'price') ?>: </strong>
                    <?=  $coin.$model->price  ?>
                </p>
                <?php
                    if($model->price_advanced != 0) { ?>
                        <p class="pb-2"><strong>
                            <?= Yii::t('app', 'price_advanced') ?>: </strong>
                            <?=  $coin.$model->price_advanced ?>
                        </p>  
                    <?php } ?>  
                <p class="pb-2"><strong>
                    <?= Yii::t('app', 'created_date') ?>: </strong>
                    <?=  $model->created_date ?>
                </p>            
            </div>
            <div class="modal-footer">   
                <?php

                    echo Html::button(
                        Yii::t('app','edit_button'),                                                                
                            [         
                                'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                                'data-bs-toggle' => 'modal',    
                                'data-bs-target' =>  '#client-edit-'.$inc                             
                            ]
                    );

                    echo  Html::button(
                        Yii::t('app','cancel_button'),                                                                
                            [         
                                'class' => 'btn btn-warning rounded-0 mb-2 mt-2' ,
                                'data-bs-toggle' => 'modal',    
                                'data-bs-target' =>  '#client-cancel-'.$inc                                 
                            ]
                    );

                    //if($page == 'sheddule'){

                    echo Html::button(
                        Yii::t('app','check_button'),                                                             
                            [         
                                'class' => 'btn btn-success rounded-0 mb-2 mt-2' ,
                                'data-bs-toggle' => 'modal',    
                                'data-bs-target' =>  '#client-confirm-'.$inc                                
                            ]
                    );
                    echo Html::button(
                        Yii::t('app','missed_button'),                                                                
                            [         
                                'class' => 'btn btn-danger rounded-0 mb-2 mt-2' ,
                                'data-bs-toggle' => 'modal',    
                                'data-bs-target' =>  '#client-missed-'.$inc                                 
                            ]
                    );
                //}

                ?>
            </div>
        </div>
    </div>    
</div>