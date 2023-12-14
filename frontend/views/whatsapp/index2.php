<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\Event;
use yii\widgets\ActiveForm;
use yii\db\Query;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;
use marqu3s\summernote\Summernote;


?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_campaign_sms')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_campaign') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                    <?= Yii::t('app', 'menu_admin_campaign_sms') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>  


<?php $form = ActiveForm::begin(); ?>  

    <?php
   
        echo $form->field($model, 'text_')
            ->widget(Summernote::class, [                             
                //'value'=> $model->  $text_lang,                            
                'clientOptions' => [                               
                    'toolbar' => [      
                        ['undo', ['undo']],
                        ['redo', ['redo']],
                        ['fontname', ['fontname']],    
                        ['font', ['bold', 'italic', 'underline']], 
                        ['fontsize', ['fontsize']],                               
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],                                        
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ['fullscreen', 'codeview']],                                          
                    ]
                ],
            ]);
    ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>