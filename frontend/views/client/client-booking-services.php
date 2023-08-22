
<?php

use yii\db\Query;

$query = new Query;

$usernameValue = Yii::$app->user->identity->username;

$companyArr = $query->select(
    [
        'id',
        'sheddule_array',
        'username_array',
        'location_code'
    ]
    )
->from('company_locations')    
->where(
    [
    //'like', 'username_array', '%carrelo%', false,
    'company_code' => Yii::$app->user->identity->company_code,
    'active' => 1
    ])
->all();

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