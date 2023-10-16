<?php

use yii\helpers\Json;
use yii\helpers\Url;
use common\models\GeneratorJson;
use yii\helpers\Html;

$model = new GeneratorJson(); 
$arrTeams = $model->getLastFileUploaded('team');  

$teams = array();

foreach($arrTeams as $team){
    if($team['location'] == 'home'){
        $teams[] = $team;
    }
}



//$json = file_get_contents(Yii::$app->basePath.'\web\json\public-menu.json');
//$structure = Json::decode($json);

$currentUrl = Yii::$app->controller->route;

$this->title = 'Home';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'home';

$publish = 1;
$maintenance = 1;

?>

<div class="body header-body border-top-0 bg-dark box-shadow-none overflow-visible  mb-5">    
    <header id="header" class=" header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-top-0 bg-dark box-shadow-none overflow-visible">
        <?php if (!Yii::$app->user->isGuest) { ?>    
            <div class="container-full">
                <?php if ($publish == 1) { ?>  
                    <?php if ($maintenance == 1) { ?>  
                        <div class="header-column justify-content-center bg-primary text-white py-1 text-1"> 
                            <span class="mr-2">                        
                                <?= Yii::t('app', 'page_header_maintenance_text') ?>                         
                            </span> 
                            <?= Html::a(                      
                                    Yii::t('app', 'click_maintenance'),                                           
                                    Url::toRoute('/manteinance-mode/index'),
                                    [     
                                        'class' => 'text-white',                                                  
                                        'data-hash' => '',
                                        'data-hash-offset' => 0,
                                        'data-hash-offset-lg' => 130,
                                    ]
                                ) 
                            ?>
                        </div>
                    <?php } else { ?> 
                        <div class="header-column justify-content-center bg-success text-white py-1 text-1"> 
                            <span class="mr-2">                        
                                <?= Yii::t('app', 'page_header_text_show') ?>                          
                            </span> 
                            <?= Html::a(                      
                                    Yii::t('app', 'click_show'),                                           
                                    Url::toRoute('/webadmin/index'),
                                    [     
                                        'class' => 'text-white',                                                  
                                        'data-hash' => '',
                                        'data-hash-offset' => 0,
                                        'data-hash-offset-lg' => 130,
                                    ]
                                ) 
                            ?>
                        </div>
                    <?php } ?> 
                <?php } else { ?> 
                    <?php if ($maintenance == 1) { ?>  
                        <div class="header-column justify-content-center bg-primary text-white py-1 text-1"> 
                            <span class="mr-2">                        
                                <?= Yii::t('app', 'page_header_maintenance_text') ?>                          
                            </span> 
                            <?= Html::a(                      
                                    Yii::t('app', 'click_show'),                                           
                                    Url::toRoute('/manteinance-mode/index'),
                                    [     
                                        'class' => 'text-white',                                                  
                                        'data-hash' => '',
                                        'data-hash-offset' => 0,
                                        'data-hash-offset-lg' => 130,
                                    ]
                                ) 
                            ?>
                        </div>
                    <?php } else { ?> 
                        <div class="header-column justify-content-center bg-danger text-white py-1 text-1">  
                            <span class="mr-2">                          
                                <?= Yii::t('app', 'page_header_text_hide') ?>
                            </span>
                            <?= Html::a(                  
                                    Yii::t('app', 'click_hide'),                                               
                                    Url::toRoute('/webadmin/index'),
                                    [     
                                        'class' => 'text-white',                                                  
                                        'data-hash' => '',
                                        'data-hash-offset' => 0,
                                        'data-hash-offset-lg' => 130,
                                    ]
                                ) 
                            ?>
                        </div>  
                    <?php } ?>        
                <?php } ?> 
            </div>    
        <?php } ?>  

            <div class="container-fluid header-top">
                <div class="container">
                    <div class="header-row  py-2 ">	
                                    |
                        <div class="header-column justify-content-start">	
                            <div class="header-row">
                                <nav class="header-nav-top">	
                                <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                                <span class="px-2 language" data-url ='<?= Url::base(true); ?>' data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                                <?php endforeach; ?>  
                            </div>
                        </div>                       
                    </div> 
                </div> 
            </div> 
                  
        </div>
    </header>
</div>
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

       		






