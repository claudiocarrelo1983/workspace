<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\Helpers\Helpers;

$code = Helpers::findCompanyCode();

$arrValues= [
    
    'location' => [  
        'exist' => Helpers::booleanExistCompanyLocations(),  
        'code' => $code,   
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')),        
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),    
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')), 
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
        'icon' => 'icon-home icons'

    ],
    'team' => [   
        'exist' => Helpers::booleanDisplayExistTeam(),      
        'code' => $code,  
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')),      
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),  
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),   
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')),
        'icon' => 'icons icon-user'      
               
    ],
    'services' => [
        'exist' => 1,  
        'code' => $code,  
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')), 
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),    
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),  
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
        'icon' => 'icon-settings icons'
    ],    
    'schedule' => [
        'exist' => 1,  
        'code' => $code,  
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')),   
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),   
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),    
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')),   
        'icon' => 'icon-calendar icons'  
    ],   
    'details' => [
        'exist' => 1,  
        'code' => $code,  
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')),   
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),   
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),  
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
        'icon' => 'icon-pencil icons'      
    ], 
    'complete' => [
        'exist' => 1,  
        'code' => $code,  
        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')),    
        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),  
        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),  
        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')),  
        'icon' => 'icon-trophy icons' 
    ],
   
];

//$arrValues['location'] = ['service' => ((empty(Yii::$app->request->get('service'))) ? Yii::$app->request->get('service') : '')];

$arrResultExist = [];
foreach($arrValues as  $key => $value){
    if(isset($value['exist']) && $value['exist'] == true){
        unset($value['exist']);
        $arrResultExist[$key] =  $value;
    }
}

$break = 0;
$keysArr = array_keys($arrResultExist);
$start = 0;
$end = bcsub(count($keysArr), 1);


foreach($keysArr as  $key => $value){
    if($value == $type){
        $start = (($key == 0) ? $value : $keysArr[$key - 1]);
        $end = (isset($keysArr[$key + 1]))  ? $keysArr[$key + 1] : $keysArr[$key];
    }
}
$found = '';
$inc = 0;

foreach(array_keys($arrResultExist) as $key => $value){
    if($value == $type){
        $found = $key;
        break;
    }
}


?>


<div class="row  d-none d-sm-none d-md-block">
    <div class="col mt-5 mb-2">
        <div class="row process my-5 justify-content-center">    
            <?php 
                $textColor = 'primary'; 
                $inc = 1;
                $countSteps = count($arrResultExist);
               
            ?>
            <?php foreach($arrResultExist as $key => $value): ?>                
                <div class="<?= (($inc == $countSteps) ? 'process-step' : 'process-step') ?> col-2 mb-5 mb-lg-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                    <div class="process-step-circle-<?= $textColor ?>">
                        <strong class="process-step-circle-content pt-1">
                            <?php if($textColor == 'grey') {  ?>
                                <i class="<?= $value['icon'] ?> text-5 text-<?= $textColor ?>"></i>
                            <?php }else{  ?>
                                <?=
                                    Html::a(
                                        '<i class="'.$value['icon'].'  text-5 text-'.$textColor.'"></i>',                                           
                                        Url::toRoute(
                                            array_merge(
                                                    ['/choose-'.$start, 'code' => Yii::$app->request->get('code')],
                                                    [                                   
                                                        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
                                                        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
                                                        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')), 
                                                        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),   
                                                        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),   
                                                        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
                                                    ]
                                                )
                                        )                             
                                    )
                                ?>
                            <?php }  ?>
                        </strong>
                    </div>
                    <div class="process-step-content">
                        <h4 class="mb-1 text-5 font-weight-bold">
                            <?=  Yii::t('app', $key) ?>
                        </h4>            
                    </div>
                </div>
                
            <?php        
                if($type == $key) {
                    $textColor = 'grey';
                } 
                $inc++;            
            ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="row d-md-none">
    <div class="col mt-5">
        <div class="row process  justify-content-center">    
            <?php 
                $textColor = 'primary'; 
                $inc = 1;
                $countSteps = count($arrResultExist);
               
            ?>
            <?php foreach($arrResultExist as $key => $value): ?>                
                <div class=" col-2 mb-5 mb-lg-4 appear-animation animated fadeInUpShorter appear-animation-visible " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                    <div class="process-step-circle-<?= $textColor ?>-mobile text-center">
                        <strong class="process-step-circle-content">
                            <?php if($textColor == 'grey') {  ?>
                                <i class="<?= $value['icon'] ?> text-1 text-<?= $textColor ?>"></i>
                            <?php }else{  ?>
                                <?=
                                    Html::a(
                                        '<i class="'.$value['icon'].'  text-1 text-'.$textColor.'"></i>',                                           
                                        Url::toRoute(
                                            array_merge(
                                                    ['/choose-'.$start, 'code' => Yii::$app->request->get('code')],
                                                    [                                   
                                                        'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
                                                        'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
                                                        'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')), 
                                                        'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),   
                                                        'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),   
                                                        'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
                                                    ]
                                                )
                                        )                             
                                    )
                                ?>
                            <?php }  ?>                        
                        </strong>
                    </div>              
                </div>
                
            <?php        
                if($type == $key) {
                    $textColor = 'grey';
                } 
                $inc++;            
            ?>
            <?php endforeach; ?>
      
        
        </div>
    </div>
</div>


<div class="row justify-content-center py-5 px-3 d-none">

    <?php
        echo '<div class="col-2 py-2">    
                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center text-center ">  
                    <li class="text-transform-none input-group input-group-lg">'.
                        Html::a(
                            '<i class="fas fa-angle-double-left"></i>',                                           
                            Url::toRoute(
                                array_merge(
                                        ['/choose-'.$start, 'code' => Yii::$app->request->get('code')],
                                        [                                   
                                            'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
                                            'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
                                            'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')), 
                                            'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),   
                                            'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),   
                                            'schedule' => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')), 
                                        ]
                                    )
                            ),
                            ['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4 ']
                        ).                        
                    '</li>   
                </ul>
            </div>';
    ?>


     
    <div class="col-8 py-2 d-none d-sm-none d-md-block">   
        <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center py-2">           
            <?php foreach($arrResultExist as $key => $value): 
                
                    switch($key){
                        case 'complete':
                            ?>
                                <li class="text-transform-none me-2">  
                                    <span class= "<?= ((isset($type) && $type == $key) ? 'text-decoration-none text-color-primary' : 'text-decoration-none text-color-dark text-color-primary') ?>">
                                        <?=  Yii::t('app', $key) ?>
                                    </span>
                                </li>  
                            <?php
                        break;   
                        case 'location':
                            ?>
                                <li class="text-transform-none me-2">  
                                    <span class= "<?= ((isset($type) && $type == $key) ? 'text-decoration-none text-color-primary' : 'text-decoration-none text-color-dark text-color-primary') ?>">
                                        <?=  Yii::t('app', $key) ?>
                                    </span>
                                </li>  
                            <?php
                        break;                  
                        default:  

                  
                            ?>
                                <li class="text-transform-none me-2">  
                                    <span class= "<?= ((isset($type) && $type == $key) ? 'text-decoration-none text-color-primary' : 'text-decoration-none text-color-dark text-color-hover-primary') ?>">
                                        <?=  Yii::t('app', $key) ?>
                                    </span>
                                </li>  
                            <?php
                             
                            ?>
                            <!--
                                <li class="text-transform-none me-2">                           
                                    <?= 
                                        Html::a(
                                            Yii::t('app', $key),                                           
                                            Url::toRoute(
                                                array_merge(
                                                        ['/choose-'.$key, 'code' => Yii::$app->request->get('code')],
                                                        $value
                                                    )
                                            ),
                                            ['class' => ((isset($type) && $type == $key) ? 'text-decoration-none text-color-primary' : 'text-decoration-none text-color-dark text-color-hover-primary')]
                                        ) 
                                    ?>
                                </li>   
                                -->          
                            <?php   
                                     
                        break;
  
                    }                
                    $inc++;
                endforeach; 
            ?>         
        </ul>
    </div>
    <div class="col-8 py-2 text-center d-md-none">    
        <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold  justify-content-center text-center">  
            <li class="text-transform-none me-2 input-group input-group-lg">  
                <?= 
                    Html::a(
                        'Nova Marcação',                                           
                        Url::toRoute([
                            '/choose-location',
                            'code' => Yii::$app->request->get('code'),
                            'location' => '*',
                            'team' => '*',
                            'service' => '*',           
                            'day' => '*',
                            'time' => '*'
                        ]),
                        ['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary w-100 text-5 font-weight-bold']
                    ) 
                ?>
            </li>   
        </ul>
    </div>


    <?php
        $rightArrow =
            '<div class="col-2 py-2">    
                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center text-center">  
                    <li class="text-transform-none me-2 input-group input-group-lg"> '.               
                        Html::a(
                            '<i class="	fas fa-angle-double-right"></i>',                                           
                            Url::toRoute(
                                array_merge(
                                        ['/choose-'.$end, 'code' => Yii::$app->request->get('code')],
                                        [                                   
                                            'service' => ((empty(Yii::$app->request->get('service'))) ? '*' : Yii::$app->request->get('service')),       
                                            'team' => ((empty(Yii::$app->request->get('team'))) ? '*' : Yii::$app->request->get('team')),       
                                            'location' => ((empty(Yii::$app->request->get('location'))) ? '*' : Yii::$app->request->get('location')), 
                                            'schedule'  => ((empty(Yii::$app->request->get('schedule'))) ? '*' : Yii::$app->request->get('schedule')),  
                                            'day' => ((empty(Yii::$app->request->get('day'))) ? '*' : Yii::$app->request->get('day')),    
                                            'time' => ((empty(Yii::$app->request->get('time'))) ? '*' : Yii::$app->request->get('time')),
                                        ]
                                    )
                            ),
                            ['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4']
                        ).'
                    </li>   
                </ul>
        </div>'
    ?>

    <?php
        $emptyArrow =
                    '<div class="col-2 py-2">    
                        <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center text-center">  
                            <li class="text-transform-none me-2 input-group input-group-lg"> 
                                <span class="input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4 ">
                                    <i class="	fas fa-angle-double-right"></i>
                                </span>                        
                            </li>   
                        </ul>
                    </div>';
    ?>

    
    <?php

        $str = '';

        switch($type){
            case 'location':
                if(Yii::$app->request->get('location') == '*'){
                    $str = $emptyArrow;
                }else{
                    $str = $rightArrow;
                }
             
            break;
            case 'team':
                if(Yii::$app->request->get('team') == '*'){
                    $str = $emptyArrow;
                }else{
                    $str = $rightArrow;
                }
            break;
            case 'services':
                if(Yii::$app->request->get('service') == '*'){
                    $str = $emptyArrow;
                }else{
                    $str = $rightArrow;
                }
            break;
            case 'schedule':
                if(Yii::$app->request->get('day') == '*' && Yii::$app->request->get('time') == '*'){
                    $str = $emptyArrow;
                }else{
                    $str = $rightArrow;
                }
            break;
            case 'details':
                $str = $emptyArrow;
            break;
            case 'complete':
                $str = $emptyArrow;
            break;
        
        };

        echo $str;

    ?>

</div>


