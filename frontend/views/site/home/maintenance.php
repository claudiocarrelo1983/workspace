<?php

use yii\helpers\Json;
use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrTeams = $model->getLastFileUploaded('team');  

$teams = array();

foreach($arrTeams as $team){
    if($team['location'] == 'home'){
        $teams[] = $team;
    }
}

$maintenanceArr = [
    'logo' => 'assets/images/logo.png',
    'text' => 'menu_admin_campaign_manteinance_text'
];


//$json = file_get_contents(Yii::$app->basePath.'\web\json\public-menu.json');
//$structure = Json::decode($json);

$currentUrl = Yii::$app->controller->route;

$this->title = 'Home';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'home';
?>

    <div role="main" class="main  my-5">
        <div class="container  mt-5">
            <div class="row  ">
                <div class="col text-center">
                    <div class="logo">
                        <div class="header-row ">
                            <div class="header-logo  mt-5"  >		
                                <img src="<?= $maintenanceArr['logo'] ?>" class=" img-thumbnail img-thumbnail-no-borders rounded-0"class="rounded-circle " style="margin-top: 50px; width: 17%;" height="25"/>				
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr class="solid my-5">
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="overflow-hidden my-5">
                        <h2 class="font-weight-normal text-7 mb-0 appear-animation" data-appear-animation="maskUp">
                            <strong class="font-weight-extra-bold">
                                <?= Yii::t('app','menu_admin_maintenance_mode') ?>
                            </strong>
                        </h2>
                    </div>
                    <div class="overflow-hidden my-5">
                        <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                            <?= Yii::t('app', $maintenanceArr['text']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr class="solid my-5">
                </div>
            </div>
            
        </div>
    </div>
</div>	

       		






