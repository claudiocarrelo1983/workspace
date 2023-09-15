<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Clients $model */

$this->title = 'Update Client: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clients-update">
    <?= 
        $this->render('_form', [
            'model' => $model,
        ]) 
    ?>
</div>
