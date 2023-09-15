<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CompanyLocations $model */

$this->title = 'Create Company Locations';
$this->params['breadcrumbs'][] = ['label' => 'Company Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-locations-create">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4> 
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
