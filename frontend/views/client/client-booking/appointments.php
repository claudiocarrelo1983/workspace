
<?php

use yii\db\Query;
use common\Helpers\Helpers;

$query = new Query;

$usernameValue = Yii::$app->user->identity->username;

$companyArr =  Helpers::arrayCompanyLocations();

?>

<?php foreach($companyArr as $key => $location){ ?>

    <?php
    //find username on array
    $username = '';   
  
    if(isset($location['username_array'])){
        $explodeUsernames = explode(',', $location['username_array']);

        foreach($explodeUsernames as $usernameValues){

    ?>

        <div class="table-<?= $location['location_code']?>">
            <?= 
                $this->render('/client/sheddule_details', 
                    [  
                    'companyArr' => $location,  
                    'date' => $date,
                    'keyX' => $key,
                    'page' => 'client-scheddule',
                    'code' => $code,
                    'modelSheddule' => $model,
                    'modelShedduleSearch' => $model,
                    'modelShedduleCreate' => $model,
                    'modelShedduleCancel' =>  $model,
                    'modelShedduleConfirm' => $model,
                    'modelShedduleEdit' => $model,
                    'usernameValue' => $usernameValues,
                    
                ]); 
            ?>  
        </div>

    <?php
        
        }
    }

    ?>    

<?php } ?>
</div>