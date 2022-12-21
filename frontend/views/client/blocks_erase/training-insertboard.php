<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use Yii;


?>



<div class="card">    
    <div class="card-body">
            <?= $this->render('training-insertvalues', ['trainigvalue' => $trainigvalue, 'key' => $key]) ?>               
            <?php

            switch ($trainigvalue['type']){
                case "time":
                        $this->render('training-time', ['trainigvalue' => $trainigvalue, 'key' => $key]);                                 
                    break;
                case "reps":                                   
                        $this->render('training-reps', ['trainigvalue' => $trainigvalue, 'key' => $key]);  
                    break;
                default:
                ?>                   
                    <label for="formGroupExampleInput"><strong>No Info</strong></label>                                
                <?php
                    break;
            }
            ?>  
    </div>
</div>  
<div class="card">    
    <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6 ">
                        <p><strong>Ultimo Registo (<?=$trainigvalue['data']?>):</strong></p>

                        <?=  $this->render('training-lastvalues', ['trainigvalue' => $trainigvalue, 'key' => $key]); ?>
                        
                    </div>								
                </div>                           
                <div class="col-md-6">
                    <div class="mb-6 ">
                        <p><strong>Treino Atual:</strong></p>	
                        <?=  $this->render('training-currentvalues', ['trainigvalue' => $trainigvalue, 'key' => $key]); ?>
                
                    </div>								
                </div>
            </div>
        </p>  
    </div>
</div>
