<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NutricionFood */

$this->title = 'Create Nutricion Food';
$this->params['breadcrumbs'][] = ['label' => 'Nutricion Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutricion-food-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
