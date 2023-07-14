<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Create Services';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">
    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4> 
    <p>
        You need to create Services Category first
    </p>  
    <?= $this->render('_form', [
        'model' => $model,
        'modelCat' => $modelCat,
        'countCat' => $countCat
    ]) ?>

</div>
