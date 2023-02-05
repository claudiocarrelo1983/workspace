<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



<div class="container">
    <div class="row">
        <div class="col-sm">
            <?= Html::img('images/jsonbanner.jpg', ['class' => 'img-thumbnail mb-5']);?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body border text-secondary">
                    <h2 class="card-title"><strong>Publish All</strong></h2>               
                    <p class="card-text">Loads all database into prodution.</p>

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>    
                        <div class="container-fluid">
                            <?= $form->field($model, 'type')->hiddenInput(['value'=>'json'])->label(false); ?>
                            <div class="main" style="text-align:right">              
                                <?= Html::submitButton('Run', ['class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1']) ?>
                            </div>            
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card border text-primary">
                <div class="card-body">
                    <h2 class="card-title"><strong>Load Translations</strong></h2>
                    <p class="card-text">Loads all translations if they are missing.</p>

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>    
                        <div class="container-fluid">
                             <?= $form->field($model, 'type')->hiddenInput(['value'=>'tables'])->label(false); ?>
                            <div class="main" style="text-align:right">              
                                <?= Html::submitButton('Run', ['class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1']) ?>
                            </div>            
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>  

        <div class="col-sm">

        <div class="card border text-primary">
                <div class="card-body">
                    <h2 class="card-title">
                        <strong>Deploy to Production</strong>
                    </h2>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <div class="container-fluid">
                        <div class="main pt-4" style="text-align:right">       
                            <input type="hidden" name="_csrf-backend" value="iZSe07U_PF92CgrgnU3ynJYPLUoZ3TbP3sSFhSg8DLH9_NiBgncEKThNXoT_CoDV3GFFeX2fdIi4vvTSfQhdyw==">           
                            <button class="btn btn-modern btn-primary btn-outline btn-arrow-effect-1" data-bs-toggle="modal" data-bs-target="#defaultModal">
                                Deploy
                            </button>
                        </div>   
                    </div> 
                </div>
            </div>         

            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Deploy to Production</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to deploy to prodution?</p>
                        </div>
                        <div class="modal-footer">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>   
                                <?= $form->field($model, 'type')->hiddenInput(['value'=>'deploy'])->label(false); ?>
                                <div class="main" style="text-align:right">              
                                    <?= Html::submitButton('Run', ['class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1']) ?>
                                </div>           
                            <?php ActiveForm::end(); ?>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


