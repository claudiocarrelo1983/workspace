<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Contact Us';

$this->params['breadcrumbs'][] = $this->title;

$arrSubject = array(
    '' => Yii::t('app', "contacts_label_choose_subject")
);

foreach($subject as $value){
    $arrSubject[Yii::t('app', $value['page_code'])] = Yii::t('app', $value['page_code']);  
}


$path2 = 'contacts';
?>


<!-- Banner -->

<?= $this->render('../banner',['path1' => 'Menu','path2' => $path2]); ?>

<!--End  Banner -->

<div class="container py-4">
    <div class="row mb-2">
        <div class="col">        
            <div class="row text-center pb-5">
                <div class="col-md-9 mx-md-auto">
                    <div class="overflow-hidden mb-3">
                        <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                            <span><?= Yii::t('app', "contacts_block_title_1") ?></span>
                            <span class="word-rotator-words bg-primary">
                                <b class="is-visible"><?= Yii::t('app', "contacts_block_title_1_1") ?></b>
                                <b><?= Yii::t('app', "contacts_block_title_1_2") ?></b>
                                <b><?= Yii::t('app', "contacts_block_title_1_3") ?></b>
                            </span>
                            <span><?= Yii::t('app', "contacts_block_title_2") ?></span>
                        </h1>   
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                            <?= Yii::t('app', "contacts_block_text_1") ?>
                        </p>
                    </div>
                </div>
            </div>

            <h2 class="font-weight-bold text-7 mt-2 mb-0"><?= Yii::t('app', "contacts_block_2_contact_us") ?></h2>
            <p class="mb-4">
                <?= Yii::t('app', "contacts_block_2_text") ?>
            </p>


            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'class' => 'contact-form-recaptcha-v3']) ?>
    
                <div class="row">
                    <div class="form-group col-lg-6">										          			
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "contacts_label_full_name").':') ?>                                                                                                            
                    </div>

                    <div class="form-group col-lg-6">										          			
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control text-3 h-auto py-2'])->label(Yii::t('app', "contacts_label_email").':') ?>                                                                                                            
                    </div>
                </div>
                <div class="row">             
                    <div class=" col-lg-6">   
                    <?= $form->field($model, 'subject')->dropDownList(
                        $arrSubject,                  
                        ['style' => 'height:52.75px;'],                                                                                                                 
                        ['separator' => "</br>"]
                    )->label(Yii::t('app', "contacts_label_subject").':')
                    ?>  
                    </div>    
                </div>    

                <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(Yii::t('app', "contacts_label_message").':')?>

                <div class="form-group">
                <?= Html::submitButton(Yii::t('app', "contacts_label_send_message"), ['class' => 'btn btn-primary btn-modern']) ?>
            </div>

            <?php ActiveForm::end(); ?>               
        </div>
    </div>
    <section class="call-to-action featured featured-primary mb-5">
        <div class="col-sm-9 col-lg-9">
            <div class="call-to-action-content">
                <h3>
                    <?=  Yii::t('app', "contacts_faqs_text") ?>
                </h3>   
            </div>
        </div>
        <div class="col-sm-3 col-lg-3">
            <div class="call-to-action-btn">
                <a href="<?= Url::toRoute('site/faqs') ?>" target="_blank" class="btn btn-modern text-2 btn-primary">
                    <?=  Yii::t('app', "contacts_faqs_button") ?>
                </a>
            </div>
        </div>
    </section>
</div>

</div>	

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
			





