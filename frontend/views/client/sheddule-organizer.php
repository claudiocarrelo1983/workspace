
<?php

use yii\db\Query;

$query = new Query;

$usernameValue = Yii::$app->user->identity->username;

$companyArr = $query->select('*'
    )
->from('company_locations')    
->where(
    [
    //'like', 'username_array', '%carrelo%', false,
    'company_code' => Yii::$app->user->identity->company_code ,
    'active' => 1
    ])
->one();


//find username on array
$username = '';

if(isset($companyArr['username_array'])){
    $explodeUsernames = explode(',', $companyArr['username_array']);
    foreach($explodeUsernames as $value){
        if($usernameValue == trim($value)){
            $username = $value;          
            break;
        }
    }
}

$usernameValue =  Yii::$app->user->identity->username; 


?>

<?= $this->render('/client/client-booking-header', ['myData' => '', 'logo' => '']); ?>

<?= 
    $this->render('/client/sheddule_details', 
        [  
        'companyArr' => $companyArr,    
        'location_code' => '',
        'service_code' => '',
        'keyX' => 0,
        'date' => $date,
        'page' => 'sheddule-organizer',
        'modelShedduleSearch' => $model,
        'modelShedduleCreate' => $model,
        'modelShedduleEdit' => $model,
        'modelShedduleCancel' => $model,
        'modelShedduleConfirm' => $model,
        'modelSheddule' =>$model,
        'usernameValue' => $usernameValue,
        'code'=> 0,
        'i' => 1
    ]); 
?>  
         