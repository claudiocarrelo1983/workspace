
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
use yii\helpers\Url;

$query = new Query;

$date = date('d-m-Y',strtotime($day));   
$oneLessDay = date('d-m-Y', strtotime($day. '-1 day'));
$oneMoreDay = date('d-m-Y', strtotime($day. '+1 day'));


/*
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

*/
$companyArr =  Helpers::arrayCompanyLocations();
$companyArr2 = Helpers::myCompanyArr();
$code = Helpers::findCompanyCode();

$coin = '';      

if(isset($companyArr2['coin'])){
    $coin = Yii::t('app',Helpers::getCurrencyName($companyArr2['coin']));
} 

?>

<div style="padding-bottom:60px">

    <?= $this->render('@frontend/views/client/page/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr2]); ?>


    <div class="container">

        <?= $this->render('@frontend/views/client/team-booking/steps', ['type' => 'team-booking']); ?>

        <div class="px-3">
            <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
        </div>

        <div class="row ">   
            <div class="col  text-center"> 
                <div class=" box-content featured-box  text-start mt-0">        
                    <div class=" p-3">
                        <div class="row ">
                            <div class="col-12 py-3 px-3">   
                                <div id="render-schedule">                             
                                    <?= 
                                        $this->render('@frontend/views/client/team-booking/schedule_details', 
                                            [  
                                                'model' => $model,   
                                                'coin' => $coin,   
                                                'url' => Helpers::getPathUrl(),                             
                                                'username' => $username,
                                                'oneLessDay' => $oneLessDay,
                                                'oneMoreDay' => $oneMoreDay,
                                                'day' => strtotime($date),
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
    </div>
</div>