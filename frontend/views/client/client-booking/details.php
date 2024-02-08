<?php
use common\Helpers\Helpers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$companyLocations = Helpers::arrayCompanyLocations();
$company = Helpers::findCompanyCode();
$companyArr = Helpers::myCompanyArr();

$companyLocationArr = [];
$arrServices = [];

$filter['location_code'] = Yii::$app->request->get('location');
$teamArr = Helpers::arrayTeam($filter);




?>


<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">

    <?= $this->render('@frontend/views/client/client-booking/links'); ?>

    <?= $this->render('@frontend/views/client/client-booking/steps', ['type' => 'details']); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>
    <div class="container "> 
        <div class="row ">   
            <div class="col  text-center">                  
                <div class=" box-content featured-box  text-start mt-0">        
                    <div class="p-3">
                        <div class="row ">
                            <div class="col-6 py-4">    
                                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 w-100  ">  
                                    <li>
                                        <?=
                                            Html::a(
                                                '<i class="fas fa-angle-double-left"></i>',                                           
                                                Url::toRoute(
                                                    array_merge(
                                                            ['/choose-schedule', 'code' => Yii::$app->request->get('code')],
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
                        <?php $form = ActiveForm::begin(); ?>
                            <div class="row mb-3">                                               
                                <div class="form-group col-lg-4  text-left">                                               
                                    <?= $form->field($model, 'full_name')->textInput(['class' => 'form-control text-3 h-auto ','maxlength' => true]) ?>                                                 
                                </div>
                                <div class="form-group col-lg-4  text-left">
                                    <?= $form->field($model, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto','maxlength' => true]) ?>
                                </div>
                                <div class="form-group col-lg-4  text-left">
                                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto ','maxlength' => true]) ?>
                                </div>
                                <div class="form-group col-lg-4 pt-3">
                                    <?= Html::submitButton(
                                            Yii::t('app','save_button'), 
                                            ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                                    ) ?>
                                  </div>
                            </div>
                        <?php ActiveForm::end(); ?>                
                    </div>                               
                </div>    
            </div>
        </div>
    </div>
</div>





   