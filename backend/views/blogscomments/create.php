<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogsComments */

$this->title = 'Create Comment';
$this->params['breadcrumbs'][] = ['label' => 'Blogs Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
