<?php
use common\Helpers\Helpers;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

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

    <?= $this->render('@frontend/views/client/client-booking/steps', ['type' => 'team']); ?>

    <div class="px-3">
        <?php //$this->render('/client/page/services', ['companyArr' => $companyArr]); ?>
    </div>

    <div class="row ">   
        <div class="col  text-center"> 
            <div class=" box-content featured-box  text-start mt-0">        
                <div class="p-4">
                    <?php $form = ActiveForm::begin(); ?>     
                        <div class="row ">
                            <div class="col-6 py-4">    
                                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 w-100  ">  
                                    <li>
                                        <?=
                                            Html::a(
                                                '<i class="fas fa-angle-double-left"></i>',                                           
                                                Url::toRoute(
                                                    array_merge(
                                                            ['/choose-location', 'code' => Yii::$app->request->get('code')],
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
                        <div class="row">                       
                            <div class="heading text-primary heading-border pt-4">   
                                <h3 class="font-weight-normal">
                                    <?= Yii::t('app', 'choose_professional') ?>   
                                </h3>           
                            </div> 
                        </div> 
                            <section>  
                                                
                                <div class="row">
                                <?php if(count($teamArr) != 0){ ?> 
                                    <?php foreach($teamArr as $key => $team):  ?>  
                                        
                                       
                                        <div class="col-6 col-lg-3 mb-4 mb-lg-0 ">
                                            
                                        <?= $form->field($model, 'team_username', 
                                            ['template' => '{input}']
                                            )->radio(
                                            [
                                                'class' => 'd-none imgbgchk input-display-services',
                                                'uncheck' => null,
                                                'label' => '',
                                                'value' => $team['guid'],
                                                'id' => 'choice-team-'.$team['guid'],
                                                'onclick' => 'this.form.submit()'
                                            ]) 
                                        ?>  
                                        <label id="choice-team-<?= $team['guid'] ?>"  for="choice-team-<?= $team['guid'] ?>" style="width: 100%;" onclick="checkTeamTick(this)"> 
                                                  
                                                <span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
                                                        <span class="thumb-info-wrapper border-radius-0">
                                                            
                                                                <?php
                                                                    $file = (file_exists($team['path'].$team['image']) ? $team['path'].$team['image'] : 'images/team/team-default.jpg');

                                                                    echo  Html::img('/'.$file, ['class' => 'img-fluid border-radius-0']);
                                                                ?>                                                                                                     
                                                    
                                                                <span class="thumb-info-title">
                                                                    <span class="thumb-info-inner responsive-font-images-full-name">
                                                                        <?= $team['full_name'] ?>
                                                                    </span>
                                                                    <span class="thumb-info-type">
                                                                        <?= $team['job_title'] ?>
                                                                    </span>
                                                                </span>
                                                        
                                                        </span>
                                                    </span>
                                            
                                                <div id="tick-choice-team-<?= $team['guid'] ?>" class="tick_container" style="display:none">
                                                    <div class="tick"><i class="fa fa-check"></i></div>
                                                </div>	                                                             
                                            </label> 
                                        </div> 
                                    <?php endforeach;  ?>  
                                    <?php 
                                        }else{
                                    ?>        
                                        <div class="row">
                                            <div class="col my-5 text-center">
                                                <h4>
                                                    <?= Yii::t('app', 'no_team') ?>
                                                </h4>
                                            </div>                              
                                        </div>
                                    <?php
                                        }
                                    ?>  
                                </div>                              
                            </section>
                            <?php ActiveForm::end(); ?>                        
                        </div>                               
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>





   