<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;


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

$companyLocations = $query1->select('*')
            ->from(['company_locations'])
            ->where(
                [
                   'company_code' => $company,
                   'active' => 1              
                ])         
            ->all();

$teamArr = $query->select('*')
            ->from(['team'])
            ->where(
                [
                   'company_code' => Yii::$app->request->get('code'),            
                   'active' => 1              
                ])         
            ->all();


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$servicesCatArr = $query->from(['sc' => 'services_category'])
        ->select([
            'sc.category_code',
            'page_code_sc_title'  => 'sc.page_code_title',
            'services_category_title' => 'sc.page_code_title',
            ])
        ->where(['sc.company_code' => Yii::$app->request->get('code')])
        ->orderBy(['sc.order'=>SORT_ASC])
        ->all();


$myData = '';

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>


<?php if(isset($companyArr[0]['color'])) {
        if(!empty($companyArr[0]['color'])){ 
?>
    <style>
        .featured-primary-custom{
            border-top-color: <?= $companyArr[0]['color'] ?> !important;
            border-top: 3px solid <?= $companyArr[0]['color'] ?> !important;
        }

        .btn-primary{
            background-color: <?= $companyArr[0]['color'] ?> !important;
            border-color: <?= $companyArr[0]['color'] ?> !important;
        }

        .list.list-icons.list-icons-style-3 li > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li a:first-child > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li > .icons:first-child, .list.list-icons.list-icons-style-3 li a:first-child > .icons:first-child{
            background-color: <?= $companyArr[0]['color'] ?> !important;
        }
        .btn-link{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
        .dropdown-reverse:hover > a{
            color: <?= $companyArr[0]['color'] ?> !important;
        }
    </style>
<?php }
} 

//$displayByDay = ((Yii::$app->request->get('day') > 0 && $usernameValue !== Yii::$app->request->get('username')) ? 'display:none' : '');

?>


<?= $this->render('/client/client-booking-header', ['myData' => $myData, 'publish' => $publish, 'code' => $company, 'logo' => ((isset($companyArr[0]['path_logo'])) ? $companyArr[0]['path_logo'].$companyArr[0]['image_logo'] : '')]); ?>

<div class="py-4"></div>  

<div id="examples" class="container  pb-5">
    <?= $this->render('/client/client-links'

); ?>
    
    <div class="row ">
        <div class="col  text-center"> 
            <div class="featured-box featured-box-primary text-start mt-0">
                <div class="box-content px-3 pt-4">
                    <h4 class="color-primary font-weight-semibold text-6 text-uppercase mb-0 pb-4">
                        Book a new Appointment
                    </h4> 
                    <!-- Localização -->
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0 pb-4">
                        Escolha Localização
                    </h4>                 
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <div class="custom-select-2">
                                <select class="form-select mb-3" id="location-dropdown-select"  data-msg-required="Please select a city." name="city" required onchange="displayTeam(this);">
                                    <option value="">Choose...</option>
                                    <?php foreach($companyLocations as $key => $location): ?> 
                                        <?php
                                            $selected = (($location['location_code'] == Yii::$app->request->get('location')) ? 'selected' : '');
                                        ?>                                                  
                                        <option value="<?= $location['location_code'] ?>" <?= $selected ?>>
                                            <?= $location['full_name'] ?> (<?= $location['city'] ?>)
                                        </option>  
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>                 
                    </div>     
                    <!--End Localização -->                                                      
                </div>     
                <div class="px-3">                   
                    <?= $this->render('/client/client-booking-marcacao', ['date' => $date,   'publish' => $publish,'teamArr' => $teamArr, 'companyArr' => $companyArr,'code' => $company, 'companyLocations' => $companyLocations]); ?>  
                </div>           
                <div>
                    <?= $this->render('/client/client-booking-services', ['date' => $date,  'publish' => $publish,'model' => $model, 'teamArr' => $teamArr, 'companyArr' => $companyArr, 'code' => $company, 'companyLocations' => $companyLocations, 'shedduleTableArr' => $shedduleTableArr,  'servicesArr' => $servicesArr]); ?>                          
                </div>                              
            </div>    
        </div>
    </div>
</div>


