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


//use talma\widgets\FullCalendar;

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\helpers\Url;
use common\Helpers\Helpers;

$company = Yii::$app->request->get('code');
$publish = Helpers::checkPublish($company, $model);

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


$bgImg = '../../images/generic/header_bg-calendar.jpg';
$bgImg = '../../images/generic/painting-mountain-lake-with-mountain-background.jpg';

?>

<style>

<?php if(isset($companyArr['color']) && !empty($companyArr['color'])){ ?>


      
        .banner-header-client {
            background-image: url(<?= $companyArr['path'].$companyArr['image_banner'] ?>);
            background-size: cover;
            background-position: center;
            animation-duration: 750ms;
            animation-delay: 300ms;
            animation-fill-mode: forwards;          
            min-height: 650px;  
            background-color:#fff;
            box-shadow: inset 0 0 0 1000px rgba(0,0,0,.7);
           /* min-height: 600px; */
        }
   
        .featured-primary-custom, .featured-box-primary, .box-content{
            border-top-color: <?= $companyArr['color'] ?> !important;
            border-top: 3px solid <?= $companyArr['color'] ?> !important;
        }

        .btn-primary{
            border: 1px solid white  !important;    
            background-color: <?= $companyArr['color'] ?> !important;          
        }

        .list.list-icons.list-icons-style-3 li > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li a:first-child > [class*="fa-"]:first-child, .list.list-icons.list-icons-style-3 li > .icons:first-child, .list.list-icons.list-icons-style-3 li a:first-child > .icons:first-child{
            background-color: <?= $companyArr['color'] ?> !important;
        }
        .btn-link{
            color: <?= $companyArr['color'] ?> !important;
        }
        .dropdown-reverse:hover > a{
            color: <?= $companyArr['color'] ?> !important;
        }

        #header .header-nav.header-nav-line nav > ul li:hover > a:before {
            background: <?= $companyArr['color'] ?> !important;
        }
        #header .header-nav-main nav > ul > li.dropdown.open > a:before, #header .header-nav-main nav > ul > li.dropdown:hover > a:before {
            border-bottom-color: <?= $companyArr['color'] ?> !important;
        }
    

<?php } ?>

    
    .overlay-dark {position: absolute;
        top: 0;
        left: 0;
        background-color: #000;
        opacity: 0.8;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    /*
    .banner-header-client{
        background-image: url(<?= $bgImg ?>);
        background-size: cover;
        background-position: center;
        animation-duration: 750ms;
        animation-delay: 300ms;
        animation-fill-mode: forwards;
        min-height: 500px;     
        opacity: 0.9;
        background-color:#000;
    }
    */
    .banner-header-separator{
        background-image: url(<?= $bgImg ?>);       
    }
    .bg-image-overlay {
        background-color:#000;
    }
 
    .custom-side-dots:before,
    .custom-side-dots:after {
        background-color: <?= $companyArr['color'] ?>
    }

</style>


<!-- Load jQuery -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>

<header id="header" class="<?= (isset($headerTransparent)? '' : 'header-transparent') ?> header-effect-shrink "  data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark-opacity box-shadow-none overflow-visible">    
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->level == 'admin') { ?>     
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
        <div class="header-top">
            <div class="container">
                <div class="header-row py-2 ">	 
                    <div class="header-column justify-content-start px-2 text-white">
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
                                    <span class="white-text  text-center">                                               
                                        <span class="m-1">					
                                            <?= Yii::$app->user->identity->username ?>
                                        </span>                             	
                                    </span>  
                                   <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->level == 'team') { ?>   
                                        <span class="my-2 mx-1">|</span>                              
                                        <span class="white-text  text-center">                                                     
                                            <span class="m-1">			
                                                <?=
                                                    Html::a(
                                                        Yii::t('app', 'menu_admin_sheddule'),                                        
                                                        Url::toRoute(
                                                            [
                                                                '/team-schedule',     
                                                                'code' => Yii::$app->request->get('code'),
                                                                'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),  
                                                                'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),  
                                                            ]
                                                        )                             
                                                    )
                                                ?>                                                  
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
                                                'class' => 'text-white',
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
                                                'class' => 'text-white',
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
        <div class="header-container container " style="height: 40px;">
            <div class="header-row">
                <a class="logo-url" href="/" data-hash="" data-hash-offset="0" data-hash-offset-lg="130"><div class="header-row">
                        <div class="header-logo">							
                            <?= 
                                Html::a(
                                    Html::img(
                                        $companyArr['path'].$companyArr['image_logo'], 
                                        //['class' => 'img-fluid border img-thumbnail mt-2 ', 'style' => 'top: 0px;  ']),  
                                        ['class' => 'd-md-none img-fluid border img-thumbnail p-1 mt-3', 'style' => 'top: 5px;  height: 115px;']),                      
                                    Url::toRoute(['/page', 'code' => $company])
                                ) 
                            ?>   
                            <?= 
                                Html::a(
                                    Html::img(
                                        $companyArr['path'].$companyArr['image_logo'], 
                                        //['class' => 'img-fluid border img-thumbnail mt-2 ', 'style' => 'top: 0px;  ']),  
                                        ['class' => 'd-none d-sm-none d-md-block img-fluid border img-thumbnail p-1 mt-3', 'style' => 'top: 28px;  height: 150px;']),                      
                                    Url::toRoute(['/page', 'code' => $company])
                                ) 
                            ?>  				
                        </div>
                    </div>
                </a>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-no-transform header-nav-bottom-line-active-text-light header-nav-bottom-line-effect-1 header-nav-light-text order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1  justify-content-end">
                                <?= $this->render('/client/page/menu'); ?>       
                            </div>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>	                                              			
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>  

<div class="py-4 d-none d-sm-none d-md-block"></div>  






