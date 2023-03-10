<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = 'Create Team';
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $title,
        'text' => $text,
    ]) ?>

</div>
