<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PricingSpecs */

$this->title = 'Create Pricing Specs';
$this->params['breadcrumbs'][] = ['label' => 'Pricing Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pricing-specs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'code' => $code,
    ]) ?>

</div>
