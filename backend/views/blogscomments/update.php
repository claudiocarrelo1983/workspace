<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsComments */

$this->title = 'Update Comments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blogs Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogs-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
