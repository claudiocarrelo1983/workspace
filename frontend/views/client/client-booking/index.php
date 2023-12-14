<?php

use yii\db\Query;
use common\Helpers\Helpers;

$companyLocations = Helpers::arrayCompanyLocations();
$code = Helpers::findCompanyCode();
$companyArr = Helpers::myCompanyArr();
$teamArr = Helpers::arrayTeam();

$query = new Query;

$sTableArr = $query->select([
                'service_code',
                'location_code',
                'team_username',
                'date',
                'time'
            ])
            ->from(['sheddule'])
            ->where(
            [
                'company_code' => Yii::$app->request->get('code'),                                             
            ]
            )->all();

$shedduleTableArr = [];

foreach($sTableArr as $values){
    $shedduleTableArr[$values['location_code']][$values['service_cat']][$values['team_username']][strtotime($values['date'])][strtotime($values['time'])] = 1;
}

$servicesArr = $query->from(['s' => 'services'])
    ->select([   
        's.service_code',
        's.category_code',
        's.price',         
        'services_title'  => 's.page_code_title',        
        'services_text'  => 's.page_code_text',
        ])
    ->where(
        [
            's.company_code' => Yii::$app->request->get('code')   
        ]
    )->orderBy(['order'=>SORT_ASC])->all();


$company = Yii::$app->request->get('code');

$query1 = new Query;

$myData = '';



?>


<?= $this->render('@frontend/views/client/page/header', ['myData' => $myData, 'model' => $model, 'companyArr' => $companyArr]); ?>

<?= $this->render('@frontend/views/client/page/banner',['code' => $company, 'companyArr' => $companyArr]); ?>

<div class="py-4"></div>  

<div id="examples" class="container  pb-5">

    <?= $this->render('@frontend/views/client/client-booking/links'); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0">        
                <div class=" px-3">
                    <?= $this->render('@frontend/views/client/client-booking/services', ['companyArr' => $companyArr]); ?>             
                </div> 
                  
                <div class="px-3">                   
                    <?= $this->render('@frontend/views/client/client-booking/bookings', ['date' => $date,   'publish' => $publish,'teamArr' => $teamArr, 'companyArr' => $companyArr,'code' => $code, 'companyLocations' => $companyLocations]); ?>  
                </div>           
                <div>
                    <?= $this->render('@frontend/views/client/client-booking/appointments', ['date' => $date,  'publish' => $publish,'model' => $model, 'teamArr' => $teamArr, 'companyArr' => $companyArr, 'code' => $company, 'companyLocations' => $companyLocations, 'shedduleTableArr' => $shedduleTableArr,  'servicesArr' => $servicesArr]); ?>                          
                </div>                              
            </div>    
        </div>
    </div>
</div>


