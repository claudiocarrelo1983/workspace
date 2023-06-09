<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Forms */

$this->title = 'Create Forms';
$this->params['breadcrumbs'][] = ['label' => 'Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-create">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18"><?= Html::encode($this->title) ?></h4>             
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
