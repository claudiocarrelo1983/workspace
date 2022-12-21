<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Translations */
/* @var $form yii\widgets\ActiveForm */

$tagQueryUser = new Query;

$countries = $tagQueryUser->select([
    'country_code', 
    'full_title'
    ])
->from('countries')    
->all();

$arrCountries = array();

foreach($countries as $country){
    $arrCountries[$country['country_code']] = $country['full_title'];
}

?>

<div class="translations-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'country_code')->radioList(
        $arrCountries,
         array( 'separator' => "</br>" ))->label('Select Country');
    ?>

    <a href="<?= Url::toRoute('countries/index') ?>" target="_blank"  class="pb-5">
        <?= Yii::t('app', 'Create New Country') ?>	
    </a>

    <?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_code')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'active')->dropdownList(
        [1 => 'Yes', 0 => 'No']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
