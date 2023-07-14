<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */

$this->title = 'Create Services Category';
$this->params['breadcrumbs'][] = ['label' => 'Services Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
