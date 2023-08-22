<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */

$this->title = 'Create Sheddule';
$this->params['breadcrumbs'][] = ['label' => 'Sheddules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sheddule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
