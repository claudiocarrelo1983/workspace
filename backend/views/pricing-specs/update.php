<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PricingSpecs */

$this->title = 'Update Pricing Specs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pricing Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pricing-specs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'code' => $code
    ]) ?>

</div>
