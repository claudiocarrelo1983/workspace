<?php

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
use frontend\assets\PublicAsset;
/* @var $this yii\web\View */

$this->title = 'About Us';

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/calculator.js'); 

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'calculators_bmi';

?>

<?= $this->render('/layouts/public_header'); ?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-5 m-0">  
    <div class="container pb-2">
        <div class="col-lg-10 text-center offset-lg-1">
            <h2 class="font-weight-bold text-9 mb-0">
                <?= Yii::t('app', 'calculator_bmi_title') ?>
            </h2>
            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">
                <?= Yii::t('app', 'calculator_bmi_subtitle') ?>
            </p>
            <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">
                <?= Yii::t('app', 'calculator_bmi_text') ?>
            </p>
        </div>      
    </div>
</section>
<div class="container pb-2">
    <div role="main" class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?= (($activeTabKg == 1) ? 'active' : '') ?>" href="#metric" data-bs-toggle="tab" onclick="cleanBmi();">
                                <?= Yii::t('app', 'calculator_metric') ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (($activeTabLbs == 1) ? 'active' : '') ?>" href="#imperial" data-bs-toggle="tab" onclick="cleanBmi();">
                                <?= Yii::t('app', 'calculator_imperial') ?>
                            </a>
                        </li>
                    </ul>
                    <section" id="calculator"></section>
                    <div class="tab-content ">
                        <div id="metric" class="tab-pane <?= (($activeTabKg == 1) ? 'active' : '') ?>">                          
                             <div class="tab-pane tab-pane-navigation active" id="formsStyleDefault">                              
                             <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                        <?php $form = ActiveForm::begin([
                                                    'id' => 'form-calculator-kg', 
                                                    'enableClientValidation' => true, 
                                                    'enableAjaxValidation' => false,
                                                    'action' => ['/calculator/bmi','#' => 'calculator'],
                                                    
                                                    'options' => ['enctype' => 'multipart/form-data']]);
                                                ?>                                                  
                                            <?=  $form->field($model1, 'measure')->hiddenInput(['value'=> 'k'])->label(false); ?>
                                            <div class="row">
                                                <div class="form-group col-lg-6">                                        
                                                    <?= $form->field($model1, 'sex')->radioList(
                                                        [
                                                            'men'=>  Yii::t('app', 'gender_male'),
                                                            'women'=> Yii::t('app', 'gender_female')                                                            
                                                        ],
                                                        array( 'separator' => "</br>" )
                                                    )->label(Yii::t('app', 'calculator_gender'))?>                                                           
                                            
                                                    <div class="help-block"  id="check-k-sex"></div>
                                                </div>
                                                <div class="form-group col-lg-6">										          			
                                                    <?= $form->field($model1, 'age')->textInput(['autofocus' => true, 'class' => 'input-group mb-2 form-control weight-after-kg'])->label(Yii::t('app', 'calculator_age')) ?>                                                                                                            
                                                </div>                                          
                                            </div>
                                            
                                             <div class="row">
                                                <div class="form-group col-lg-6">								          			
                                                    <?= $form->field($model1, 'weight', [
                                                        'template' => Yii::t('app', 'calculator_weight').'<div class="input-group">{input}
                                                        <span class="input-group-text text-3">Kg</span></div>{error}'
                                                        ]); 
                                                    ?>                                                                                                        
                                                </div>
                                                <div class="form-group col-lg-6">      
                                                    <?= $form->field($model1, 'height', [
                                                        'template' => Yii::t('app', 'calculator_height').'<div class="input-group">{input}
                                                        <span class="input-group-text text-3">cm</span></div>{error}'
                                                        ]); 
                                                    ?>   
                                                </div>                                                        
                                            </div>                                       
                                            <div class="row">
                                                <div class="form-group col text-right">
                                                    <?= Html::submitInput(Yii::t('app', 'calculator_calculate'), ['class' => 'btn btn-primary btn-lg']) ?>    
                                                </div>                                             
                                            </div>
                                            <?php ActiveForm::end(); ?>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="imperial" class="tab-pane  <?= (($activeTabLbs == 1) ? 'active' : '') ?>">
                             <div class="tab-pane tab-pane-navigation active" >                              
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                            <?php $form2 = ActiveForm::begin([
                                                    'id' => 'form-calculator-lbs', 
                                                    'enableClientValidation' => true, 
                                                    'enableAjaxValidation' => false,
                                                    'action' => ['/calculator/bmi', '#' => 'calculator'],                                             
                                                    'options' => ['enctype' => 'multipart/form-data']]);
                                                ?>                                                   
                                                <?=  $form2->field($model2, 'measure')->hiddenInput(['value'=> 'l'])->label(false); ?>
                                                <div class="row">
                                                    <div class="form-group col-lg-6">                                        
                                                        <?= $form2->field($model2, 'sex')->radioList(
                                                            [
                                                                'men'=>  Yii::t('app', 'gender_male'),
                                                                'women'=> Yii::t('app', 'gender_female')     
                                                            ],
                                                            array( 'separator' => "</br>" )
                                                        )->label(Yii::t('app', 'calculator_gender'))?>                                                           
                                                
                                                        <div class="help-block"  id="check-k-sex"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6">										          			
                                                        <?= $form2->field($model2, 'age')->textInput(['autofocus' => true, 'class' => 'input-group mb-2 form-control weight-after-kg'])->label(Yii::t('app', 'calculator_age')) ?>                                                                                                            
                                                    </div>
                                                </div>                                              
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <?= $form2->field($model2, 'weight', [
                                                            'template' => Yii::t('app', 'calculator_weight').'<div class="input-group">{input}
                                                            <span class="input-group-text text-3">Lbs</span></div>{error}'
                                                            ]); 
                                                        ?> 										          			
                                                    </div>
                                                    <div class="form-group col-lg-6"> 
                                                        <?= $form2->field($model2,'height', [
                                                            'template' => Yii::t('app', 'calculator_height').'<div class="input-group">{input}
                                                            <span class="input-group-text text-3">Foot</span></div>{error}'
                                                            ]); 
                                                        ?>  
                                                    </div>                                                        
                                                </div>
                                                <section" id="calculator"></section>
                                                <div class="row">
                                                    <div class="form-group col text-right">
                                                        <?= Html::submitInput(Yii::t('app', 'calculator_calculate'), ['class' => 'btn btn-primary btn-lg']) ?>                          
                                                    </div>                                                  
                                                </div>
                                                <?php ActiveForm::end(); ?>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>       
                
        </div>     
   
       

        <div id="bmi_answer"  style="<?= (($displayText == 1) ? '' : 'display:none;') ?>">
            <h2 class="text-color-dark font-weight-normal text-4 mb-2">                    
                <strong class="font-weight-extra-bold text-5">
                    <?= Yii::t('app', "calculator_bmi_result") ?>: <span class=" text-light text-4 px-2 mx-1" style="background:<?= $color ?>"><?= $imc?></span>
                </strong>                 
            </h2>            
            <div class="text-5 mb-5">               
                <span id="bmi_answer" ><?= $answer ?></span>                        
            </div>
        </div>
    </div>
    <div id="bmi_table" class="row" style="<?= (($displayTable == 1) ? '' : 'display:none;') ?>">
        <h4>
            <?= $titleTable ?>
        </h4>
        <div class="text-5 mb-5">               
            <?= $subtitleTable ?>                    
        </div>

        <div class="col p-3">
            <h4>                    
                <?= Yii::t('app', 'calculator_bmi_table_ate_2') ?>        
            </h4>  
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>                      
                        <th>
                            <?= Yii::t('app', "calculator_age") ?>
                        </th>
                        <th>                          
                            <?= Yii::t('app', 'calculator_ideal_weight') ?>  
                        </th> 
                         <th>
                            <?= Yii::t('app', "calculator_age") ?>
                        </th>
                        <th>
                            <?= Yii::t('app', 'calculator_ideal_weight') ?>  
                        </th>  
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($type == 'lbs'){
                  
                        foreach ($bmiArr as $col): 
                    ?>
                        <tr>    
                            <td><?= $col['idade'] ?></td>     
                            <td><?= bcmul($col['from'],2.205,2) ?> to <?= bcmul($col['to'],2.205,2) ?> lbs</td>    
                            <td><?= $col['idade1'] ?></td>
                            <td><?= bcmul($col['from1'],2.205,2) ?> to <?= bcmul($col['to1'],2.205,2) ?> lbs</td>           
                        </tr>
                    <?php 
                        endforeach;
                    }else{
                        
                        foreach ($bmiArr as $col): 
                    ?>
                        <tr>    
                            <td><?= $col['idade'] ?></td>     
                            <td><?= $col['from'] ?> to <?= $col['to'] ?> kg</td>    
                            <td><?= $col['idade1'] ?></td>
                            <td><?= $col['from1'] ?> to <?= $col['to1'] ?> kg</td>           
                        </tr>
                    <?php 
                        endforeach;
                    }
         

                    ?>       
                </tbody>
            </table>
        </div>        

        <div class="col p-3">
            <h4>                    
                <?= Yii::t('app', 'calculator_bmi_table_ate_2_5') ?>   
            </h4>  
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>                      
                        <th>
                            <?= Yii::t('app', "calculator_height") ?>
                        </th>
                        <th>
                            <?= Yii::t('app', 'calculator_ideal_weight') ?>  
                        </th>                    
                    </tr>
                </thead>
                <tbody>                    
                    <?php  
                      if($type == 'lbs'){
                        foreach ($bmiArrHeight as $col):                      
                         ?>
                        <tr>    
                            <td><?= bcdiv($col['altura'],30.48,2) ?> Foot</td>     
                            <td><?= bcmul($col['from'],2.205,2) ?> to <?= bcmul($col['to'],2.205,2) ?> lbs</td>   
                        </tr>
                        <?php 
                        endforeach; 
                    }else{     
                        foreach ($bmiArrHeight as $col):            
                        ?>
                        <tr>    
                            <td><?= $col['altura'] ?>cm</td>     
                            <td><?= $col['from'] ?> to <?= $col['to'] ?> kg</td>   
                        </tr>
                        <?php 
                        endforeach; 
                    }
                    ?>       
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="row text-3 py-2 ">                    
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #5c9baa;">                        
                    <div><?= Yii::t('app', "calculator_bmi_underweight") ?></div>
                    <div> <= 18.5 </div>                            
                </div>
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #91c058; ">     
                    <div><?= Yii::t('app', "calculator_bmi_normal") ?></div>
                    <div>18.5 < 24.9 </div>
                </div>
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #e4b345;">     
                    <div><?= Yii::t('app', "calculator_bmi_overweight") ?></div>
                    <div>25 <= 29.9</div>
                </div>
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #d18b4b;;"> 
                    <div><?= Yii::t('app', "calculator_obesity_1") ?></div>
                    <div>30 =< 34.9</div>                           
                </div>
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #c44b42; ">     
                    <div><?= Yii::t('app', "calculator_obesity_2") ?></div> 
                    <div>35 =< 39.9</div>
                </div>   
                
                <div class="col-lg-2 col-sm-6 text-light align-items-center h-100 text-center py-4" style="background: #b33e36; ">     
                    <div><?= Yii::t('app', "calculator_obesity_3") ?></div>  
                    <div>=> 40</div>
                </div>   
            </div>
        </div>    
    </div>
</div>

<!-- Sub Footer -->
<?= $this->render('/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->


<?= $this->render('/site/footer'); ?>		
