<?php

/* @var $this yii\web\View */
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrCountries = $model->getLastFileUploaded('countries');

?>

<div class="dropdown d-inline-block">
    <div class="btn header-item waves-effect py-4">
        <div class="header-column justify-content-start">	
            <div class="header-row">                
                <nav class="header-nav-top">	|
                <?php foreach (Yii::$app->params['languages'] as $key => $language): ?>
                <span class="px-2 language" data-csrf= <?= (Yii::$app->request->getCsrfToken()) ?>   id=<?= $key ?>><?= Yii::t('app', $language ) ?></span> |								
                <?php endforeach; ?>                  
            </div>
        </div>  
    </div>
</div>  