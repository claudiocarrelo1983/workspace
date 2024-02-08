<?php

use yii\helpers\Html;

?>
                                              
<div class="form-group col-lg-4">                                               
    <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto w-100','maxlength' => true]) ?>                                                 
</div>
<div class="form-group col-lg-4">
    <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto w-100','maxlength' => true]) ?>
</div>
<div class="form-group col-lg-4">
    <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto w-100','maxlength' => true]) ?>
</div>

