<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


?>

<?php foreach($traininglist as $key => $value){ ?>
 <div class="tab-pane fade <?= (($key == 0) ? 'active show border' : '') ?>" id="v-pills-<?= $key ?>" role="tabpanel">
    <h4 class="card-title mb-4"><?= $value['title'] ?></h4>    
        
        <?php 

    if(isset($value['training'])){

        foreach($value['training'] as $key => $trainigvalue){       
            
        ?>
    
        <div id="gen-ques-accordion" class="accordion custom-accordion">
            <div class="mb-3">
                <a href="#general-collapse<?= $key ?>" class="accordion-list" data-bs-toggle="collapse" aria-expanded="true" aria-controls="general-collapseOne">
                        <div><?= $trainigvalue['title'] ?></div>   
                        <i class="mdi mdi-minus accor-plus-icon"></i>          
                </a>            
                <div id="general-collapse<?= $key ?>" class="collapse" data-bs-parent="#gen-ques-accordion">
                    <?= $this->render('training-insertboard', ['trainigvalue' => $trainigvalue, 'key' => $key]); ?>
                </div>
            </div>       
        </div>        
    
        <?php
        
        }
    }
        ?>
    </div>
</div>

<?php
}
?>