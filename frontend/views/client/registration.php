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
                <?= 
                Yii::t('app',
                '<div class="header-row">
                    <div class="header-logo">							
                            <span class="text-color-light font-weight-normal text-8 mb-2 mt-2">'.$user['company'].'</span>				
                    </div>
                </div>') ?>
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

<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-5 m-0">  
    <div class="container pb-2">
        <div class="col-lg-10 text-center offset-lg-1">
            <h2 class="font-weight-bold text-9 mb-0"><?= Yii::t('app', "client_registration_title") ?></h2>         
        </div>      
    </div>
</section>


<div role="main" class="main">      
    <div class="container">
        <div class="card-body">
            <div class="row mb-5">
                <div class="form-group col-lg-3">
                    <img src="<?= $user['path'].$user['image'] ?>" class="img-fluid"/>
                        <ul class="social-icons social-icons-big social-icons-dark-2">  
                            <?= (empty($user['facebook']) ? '' : '<li><a href="'.$user['facebook'].'" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>') ?>                          
                            <?= (empty($user['twitter']) ? '' : '<li class="social-icons-twitter"><a href="'.$user['twitter'].'" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>') ?>  
                            <?= (empty($user['instagram']) ? '' : '<li class="social-icons-instagram"><a href="'.$user['instagram'].'" target="_blank" title="Instagram"><i class="icon-social-instagram icons fa-lg"></i></a></li>') ?>  
                            <?= (empty($user['linkedin']) ? '' : '<li class="social-icons-linkedin"><a href="'.$user['linkedin'].'" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in fa-lg"></i></a></li>') ?>  
                            <?= (empty($user['pinterest']) ? '' : '<li class="social-icons-pinterest"><a href="'.$user['pinterest'].'" target="_blank" title="Pinterest"><i class="fab fa-tiktok fa-lg"></i></a></li>') ?> 
                            <?= (empty($user['youtube']) ? '' : '<li class="social-icons-youtube"><a href="'.$user['youtube'].'" target="_blank" title="Youtube"><i class="fab fa-youtube fa-lg"></i></a></li>') ?>
                        </ul>
                        <p class="py-5-0">
                            <?= $user['description'] ?>
                        </p>            
                  
                </div>
                <div class="form-group col-lg-9">
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
                                <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'class' => 'form-control text-3 h-auto py-2'])->label('First Name') ?>                             
                     
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

