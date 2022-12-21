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
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

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
                    <h2 class="card-title"><strong>Revert All</strong></h2>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

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
    </div>
</div>


