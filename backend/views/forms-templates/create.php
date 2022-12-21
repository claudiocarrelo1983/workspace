<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormsTemplates */

$this->title = 'Create Forms Templates';
$this->params['breadcrumbs'][] = ['label' => 'Forms Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-templates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
