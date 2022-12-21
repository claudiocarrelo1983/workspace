<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormsTemplates */

$this->title = 'Update Forms Templates: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Forms Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forms-templates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
