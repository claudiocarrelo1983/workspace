<?php

/* @var $this yii\web\View */
use common\models\Sheddule;
use yiier\chartjs\ChartJs;
use common\Helpers\Helpers;
use frontend\models\CompanyLocations;
use yii\helpers\Html;
use yii\helpers\Url;


$arrCompanyStats = [];
$arrTeam = [];
$tabArrValues = [];
$tabsOptions = ['day','yesterday','week','month','year'];
$countRevenue = 0;

$userArr = Helpers::getTeamArr();

foreach($userArr as $user){

    $arrServices = [];  
    $count = 0;
    $i = 12;
    $labelsArr = [];


    $dayServices = 0;
    $yesterdayServices  = 0;
    $weekServices  = 0;
    $monthServices  = 0;
    $semesterServices  = 0;
    $yearServices = 0;  
    $dayRevenue = 0;
    $yesterdayRevenue = 0;
    $weekRevenue = 0;
    $monthRevenue = 0;
    $semesterRevenue = 0;
    $yearRevenue = 0;  

    for($x = 1; $x <= 12; $x++){

        $month =  date('M', strtotime(date('Y-m-d'). ' + '.$x.' months'));
        $labelsArr[] =  Yii::t('app', $month);
        $fromDate = date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$x.' months'));
        $toDate = date('Y-m-d', strtotime(date('Y-m-d'). ' - '.bcsub($x, 1).' months'));

        $sheddulleArr = Sheddule::find()
            ->andWhere(['=','company_code', Yii::$app->user->identity->company_code]) 
            ->andWhere(['=','team_username', $user['guid']]) 
            ->andWhere(['=','location_code', $user['location_code']]) 
            ->andWhere(['=','confirm', '1']) 
            ->andWhere(['>','date', $fromDate]) 
            ->andWhere(['<=','date', $toDate]) 
           ->andWhere(['between','date', $fromDate, $toDate]) 
            ->asArray()->all();          

        $i--;
        
        foreach($sheddulleArr as $value){ 

                $diff = strtotime(date('Ymd')) - strtotime($value['date']);
                $days = abs(round($diff / 86400));
             

                if('0' == $days){                       
                    $dayServices++;   
                    $dayRevenue += $value['cost'];  
                }    
                
                if('1' == $days){    
                    $yesterdayServices++;   
                    $yesterdayRevenue += $value['cost'];  
                }  

                if('7' >= $days){    
                    $weekServices++;  
                    $weekRevenue += $value['cost'];  
                }  

                if('31' >= $days){  
                    $monthServices++;         
                    $monthRevenue += $value['cost'];  
                }  

                if('180' >= $days){   
                    $semesterServices++;            
                    $semesterRevenue += $value['cost'];  
                }  

                if('365' >= $days){  
                    $yearServices++;            
                    $yearRevenue += $value['cost'];  
                } 
            
        } 

        $arrServices[$i][] = count($sheddulleArr);

    }

    $arrTeam[$user['username']] = [
        'full_name'=> $user['full_name'],  
        'dayServices' => $dayServices,
        'yesterdayServices' => $yesterdayServices,
        'weekServices' => $weekServices,
        'monthServices' => $monthServices,
        'semesterServices' => $semesterServices,
        'yearServices' => $yearServices,
        'dayRevenue' => $dayRevenue,
        'yesterdayRevenue' => $yesterdayRevenue,
        'weekRevenue' => $weekRevenue,
        'monthRevenue' => $monthRevenue,
        'semesterRevenue' => $semesterRevenue,
        'yearRevenue' => $yearRevenue,
   ];


    $active = 0 ; 

    foreach($arrServices as $value){  
        if($value == 0){
            $active = 0;
        }else{
            $active = 1;
            break;
        }      
    }
  
    ksort($arrServices);

    $arrCompanyStats[$user['location_code']][] = [       
        'username'=> $user['username'],                             
        'label'=> $user['full_name'],  
        'data' => (($active == 1) ? $arrServices : []),
        'borderColor'=> $user['color'],
    ];
}

?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pt-4">
                <?= Yii::t('app', 'menu_admin_dashboard') ?>
            </h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-4">
        <div class="card bg-primary bg-soft" >          
            <div class="row" >
                <div class="col-7">
                    <div class="text-primary p-3">                    
                        <div class="text-primary">
                            <p class="mb-2">
                                <?= Yii::t('app', 'welcome_back') ?>                             
                            </p>
                            <h5 class="mb-1">
                                <?= Yii::$app->user->identity->full_name ?>
                            </h5>
                            <p class="mb-0">
                                <?= Yii::$app->user->identity->username  ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="../assets/images/profile-img.png" class="img-fluid">
                </div>
            </div>          
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card" style="height: 120px;">
            <div class="card-body">
                <div class="row"  >      
                    <div class="col-lg-8 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0 py-2">
                            <div class="row">                                                    
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">
                                            <?= Yii::t('app', 'clients') ?>
                                        </p>
                                        <h5 class="mb-0"><?= $countClients ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">
                                            <?= Yii::t('app', 'team_members') ?>
                                        </p>
                                        <h5 class="mb-0"><?= $countTeam ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">
                                            <?= Yii::t('app', 'resellers') ?>
                                        </p>
                                        <h5 class="mb-0"><?= $countResellers ?></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <?= Html::a(
                                    '<i class="bx dripicons-web align-middle me-1"></i>'.Yii::t('app','webpage'),                          
                                    Url::toRoute(['/page', 'code' => Yii::$app->user->identity->company_code]),
                                    [   
                                    'class' => 'btn btn-primary',        
                                    'target' => '_blank'
                                    ]                             
                                ) ?>                                                          
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">
                                <?= Yii::t('app', 'bookings') ?>
                            </h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>
                                <?= $countBooking ?>
                            </h4>
                            <div class="d-flex">
                                <span class="ms-2 text-truncate">  
                                    <?= Yii::t('app', 'from_previous_day') ?>  
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-archive-in"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">
                                <?= Yii::t('app', 'revenue') ?>                                
                            </h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>
                                <?= $countRevenue ?>
                            </h4>
                            <div class="d-flex">                            
                                <span class="ms-2 text-truncate">  
                                    <?= Yii::t('app', 'from_previous_day') ?>  
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-purchase-tag-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">
                                <?= Yii::t('app', 'cancelations') ?> 
                            </h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>
                                <?= $countCancelations ?>
                            </h4>
                            
                            <div class="d-flex">
                                <span class="ms-2 text-truncate">  
                                    <?= Yii::t('app', 'from_previous_day') ?>  
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">                                    
                    <h4 class="card-title ">
                        <?= Yii::t('app', 'past_earnings') ?>
                    </h4>
                </div>
                <!-- Nav tabs -->              
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <?php 
                        $i = 0;

                        foreach($arrCompanyStats as $key => $companyStats) : 
                    ?>
                        <li>
                            <a class="nav-link <?= (($i == 0) ? 'active' : '') ?>" data-bs-toggle="tab" aria-current="page" href="#<?= $key ?>" role="tab">                             
                                <?= Yii::t('app',CompanyLocations::findOne(['location_code' => $key])->page_code_title) ?>                             
                            </a>
                        </li>
                    <?php 

                        $i++;

                        endforeach; 
                    ?>                 
                </ul>
                <!-- Tab panes -->
                <div class="tab-content border pb-4 px-3 pt-2">
                    <?php 
                         $i = 0;                       

                        foreach($arrCompanyStats as $key => $companyStats) : 
                    ?>
                        <div class="tab-pane <?= (($i == 0) ? 'active' : '') ?> pt-3" id="<?= $key ?>" role="tabpanel">  
                            <div class="row">                          
                                <?= 
                                    ChartJs::widget([
                                        'type' => 'line',                                                
                                        'options' => [
                                            'height' => 90,
                                            'width' => 200,	
                                            'legend' => [	
                                                //'position'=> 'bottom',
                                                'display'=> 'top'		
                                            ],													
                                        ],										
                                        'data' => [
                                            'labels' => $labelsArr,
                                            'datasets' => $companyStats
                                        ],
                                        'clientOptions' => [
                                            'legend' => [
                                                'display' => true,
                                                'position' => 'bottom',
                                            ]
                                        ]

                                    ]);
                                ?>
                            </div>	
                        </div>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>   
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix pt-3">            
                    <h4 class="card-title mb-4">
                        <?= Yii::t('app', 'total_annual') ?>                
                    </h4>
                </div>    
                <ul class="nav nav-tabs " role="tablist">
                    <?php foreach($tabsOptions as $key => $tab): ?>
                        <li>
                            <a class="nav-link <?= (($key == 0) ? 'active' : '') ?>" data-bs-toggle="tab" aria-current="page" href="#<?= $tab ?>" role="tab">                             
                                <?= Yii::t('app', $tab) ?>                        
                            </a>
                        </li>
                    <?php endforeach; ?>                           
                </ul>
                <div class="tab-content pb-4 px-3 pt-2">
                    <?php foreach($tabsOptions as $key => $tab): ?>
                        <div class="tab-pane <?= (($key == 0) ? 'active' : '') ?> pt-3" id="<?= $tab ?>" role="tabpanel">  
                            <div class="table-responsive mt-4">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td class="text-center">
                                                <?= Yii::t('app', 'services') ?>                                          
                                            </td>          
                                            <td class="text-center">
                                                <?= Yii::t('app', 'revenue') ?>
                                            </td>                 
                                        </tr>                           
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $i = 0;
                                            $totalServices = 0;
                                            $totalRevenue = 0;

                                            foreach($arrTeam as $key => $user) :  
                                        
                                        ?>                                    
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-14 mb-1">
                                                        <?= $user['full_name'] ?>
                                                    </h5>                            
                                                </td>  
                                                <td class="text-center">
                                                    <h5 >
                                                        <?php
                                                            $services = $tab.'Services';
                                                            $revenue = $tab.'Revenue';
                                                        ?>
                                                        <?= $user[$services] ?>
                                                    </h5>                            
                                                </td> 
                                                <td class="text-center">
                                                    <h5 >
                                                        <?= $user[$revenue] ?>
                                                    </h5>                            
                                                </td> 
                                            </tr>
                                        <?php                                     
                                            $i++;
                                            $totalServices += $user[$services];
                                            $totalRevenue += $user[$revenue];
                                            endforeach;
                                        ?> 
                                          <tr>
                                                <td >  
                                                    <?= Yii::t('app', 'total') ?>                            
                                                </td> 
                                                <td class="text-center">                                                
                                                    <?= $totalServices ?>                                                                     
                                                </td> 
                                                <td class="text-center">                                              
                                                    <?= $totalRevenue ?>                                                                          
                                                </td> 
                                            </tr>                         
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    <?php endforeach; ?>              
                </div>
            </div>
        </div>
    </div>
</div>
    



				
				
				
				
				
				
				
				
				