<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Clients;
use dosamigos\tinymce\TinyMce;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Clients';
$this->params['breadcrumbs'][] = $this->title;

?>


<header id="header" class="header-dark header-effect-shrink " data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': false, 'stickyEnableOnMobile': false, 'stickyStartAt': 70, 'stickyChangeLogo': false, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark box-shadow-none overflow-visible">
        <div class="header-top">
            <div class="container">
                <div class="header-row py-2">	                   
                    <div class="header-column justify-content-end">
                        <div class="header-row">                            
                            <nav class="header-nav-top">	  
                                |
                            <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                            <span class="px-2 language" data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                            <?php endforeach; ?>                                        
                        </div>
                    </div>
                </div>                   
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <?= Html::a(
                    Yii::t('app',
                    '<div class="header-row">
                        <div class="header-logo">							
                                <span class="text-color-light font-weight-normal text-8 mb-2 mt-2">'.$company['name'].'</span>				
                        </div>
                    </div>'),
                    Url::home(),     
                    [
                    'class' => 'logo-url',
                    'data-hash' => '',         
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 130,  
                    ]      
                ) ?>
                <div class="header-column justify-content-end">                       
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-no-transform header-nav-bottom-line-active-text-light header-nav-bottom-line-effect-1 header-nav-light-text order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-text-size-3 header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">                                    
                                        <li class="dropdown">                                    
                                            <?= Html::a(
                                                Yii::t('app', 'Website'), 
                                                Url::toRoute('site/index'),     
                                                [
                                                'class' => 'dropdown-item dropdown-toggle',
                                                'data-hash' => '',         
                                                'data-hash-offset' => 0,  
                                                'data-hash-offset-lg' => 130,  
                                                ]      
                                            ) ?>
                                        </li>
                                    </ul>
                                </nav>
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
<div class="spacer"></div>   


<div role="main" class="main">      
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-3">
                    <img src="<?= Url::base('http').'/'.$company['logo'] ?>" class="img-fluid"/>
                </div>
                <div class="form-group col-lg-9">
                    <div class="post-content">
                        <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
                        <h1 class=""><?= $company['name'] ?></h1>    
                        </h2>
                        <p class="py-5-0">
                            <?= $company['description'] ?>
                        </p>            
                        <ul class="social-icons social-icons-big social-icons-dark-2">  
                            <?= (empty($company['facebook']) ? '' : '<li><a href="'.$company['facebook'].'" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>') ?>                          
                            <?= (empty($company['twitter']) ? '' : '<li class="social-icons-twitter"><a href="'.$company['twitter'].'" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>') ?>  
                            <?= (empty($company['instagram']) ? '' : '<li class="social-icons-instagram"><a href="'.$company['instagram'].'" target="_blank" title="Instagram"><i class="icon-social-instagram icons fa-lg"></i></a></li>') ?>  
                            <?= (empty($company['linkedin']) ? '' : '<li class="social-icons-linkedin"><a href="'.$company['linkedin'].'" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in fa-lg"></i></a></li>') ?>  
                            <?= (empty($company['pinterest']) ? '' : '<li class="social-icons-pinterest"><a href="'.$company['pinterest'].'" target="_blank" title="Pinterest"><i class="fab fa-tiktok fa-lg"></i></a></li>') ?> 
                            <?= (empty($company['youtube']) ? '' : '<li class="social-icons-youtube"><a href="'.$company['youtube'].'" target="_blank" title="Youtube"><i class="fab fa-youtube fa-lg"></i></a></li>') ?>
                        </ul>
                            
                    </div>
                </div>
                <div class="col">
                    <?php $form = ActiveForm::begin(); ?>    
                        <div class="row">
                            <div class="form-group col-lg-6">                              
                                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label('First Name') ?>                             
                            </div>
                            <div class="form-group col-lg-6">
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label('Last Name') ?>
                            </div>                     
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label('Email') ?>
                            </div>
                            <div class="form-group col-lg-6">   
                                <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::className(), [
                                    // if you are using bootstrap, the following line will set the correct style of the input field
                                    'options' => ['class' => 'form-control'],
                                    'dateFormat' => 'yyyy-MM-dd',
                                    // ... you can configure more DatePicker properties here
                                ])->label('Date of Birth') ?>          
                                                            
                            </div>                     
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label('Contact Number') ?>
                             </div>   
                            <div class="form-group col-lg-6">
                                <?= $form->field($model, 'gender')->radioList(
                                    [
                                        'm'=>'Male',
                                        'f'=>'Female',                                      
                                    ],
                                    array( 'separator' => "</br>" ) 
                                    )->label('Sex') ?>
                            </div>                       
                        </div>              

                        <div class="row">
                            <div class="form-group col">
                                <?= $form->field($model, 'text')->widget(TinyMce::className(), [
                                    'options' => ['rows' => 6],
                                    'language' => 'es',
                                    'clientOptions' => [
                                        'plugins' => [
                                            "advlist autolink lists link charmap print preview anchor",
                                            "searchreplace visualblocks code fullscreen",
                                            "insertdatetime media table contextmenu paste"
                                        ],
                                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                                    ]
                                ]);?>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox" data-msg-required="You must agree before submiting." required>
                                    <label class="form-check-label" for="tabContent9Checkbox">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <?= Html::submitButton('Submit Form', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>         
            </div>      
        </div>
    </div>
</div>

