
<?php

use yii\db\Query;
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$query = new Query;

//$usernameValue = Yii::$app->user->identity->username;

$companyArr =  Helpers::arrayCompanyLocations();
$companyArr2 = Helpers::myCompanyArr();
$code = Helpers::findCompanyCode();

?>

<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr2]); ?>

<div id="examples" class="container  pb-5">

    <?= $this->render('@frontend/views/client/client-booking/links'); ?>

    <?= $this->render('@frontend/views/client/client-booking/steps', ['type' => 'schedule']); ?>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0">        
                <div class=" p-3">
                    <div class="row ">
                        <div class="col-6 py-4">    
                            <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 w-100  ">  
                                <li>
                                    <?=
                                        Html::a(
                                            '<i class="fas fa-angle-double-left"></i>',                                           
                                            Url::toRoute(
                                                array_merge(
                                                        ['/choose-services', 'code' => Yii::$app->request->get('code')],
                                                        [    
                                                            'location' => Yii::$app->request->get('location'),
                                                            'team' => Yii::$app->request->get('team'),
                                                            'service' => Yii::$app->request->get('service'),           
                                                            'day' => Yii::$app->request->get('day'),
                                                            'time' => Yii::$app->request->get('time')                 
                                                        ]
                                                    )
                                            ),
                                            ['class' =>  'input-group-text text-decoration-none text-color-dark text-color-hover-primary text-4 float-right']
                                        )
                                    ?>                        
                                </li>   
                            </ul>
                        </div>                         
                    </div>  
                    <div class="row ">
                        <div class="col-lg-12">  
                            <div class="heading text-primary heading-border pt-5">   
                                <h3 class="font-weight-normal">
                                    <?= Yii::t('app', 'choose_location') ?>   
                                </h3>           
                            </div> 
                        </div>   
                    </div> 
                    <!-- Start Search -->
                    <div class="row ">   
                        <?= $this->render('@frontend/views/client/client-booking/schedule_search', ['model' => $model, 'day' => $day]); ?>               
                    </div>           
                    <!-- End Search -->
                  
                        <?=
                            $this->render('@frontend/views/client/client-booking/schedule_details', 
                                [  

                                    'model' => $model,
                                    'day' => $day,
                                 /*
                                'companyArr' => $location,  
                                'date' => $date,
                                'keyX' => $key,
                                'page' => 'client-scheddule',
                                'code' => $code,
                                'modelSheddule' => $model,
                                'modelShedduleSearch' => $model,
                                'modelShedduleCreate' => $model,
                                'modelShedduleCancel' =>  $model,
                                'modelShedduleConfirm' => $model,
                                'modelShedduleEdit' => $model,
                                'usernameValue' => $usernameValues,
                                */
                            
                                
                            ]);                        
                        ?> 
                    
                                        
                    <div class="row">
                        <div class="col-lg-12">
                            <hr class="solid mt-5">
                        </div>
                        <div class="col-4">
                            <ul class="list list-icons list-icons-style-4 list-success">
                                <li>
                                    <i class="fas fa-check"></i>
                                    <?= Yii::t('app', 'available') ?>                            
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="list list-icons list-icons-style-5 list-primary">
                                <li>
                                    <i class="fas fa-check"></i>
                                    <?= Yii::t('app', 'unavailable') ?>                            
                                </li>
                            </ul>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
