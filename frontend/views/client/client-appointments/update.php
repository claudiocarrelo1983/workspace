<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */

$this->title = 'Update Sheddule: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Sheddules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('/client/client-booking-header', ['myData' => '', 'logo' => '']); ?>

<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <div class="clients-index">
                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
