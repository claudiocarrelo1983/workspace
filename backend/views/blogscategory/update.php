<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsCategory */

$this->title = 'Update Tag: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blogs Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogs-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'code' =>  $code
    ]) ?>

</div>
