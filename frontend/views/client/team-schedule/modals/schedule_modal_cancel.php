<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$formCancel = ActiveForm::begin();   

//$modelShedduleCancel = $modelShedduleCancel->findModel($values['id']);
?>

<div class="modal fade" id="client-cancel-<?= $inc ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">
                    Cancel Booking
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body text-4 text-left">
                <?= $formCancel->field($model, 'type')->hiddenInput(['value'=>'1'])->label(false) ?>
                <?= $formCancel->field($model, 'id')->hiddenInput(['value'=> $model->id])->label(false) ?>   
                    <?= Yii::t('app', 'question_cancel') ?>
                Are you sure you want to cancel?                                                   
            </div>
            <div class="modal-footer">
                <?=                             
                    Html::button(
                    'Back',                                                                
                        [         
                            'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                            'data-bs-toggle' => 'modal',    
                            'data-bs-target' =>  '#client-info-'.$inc                             
                        ]
                    ).'   
                    '.Html::submitButton('Save', 
                        ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                    )
                ?>                   
            </div>
        </div>
    </div>
</div>

<?php  ActiveForm::end();  ?>