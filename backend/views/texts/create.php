<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Texts */

$this->title = 'Create Texts';
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
