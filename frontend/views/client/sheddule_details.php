<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\db\Query;
use yii\helpers\Url;
use yii\helpers\Html;

$query = new Query;

$query2 = new Query;

$companyArr = $query2->select([
    'c.page_code_team_title',
    'c.page_code_team_text',
    'c.color',
    'c.path' ,
    'c.coin' ,
    'c.image' ,
    'c.company_code' ,
    'c.company_code_url' ,
    'c.company_name' ,
    'c.page_code_text',
    'l.address_line_1',
    'l.address_line_2',
    'l.city',
    'l.postcode',
    'l.country',
    'c.website',
    'c.facebook',
    'c.pinterest',
    'c.instagram',
    'c.twitter',
    'c.tiktok',   
    'c.linkedin',
    'c.youtube',
    'l.google_location',
    'l.contact_number',   
    'l.email',   
    'l.location_code',
    'l.location',
    'l.sheddule_array'
])
->from(['c' => 'company'])
->leftJoin(['l' => 'company_locations'], 'c.company_code = l.company_code')
->where(
    [
    'c.company_code_url' => Yii::$app->request->get('code')           
    ])
->one();

$arrWeek = ((is_array(json_decode($companyArr['sheddule_array'],true))) ? json_decode($companyArr['sheddule_array'], true) : []);

$days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');       


$resultWeekDays = $arrWeek[$days[date('w', $date)]];
$closed = $resultWeekDays['closed'];
$start = strtotime($resultWeekDays['start']); //9:00
$end = strtotime($resultWeekDays['end']); //18:00
$lunchFrom = $resultWeekDays['break_start']; //13:00
$lunchTo = $resultWeekDays['break_end']; //14:00
$serviceTimeMin = '60';

$serviceDropdownArr = $query->select([ 
    'service_code', 
    'title', 
    ])
->from('services')    
->where(['company' => Yii::$app->user->identity->company_code])
->all();

$arrServicesDropdown = array();

foreach($serviceDropdownArr as $value){
    $arrServicesDropdown[$value['service_code']] = $value['title'];
}

$arrServices = [];
$arrHourDropdown = array();

while ($start < $end) {
  
    $hour = $start;         

    $sum = (60*$serviceTimeMin);

    if ($hour < strtotime($lunchFrom) || $hour > strtotime($lunchTo)){      
    
        $arrServices[date('H:i',$hour)] = [
            'location_code' => '',
            'team_username' => '',
            'category' => 'cat_2',
            'canceled' => '1',
            'confirm' => 0,
            'full_name' => 'Cláudio Carrelo',
            'contact_number' => '967235820',
            'email' => 'claudio@gmail.com',
            'nif' => '224076736',
            'date' => date('Y-m-d'), 
        ];

    }
 

    $start += $sum;

}

$arrSheddule = $query->select([
                'id',
                'team_username',  
                'location_code',  
                'service_cat',  
                'confirm',     
                'canceled',      
                'full_name',
                'email',
                'contact_number',
                'nif',
                'time',
                'date'
            ])
            ->from(['sheddule'])
            ->where(
                [
                    'company_code' => Yii::$app->user->identity->company_code,
                    //'team_username' => $usernameValue, 
                    'date' => date('Y-m-d', $date),           
                    'canceled' => 0, 
                ])         
            ->all();



    $arrServices2 = [];

    foreach($arrSheddule as $value){
        $value['time'] = date('H:i', strtotime($value['time']));
        $arrServices2[date('H:i', strtotime($value['time']))] = $value;
    }

    $arrServices = array_merge($arrServices, $arrServices2);

    foreach($arrServices as $key => $value){
        if($value['confirm'] == 0){
            $arrHourDropdown[strtotime($key)] = $key;   
        }          
    }

    //Dropdown Hour
    //$arrHourDropdown[$start] = date('H:i',$start);
    //order by key
    ksort($arrServices);

    $teamArr = $query->select('*')
                ->from(['team'])
                ->where(
                    [
                    'company_code' => Yii::$app->request->get('company'),
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
            //->where(['sc.company' => Yii::$app->request->get('company')])
            ->orderBy(['sc.order'=>SORT_ASC])
            ->all();
    ?>




<?php


       


    $userShedduleArr = [];

    foreach($arrServices as $hour => $schedule) {

        $schedule['hour'] = $hour;

        if($hour <= 12){  
            $userShedduleArr['morning'][] = $schedule;
        }

        if($hour > 12 && $hour <= 18 ){    
            $userShedduleArr['afternoon'][] = $schedule;
        }

        if($hour > 18 && $hour <= 24){  
            $userShedduleArr['night'][] = $schedule;
        }   
    }      


    use common\models\Services; 

    $query = new Query;
    $servicesCatArr = $query->select([
        'category_code', 
        'title'   
    ])
    ->from('services_category')    
    ->where(['company_code' => Yii::$app->user->identity->company_code])
    ->orderBy(['order' => SORT_DESC])
    ->all();

    $arrServiceCat = array();

    foreach($servicesCatArr as $value){
        $arrServiceCat[$value['category_code']] = $value['title'];
    }                 

?>

<?php $tableOnlyOnFirst = ''; ?>

<?php 
    $i = 1; 
    $str = '';

    //Yii::$app->request->get('day') > 0 && 
    $displayByDay = (($usernameValue !== Yii::$app->request->get('username')) ? 'display:none' : '');
    $displayByDay = ((empty(Yii::$app->request->get('username'))) ? '' : $displayByDay);
 ?>

<div class="container pb-5" id="sheddule-choice-<?= $usernameValue ?>" style="<?= $displayByDay ?>"> 
    <div class="row pb-3">
        <div class="col-12 text-center d-md-none d-lg-none" style="font-size: 23px;">
            <?= Html::a(
                'Today',                                             
                Url::toRoute(['/'.$page, 'code' => $code]),
                [     
                    'class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 hidden-sm w-100'                                             
                ]
            ) ?>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-lg-2 text-left py-2" style="font-size: 23px;">         
            <?= Html::a(
                '<i class="fas fa-arrow-left"></i>',                                             
                Url::toRoute(['/'.$page,'code' => $code,'username' => $usernameValue,'location' => $companyArr['location_code'], 'day' => strtotime(date('d-m-Y',date(strtotime("-1 day", $date)))) ]),
                [     
                    'class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 w-100'                                             
                ]
            ) ?>
        </div>
        <div class="col-lg-4 text-center py-2">   
                <?php 
                
                    ActiveForm::begin();

                    echo DatePicker::widget([
                        'model' => $modelShedduleSearch,                                                                                
                        'name' => 'date',    
                        'id' => 'date-calendar-search', 
                        'removeButton' => false,
                        'value' => date('d-m-Y', $date),
                        'options' => [
                            'placeholder' => 'Select date...',
                            'class' => ' form-control text-4 h-auto py-1'
                        ],
                        'pluginOptions' => [  
                            'autoclose' => true,           
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]                   
                    ]);               
                ?> 
        </div>
        <div class="col-lg-2 text-center py-2" style="font-size: 23px;">  
            <?= 
                Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i>', 
                    ['class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 w-100']
                ) 
            ?>   
        </div>
      
        <?php
            ActiveForm::end();  
        ?>  

        <div class="col-lg-2 text-center d-none d-lg-block py-2" style="font-size: 23px;">
            <?= Html::a(
                'Today',                                             
                Url::toRoute(['/'.$page, 'code' => $code, 'username' => $usernameValue, 'location' => $companyArr['location_code'],'day' => strtotime(date('d-m-Y'))]),
                [     
                    'class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 hidden-sm w-100'                                             
                ]
            ) ?>
        </div>
        <div class="col-lg-2 text-right py-2" style="font-size: 23px;">
            <?= Html::a(
                '<i class="fas fa-arrow-right"></i>',                                             
                Url::toRoute(['/'.$page,'code' => $code, 'username' => $usernameValue,'location' => $companyArr['location_code'], 'day' => strtotime(date('d-m-Y',date(strtotime("+1 day", $date)))) ]),
                [     
                    'class' => 'btn btn-modern btn-primary btn-outline btn-arrow-effect-1 w-100'                                             
                ]
            ) ?>      
        </div>
    </div>
    <div class="row">
        <?php

            if($closed == 'true'){
        ?>
                <h4 class="text-10 text-center py-4"><?= Yii::t('app', 'Closed') ?></h4> 
        <?php
            }else{                  

                foreach($userShedduleArr as $keyDay => $arrServices): 
             
        ?> 
            <div class="col text-center" >
                <h4><?= Yii::t('app', $keyDay) ?></h4> 
                        
        <?php 
             
                foreach($arrServices as $key => $values){     
      
        ?>
        <div>
        <?php   

            if($values['confirm'] == 0){                     

                if($values['team_username'] ==  $usernameValue){
                    echo Html::button(
                    
                        $values['hour'],                                                                
                        [         
                            'class' => 'btn w-100 btn-modern btn-lg '.(($values['canceled'] == '0') ? 'btn-success-disabled ' : 'btn-success').' rounded-0 mb-2 mt-2' ,
                            'data-bs-toggle' => 'modal',    
                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
                        ]
                    );
                }else{
                    echo Html::button(
                    
                        $values['hour'],                                                                
                        [         
                            'class' => 'btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2' ,
                            'data-bs-toggle' => 'modal',    
                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
                        ]
                    );
                }
                
            }else{          
            
                if($values['team_username'] ==  $usernameValue){
                    echo Html::button(
                
                        '<s class="my-5"> '.$values['hour'].' </s>',                                                                
                        [         
                            'class' => 'btn w-100 btn-modern btn-lg btn-primary-disabled rounded-0 mb-2 mt-2' ,                   
                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                   
                        ]
                    );
                }else{
                    echo Html::button(
                    
                        $values['hour'],                                                                
                        [         
                            'class' => 'btn w-100 btn-modern btn-lg btn-success rounded-0 mb-2 mt-2' ,
                            'data-bs-toggle' => 'modal',    
                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                                
                        ]
                    );
                }            
            }
     

            if($values['canceled'] == 0){

            ?>

                <div class="modal fade" id="client-info-<?= $usernameValue.'-'.$i ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="largeModalLabel"><?= $values['hour'] ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body text-left text-3">
                                <p class="pb-2"><strong>Name: </strong><?= $values['full_name'] ?></p>
                                <p class="pb-2"><strong>Numero: </strong><?= $values['contact_number'] ?></p>
                                <p class="pb-2"><strong>Email: </strong><?= $values['email'] ?></p>
                                <p class="pb-2"><strong>NIF: </strong><?= $values['nif'] ?></p>               
                            </div>
                            <div class="modal-footer">   
                                <?php

                                echo Html::button(
                                'Edit',                                                                
                                    [         
                                        'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                                        'data-bs-toggle' => 'modal',    
                                        'data-bs-target' =>  '#client-edit-'.$usernameValue.'-'.$i                              
                                    ]
                                );

                                echo  Html::button(
                                'Cancel',                                                                
                                    [         
                                        'class' => 'btn btn-warning rounded-0 mb-2 mt-2' ,
                                        'data-bs-toggle' => 'modal',    
                                        'data-bs-target' =>  '#client-cancel-'.$usernameValue.'-'.$i                                
                                    ]
                                );

                                if($page == 'sheddule'){

                                    echo Html::button(
                                    'Check',                                                                
                                        [         
                                            'class' => 'btn btn-success rounded-0 mb-2 mt-2' ,
                                            'data-bs-toggle' => 'modal',    
                                            'data-bs-target' =>  '#client-confirm-'.$usernameValue.'-'.$i                               
                                        ]
                                    );
                                    echo Html::button(
                                        'Missed',                                                                
                                            [         
                                                'class' => 'btn btn-danger rounded-0 mb-2 mt-2' ,
                                                'data-bs-toggle' => 'modal',    
                                                'data-bs-target' =>  '#client-confirm-'.$usernameValue.'-'.$i                               
                                            ]
                                    );
                                }

                                ?>
                            </div>
                        </div>
                    </div>    
                </div>
            <?php                           
                    
                    $formEdit = ActiveForm::begin();   

                    $modelSheddule = $modelSheddule->findModel($values['id']);
        
                    $modelSheddule->time = strtotime($modelSheddule->time); //1689930000      
            ?>                             
                         
                              
            <div class="modal fade" id="client-edit-<?= $usernameValue.'-'.$i ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">
                                Edit Marcação
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3"> 
                                        <?= $formEdit->field($modelSheddule, 'team_username')->hiddenInput(['value'=> $usernameValue])->label(false) ?>      
                                    <?= $formEdit->field($modelSheddule, 'canceled')->hiddenInput(['value'=>'0'])->label(false) ?>                            
                                    <?= $formEdit->field($modelSheddule, 'id')->hiddenInput(['value'=> $values['id']]) ?>                                                       
                                <div class="form-group col-lg-4  text-left">                                               
                                    <?= $formEdit->field($modelSheddule, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>                                                 
                                </div>
                                <div class="form-group col-lg-4  text-left">
                                    <?= $formEdit->field($modelSheddule, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                                </div>
                                <div class="form-group col-lg-4  text-left">
                                    <?= $formEdit->field($modelSheddule, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4  text-left">
                                <?= $formEdit->field($modelSheddule, 'nif')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label('Nif (Opcional)') ?> 
                                </div>
                                <div class="form-group col-lg-8  text-left">
                                    <?= $formEdit->field($modelSheddule, 'service_cat')->dropdownList(
                                        $arrServicesDropdown,
                                        ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Service'])->label('Serviço') ?>
                                </div>
                            </div>  
                            
                            <div class="row">
                            <div class="form-group col-lg-4 text-left">
                                <?= $formEdit->field($modelSheddule, 'time')->dropdownList(
                                    $arrHourDropdown,
                                    ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Time']) 
                                ?>
                            </div>
                                <div class="form-group col-lg-8  text-left">
                                    <label class="control-label" for="sheddule-service_cat">Date</label>
                                    <?= DatePicker::widget([
                                            'model' => $modelSheddule,   
                                            'value' => date('d-m-Y', strtotime($values['date'])),                                                              
                                            'name' => 'date',                                                            
                                            'options' => [
                                                'placeholder' => 'Select date...',
                                                'class' => 'form-control text-4 h-auto py-1',
                                                'label' =>'Date'
                                            ],
                                            'pluginOptions' => [  
                                                //'autoclose' => true,           
                                                'format' => 'dd-mm-yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]) 
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?=                             
                                Html::button(
                                    'Back',                                                                
                                        [         
                                            'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                                            'data-bs-toggle' => 'modal',    
                                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                             
                                        ]
                                    ).' 
                                        '.Html::submitButton('Save', 
                                            ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                                    ) 
                            ?>                         
                        </div>
                    </div>
                </div>
            </div>
                                    
                <?php

                    ActiveForm::end();   
            
                    $formCancel = ActiveForm::begin();   

                    $modelShedduleCancel = $modelShedduleCancel->findModel($values['id']);

                ?>
                    <div class="modal fade" id="client-cancel-<?= $usernameValue.'-'.$i ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="largeModalLabel">
                                        Edit Marcação
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body text-4 text-left">
                                    <?= $formCancel->field($modelShedduleCancel, 'canceled')->hiddenInput(['value'=>'1'])->label(false) ?>
                                    <?= $formCancel->field($modelShedduleCancel, 'id')->hiddenInput(['value'=> $values['id']])->label(false) ?>
                                    Are you sure you want to cancel?                                                   
                                </div>
                                <div class="modal-footer">
                                    <?=                             
                                        Html::button(
                                        'Back',                                                                
                                            [         
                                                'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                                                'data-bs-toggle' => 'modal',    
                                                'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                               
                                            ]
                                        ).'   
                                        '.Html::submitButton('Save', 
                                            ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                                        )
                                    ?>                   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                    ActiveForm::end();  
                        
                    $formConfirm = ActiveForm::begin();   

                    $modelShedduleConfirm = $modelShedduleConfirm->findModel($values['id']);

                ?>
                
                <div class="modal fade" id="client-confirm-<?= $usernameValue.'-'.$i ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="largeModalLabel">
                                    Confirme Marcação
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body text-4 text-left">
                                <?= $formConfirm->field($modelShedduleConfirm, 'confirm')->hiddenInput(['value'=>'1'])->label(false) ?>                           
                                <?= $formConfirm->field($modelShedduleConfirm, 'id')->hiddenInput(['value'=> $values['id']])->label(false) ?>   
                                Client Attended?                                                 
                            </div>
                            <div class="modal-footer">
                                <?=                               
                                    Html::button(
                                    'Back',                                                                
                                        [         
                                            'class' => 'btn btn-primary rounded-0 mb-2 mt-2' ,
                                            'data-bs-toggle' => 'modal',    
                                            'data-bs-target' =>  '#client-info-'.$usernameValue.'-'.$i                               
                                        ]
                                    ).' 
                                    '.Html::submitButton('Confirm', 
                                        ['class' => 'btn btn-success rounded-0 mb-2 mt-2']
                                    )
                                ?>                                                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                                    
                    ActiveForm::end();  
                    $i++;
                }else{  


                
                    $formCreate = ActiveForm::begin();     
                ?>
                    
                <div class="modal fade" id="client-info-<?= $usernameValue.'-'.$i ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="largeModalLabel">
                                    Marcação  <?= $values['hour'] ?>
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            </div>                     
                            <div class="modal-body">                                                                
                                <div class="row mb-3">
                                    <?= $formCreate->field($modelShedduleCreate, 'team_username')->hiddenInput(['value'=> $usernameValue])->label(false) ?> 
                                    <?= $formCreate->field($modelShedduleCreate, 'location_code')->hiddenInput(['value'=> $date])->label(false) ?> 
                                    <?= $formCreate->field($modelShedduleCreate, 'date')->hiddenInput(['value'=> $date])->label(false) ?> 
                                    <?= $formCreate->field($modelShedduleCreate, 'time')->hiddenInput(['value'=> $values['hour']])->label(false) ?>
                                    <div class="form-group col-lg-4  text-left">                                               
                                        <?= $formCreate->field($modelShedduleCreate, 'full_name')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>                                                 
                                    </div>
                                    <div class="form-group col-lg-4  text-left">
                                        <?= $formCreate->field($modelShedduleCreate, 'contact_number')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>  
                                    </div>
                                    <div class="form-group col-lg-4  text-left">
                                        <?= $formCreate->field($modelShedduleCreate, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true]) ?>   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4  text-left">
                                        <?= $formCreate->field($modelShedduleCreate, 'nif')->textInput(['class' => 'form-control text-3 h-auto py-2','maxlength' => true])->label('Nif (Opcional)') ?>    
                                    </div>
                                    <div class="form-group col-lg-8  text-left">
                                        <?= $formCreate->field($modelShedduleCreate, 'service_cat')->dropdownList(
                                            $arrServicesDropdown,
                                            ['class' => 'form-select form-control h-auto py-2','prompt'=>'Select Service'])->label('Serviço')
                                        ?>                                                
                                    </div>
                                </div>	                                    					                                          
                            </div>
                            <div class="modal-footer">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success rounded-0 mb-2 mt-2']) ?>                                                         
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    ActiveForm::end();

                    $i++;
            }               
            ?>
            </div>
            <?php
                $keyDay++;
                
                }          
            ?>
            </div>
        <?php
        
             endforeach;
        }

    ?>   
 
    </div>
    <hr class="solid mt-5">
    <div class="row">
        <div class="col-4">
            <ul class="list list-icons list-icons-style-4 list-success">
                <li><i class="fas fa-check"></i>Disponivel</li>
            </ul>
        </div>
        <div class="col-4">
            <ul class="list list-icons list-icons-style-5 list-primary">
                <li><i class="fas fa-check"></i>Indisponivel</li>
            </ul>
        </div>
    </div>
</div>