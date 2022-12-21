<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use Yii;


?>

<div class="row">   

 <?php
 $i = 1;
 foreach($trainigvalue['currentValues'] as $key => $currentValues){
 ?>
 <div class="col-md-3">
     <div class="mb-3 ">
         <label for="formrow-email-input" class="form-label">(<?=$i++?>)</label>
     </div>
 </div>                                              
 <div class="col-md-3">
     <div class="mb-3 ">
         <label for="formrow-email-input" class="form-label"><?=$currentValues['reps']?></label>
     </div>
 </div>
 <div class="col-md-3">
     <div class="mb-3 ">
         <label for="formrow-password-input" class="form-label">X</label>
     </div>
 </div>
 <div class="col-md-3">
     <div class="mb-3 ">
         <label for="formrow-password-input" class="form-label"><?=$currentValues['value']?>KG</label>
     </div>
 </div>
     
 <?php
 }
 ?>
 
 </div>