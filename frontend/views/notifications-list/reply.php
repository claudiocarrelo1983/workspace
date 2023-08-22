<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = 'Team Member : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-update">
    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($model->full_name) ?>
    </h4>  

    <div>
      <strong>Full Name: </strong>  <?= $model->full_name ?>
    </div>
    <div>
      <strong>Contact Number: </strong>  <?= $model->contact_number ?>
    </div>
    <div>
      <strong>Email: </strong>  <?= $model->email ?>
    </div>
    <div>
      <strong>Text: </strong>  <?= $model->text ?>
    </div>
    <div>
      <strong>Date: </strong>  <?= $model->created_date ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
