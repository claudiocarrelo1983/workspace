<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Create Services';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= Helpers::displayAminBreadcrumbs('services','services','services-list','create') ?>


<div class="row">   
    <?= $this->render('_form', [
        'model' => $model,    
        'modelCat' => $modelCat,
        'countCat' => $countCat
    ]) ?>

</div>
