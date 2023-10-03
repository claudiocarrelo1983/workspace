<?php


/*
require __DIR__ . '/../../web/ajax/loadCalendar.ajax.php';

die('___');


use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
    ->from(['calendar'])
    ->where(['username' => Yii::$app->user->identity->username]) 
    ->all();


*/
$company = Yii::$app->request->get('code');

//use talma\widgets\FullCalendar;

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use edofre\fullcalendar\Fullcalendar;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use common\Helpers\Helpers;

use yii\db\Query;

$query = new Query;

if(isset(Yii::$app->user->identity->company)){
    $eventsArr = $query->select('*')
        ->from(['events'])
        ->where(['username' => Yii::$app->user->identity->username]) 
        ->all();
}else{
    $eventsArr = [];
}

$companyDetails =  Helpers::myCompanyArr();



$events = array();
  //Testing
  $Event = new \edofre\fullcalendar\models\Event();
  $Event->id = 1;
  $Event->title = 'milad';
  $Event->editable=TRUE;
  $Event->start = date('2023-03-14');
  $events[] = $Event;

  $Event = new  \edofre\fullcalendar\models\Event();
  $Event->id = 2;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
  $events[] = $Event;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$company = ((empty($company)) ? Yii::$app->user->identity->company_code : $company);

?>


<!-- Load jQuery -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>




<header id="header" class="header-dark header-effect-shrink " data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-light border overflow-visible">    
        <?php if (!Yii::$app->user->isGuest) { ?>    
            <div class="container-full">
                <?php if ($publish == 1) { ?>  
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
              
            </div>    
        <?php } ?>    
        <div class="header-top border">
         
            <div class="container">
           
                <div class="header-row py-2 ">	 
                
                    <div class="header-column justify-content-start px-2">
                        <div class="header-row">                           
                                |
                            <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                            <span class="px-2 language" data-url=<?= Url::base(true); ?> data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                            <?php endforeach; ?>                                        
                        </div>
                    </div>  
                    <div class="header-column justify-content-end px-2">
                        <div class="header-row ps-2 justify-content-end">
                            <nav class="header-nav-top">	                         
                            
                                <?php if (!Yii::$app->user->isGuest) { ?>                                
                                    <span class="grey-text  text-center">                                               
                                        <span class="m-1">					
                                            <?= Yii::$app->user->identity->username ?>
                                        </span>                             	
                                    </span>  
                                   <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->level == 'team') { ?>   
                                        <span class="my-2 mx-1">|</span>                              
                                        <span class="grey-text  text-center">                                                     
                                            <span class="m-1">				
                                                <?= Html::a(
                                                    Yii::t('app', 'menu_admin_sheddule'),                                             
                                                    Url::toRoute(['/sheddule-organizer',
                                                        'code' => $company
                                                    ]),
                                                    [                                                       
                                                        'data-hash' => '',
                                                        'data-hash-offset' => 0,
                                                        'data-hash-offset-lg' => 130,
                                                    ]
                                                ) ?>
                                            </span>	
                                        </span> 
                                  
                                    <?php } ?>                            
           
                                    <span class="my-2 mx-1">|</span>                               
                                    <?=
                                            Html::beginForm(        
                                                Url::toRoute(['page/logout', 'code' => $company]
                                            ), 
                                                'post', ['class' => 'form-inline'])
                                                . Html::submitButton(
                                                Yii::t('app', 'login_logout'),
                                                ['class' => 'btn-link logout white-text']
                                            )
                                            . Html::endForm()
                                    ?>  

                                    


                                <?php } else { ?>

                                    <span class="my-2 mx-1">|</span>   
                                    <?= Html::a(
                                            Yii::t('app', 'login'),
                                            Url::toRoute(['page/login', 'code' => $company]),
                                            [
                                                'class' => 'grey-text',
                                                'data-hash' => '',
                                                'data-hash-offset' => 0,
                                                'data-hash-offset-lg' => 130,
                                            ]
                                        ) ?>
                                    <span class="my-2 mx-1">|</span>   
                                    <?= Html::a(
                                            Yii::t('app', 'register'),
                                            Url::toRoute(['page/signup', 'code' => $company]),
                                            [
                                                'class' => 'grey-text',
                                                'data-hash' => '',
                                                'data-hash-offset' => 0,
                                                'data-hash-offset-lg' => 130,
                                            ]
                                        ) ?>
                                    <span class="m-2">|</span>   


                                <?php }  ?>
                            </nav>	                     
                        </div>  
                    </div>
                </div>                   
            </div>
        </div>
        <div class="header-container container" style="height: 100px; min-height: 0px;">
            <div class="header-row">
                <div class="header-column flex-grow-0">
                    <div class="header-row pe-4 mt-5">
                        <div class="header-logo" style="width: 100%; height: 95px;">
                            <a href="index.html">                              
                                <?= Html::img($companyDetails['path'].$companyDetails['image_logo'], ['class' => 'img-fluid border img-thumbnail p-1 mt-3', 'style' => 'top: 0px;  height: 150px;']);?>
                            </a>
						
                        </div>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-column header-nav header-nav-links justify-content-end pr-2">         
                            <div class="header-row ps-4 justify-content-end">								
                                <button class="btn header-btn-collapse-nav ms-0 ms-sm-3" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1  justify-content-end" style="">                        
                                <nav class="collapse header-mobile-border-top">
                                    <ul class="nav nav-pills" id="mainNav">   
                                                            
                                        <li class="dropdown"> 
                                            <?= 
                                            Html::a(
                                                Yii::t('app', 'menu_about_us'),                      
                                                Url::toRoute(['page/index', 'code' => $company,'#' => 'anchor-about-us'])
                                            ) 
                                            ?>                                 
                                        </li>         
                                        <li class="dropdown">  
                                            <?= 
                                                Html::a(
                                                    Yii::t('app', 'menu_services'),                      
                                                    Url::toRoute(['page/index', 'code' => $company, '#' => 'anchor-services'])
                                                ) 
                                            ?>                                 
                                        </li>                                           
                                        </li>                                  
                                        <li class="dropdown">   
                                            <?= 
                                                Html::a(
                                                    Yii::t('app', 'menu_contacts'),                      
                                                    Url::toRoute(['page/index', 'code' => $company, '#' => 'anchor-contact-us'])
                                                ) 
                                            ?>                                  
                                        </li>
                                    
                                    </ul>
                                </nav>
                            </div>                       
                        
                        </div>                       
                    </div>   
                </div>              
            </div>
        </div>
    </div>
</header>      
  
<div class="py2-4"></div>  
<?= $this->render('@frontend/views/site/banner_client',['path1' => 'Menu', 'code' => $company, 'path2' => '', 'banner' => $companyDetails['path'].$companyDetails['image_banner']]); ?>
