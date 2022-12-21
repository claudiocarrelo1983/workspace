<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\db\Query;

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code',
    'full_title' 
    ])
->from('countries')    
->all();

$arrLanguages = ['en', 'pt', 'es', 'it', 'de', 'fr'];

/* @var $this yii\web\View */
/* @var $model app\models\Texts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="texts-form">

<?php $form = ActiveForm::begin(); ?>   
    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Faq's
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
                    Translations
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts"> 

            <?= $form->field($model, 'code')->radioList(
                [
                    'privacy'=>'Privacy Policy',
                    'gdpr'=>'GDPR',
                    'coockies'=>'Coockies',
                    'terms'=>'Terms & Conditions',
                ],
                array( 'separator' => "</br>" ) 
            ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => Yii::$app->language,
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
        <div class="tab-pane" id="recentPosts">      
                <?php 

                    foreach($arrLanguages as $valLang){

                        $display = 0;

                        foreach ($countries as $value){
                            if($value['country_code'] == $valLang){
                                $display = 1;
                                break;
                            }
                        }
                    
                        if($display == 1){
            
                ?>  

                <?= $form->field($model, 'title_'.$value['country_code'])->textInput(['maxlength' => true])->label('Title '.$value['full_title']) ?>

                    <?= $form->field($model, 'text_'.$value['country_code'])->widget(TinyMce::className(), [
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
                    ])->label('Text '.$value['full_title']) ;?>
                    
                <?php 
                    }else{
                ?>
                    <?=  $form->field($model, 'title_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                    <?=  $form->field($model, 'text_'.$valLang)->hiddenInput(['value'=> 'n/a'])->label(false); ?>
                <?php 
                        
                    }
                }               
                ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
