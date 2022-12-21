<?php

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
use frontend\assets\PublicAsset;
/* @var $this yii\web\View */

$this->title = 'About Us';

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/calculator.js'); 

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'calculators_calories';

$t = 'teste';

?>

<?= $this->render('/layouts/public_header'); ?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-5 m-0">  
    <div class="container pb-2">
        <div class="col-lg-10 text-center offset-lg-1">
            <h2 class="font-weight-bold text-9 mb-0">The Perfect Template for<br>Beginners or Professionals </h2>
            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">YOUR WEBSITE TO <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">A NEW LEVEL</span></p>
            <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">Porto is simply a better choice for your new website design. The template is several years among the most popular in the world, being constantly improved and following the trends of design and best practices of code. Your search for the best solution is over, get your own copy and join tens of thousands of happy customers.</p>
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
                            <a class="nav-link <?= (($activeTabKg == 1) ? 'active' : '') ?>" href="#metric" data-bs-toggle="tab" onclick="cleanBmi();">Metric</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (($activeTabLbs == 1) ? 'active' : '') ?>" href="#imperial" data-bs-toggle="tab" onclick="cleanBmi();">Imperial</a>
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
                                                            'men'=>' Male',
                                                            'women'=>'Female'
                                                        ],
                                                        array( 'separator' => "</br>" )
                                                    )->label('Gender:')?>                                                           
                                            
                                                    <div class="help-block"  id="check-k-sex"></div>
                                                </div>
                                                <div class="form-group col-lg-6">	
                                                    <?= $form->field($model1, 'age', [
                                                        'template' => 'Age:<div class="input-group">{input}
                                                       </div>{error}'
                                                        ]); 
                                                    ?>  									          			
                                               </div>                                          
                                            </div>                                     
                                             <div class="row">
                                                <div class="form-group col-lg-6">								          			
                                                    <?= $form->field($model1, 'weight', [
                                                        'template' => 'Weight:<div class="input-group">{input}
                                                        <span class="input-group-text text-3">Kg</span></div>{error}'
                                                        ]); 
                                                    ?>                                                                                                        
                                                </div>
                                                <div class="form-group col-lg-6">      
                                                    <?= $form->field($model1, 'height', [
                                                        'template' => 'Height:<div class="input-group">{input}
                                                        <span class="input-group-text text-3">cm</span></div>{error}'
                                                        ]); 
                                                    ?>   
                                                </div>                                                        
                                            </div>   
                                            <div class="row">
                                                 <div class=" col-lg-6">                                    
                                                    <?= $form->field($model1, 'activity')->dropDownList(
                                                        [
                                                            ''=>' Select',
                                                            'basal' => Yii::t('app', 'basal'),
                                                            'sedentary'=> Yii::t('app', 'sedentary'),
                                                            'slightly_active'=> Yii::t('app', 'slightly_active'),                                                  
                                                            'active'=> Yii::t('app', 'active'),
                                                            'very_active'=> Yii::t('app', 'very_active'),
                                                            'extra_active'=> Yii::t('app', 'extra_active'),
                                                        ],
                                                     
                                                        ['style' => 'height:52.75px;'],                                                                                                                 
                                                        ['separator' => "</br>"]
                                                    )->label('Gender:')?>  
                                                </div>
                                            </div>                                    
                                            <div class="row">
                                                <div class="form-group col text-right">
                                                    <?= Html::submitInput(Yii::t('app', 'Calculate'), ['class' => 'btn btn-primary btn-lg']) ?>    
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
                                                                'men'=>' Male',
                                                                'women'=>'Female'
                                                            ],
                                                            array( 'separator' => "</br>" )
                                                        )->label('Gender:')?>                                                           
                                                
                                                        <div class="help-block"  id="check-k-sex"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6">	
                                                        <?= $form->field($model1, 'age', [
                                                            'template' => 'Age:<div class="input-group">{input}
                                                        </div>{error}'
                                                            ]); 
                                                        ?> 							          			
                                                    </div>
                                                </div>                                              
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <?= $form2->field($model2, 'weight', [
                                                            'template' => 'Weight:<div class="input-group">{input}
                                                            <span class="input-group-text text-3">Lbs</span></div>{error}'
                                                            ]); 
                                                        ?> 										          			
                                                    </div>
                                                    <div class="form-group col-lg-6"> 
                                                        <?= $form2->field($model2, 'height', [
                                                            'template' => 'Height:<div class="input-group">{input}
                                                            <span class="input-group-text text-3">Foot</span></div>{error}'
                                                            ]); 
                                                        ?>  
                                                    </div>                                                        
                                                </div>
                                                <div class="row">
                                                    <div class=" col-lg-6">                                    
                                                        <?= $form->field($model1, 'activity')->dropDownList(
                                                            [
                                                                ''=>' Select',
                                                                'basal' => Yii::t('app', 'basal'),
                                                                'sedentary'=> Yii::t('app', 'sedentary'),
                                                                'slightly_active'=> Yii::t('app', 'slightly_active'),                                                  
                                                                'active'=> Yii::t('app', 'active'),
                                                                'very_active'=> Yii::t('app', 'very_active'),
                                                                'extra_active'=> Yii::t('app', 'extra_active'),
                                                            ],
                                                        
                                                            ['style' => 'height:52.75px;'],                                                                                                                 
                                                            ['separator' => "</br>"]
                                                        )->label('Gender:')?>  
                                                    </div>
                                                </div> 
                                                <section" id="calculator"></section>
                                                <div class="row">
                                                    <div class="form-group col text-right">
                                                        <?= Html::submitInput(Yii::t('app', 'Calculate'), ['class' => 'btn btn-primary btn-lg']) ?>                          
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
   
       

     
    </div>
    <div class="col-lg-12">
        <div id="bmi_table" class="row">
            <div class="stats">
               
                <div class="row border pt-4 px-3 pb-3">               
                    <div class="col-12">
                        <p>
                            <h4>
                                aaa
                            </h4>
                            <div class="text-5 mb-5">               
                                bbb
                            </div>
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-4">
                                        Your stats
                                    </th>
                                    <th class="text-4">
                                        Activity
                                    </th>
                                    <th class="text-4">
                                        Calories
                                    </th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr> 
                                    <td rowspan="3" class="p-4">                             
                                        <p>
                                            <span  class="font-weight-bold  text-3">
                                                <span class="text-primary text-9">2645</span> 
                                                <span class="text-4">cal</span>
                                            </span> 
                                        </p>
                                        <p class="text-4">Total Daily Energy Expenditure (TDEE)</p>                               
                                    </td>
                                    <td>No activity</td>
                                    <td>2,263 cal</td>
                                </tr>
                                <tr> 
                                    <td><strong>A little activity</strong></td>
                                    <td><strong>2,558 cal</strong></td>
                                </tr>
                                <tr>
                                    <td>Some activity</td>
                                    <td>2,952 cal</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="py-3 px-4">
                                        <p>
                                            <span  class="font-weight-bold  text-3">
                                                <span class="text-primary text-9">2645</span> 
                                                <span class="text-4">cal</span>
                                            </span> 
                                        </p>
                                        <p class="text-4">Basal Metabolic Rate (BMR)</p>
                                    </td>
                                    <td>A lot of activity</td>
                                    <td>3,346 cal</td>
                                </tr>
                                <tr>
                                    <td>A TON of activity</td>
                                    <td>3,739 cal</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sub Footer -->
<?= $this->render('/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->


<?= $this->render('/site/footer'); ?>		
