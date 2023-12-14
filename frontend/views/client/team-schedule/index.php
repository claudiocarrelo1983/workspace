
<?php

$now = new DateTime();

/*
echo date('H:i',time());
die();


if (strtotime('12:00') <= strtotime(date('H:i',time()))){
    die('1');
}
die('0');
*/
use yii\db\Query;
use common\Helpers\Helpers;

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

$companyArr =  Helpers::arrayCompanyLocations();
$companyArr2 = Helpers::myCompanyArr();
$code = Helpers::findCompanyCode();

?>

<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr2]); ?>


<div id="examples" class="container  py-3 my-5">

    <?= $this->render('@frontend/views/client/team-schedule/links'); ?>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0">        
                <div class=" p-3">
                    <div class="row ">
                        <div class="col-12 py-5 px-3">  
                            <!-- Start Search -->
                                <div class="row ">   
                                    <?= $this->render('@frontend/views/client/team-schedule/schedule_search', ['model' => $model, 'day' => $day]); ?>               
                                </div>           
                            <!-- End Search -->
                            <?= 
                                $this->render('@frontend/views/client/team-schedule/schedule_details', 
                                    [  

                                        'model' => $model,
                                        'day' => $day,
                                        'closed' => 1,
                                ]); 
                            ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>