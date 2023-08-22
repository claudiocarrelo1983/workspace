<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */


\yii\web\YiiAsset::register($this);
?>

<?= $this->render('/client/client-booking-header', ['myData' => '', 'logo' => '']); ?>

<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <div class="clients-index">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'team_username',
                        'client_username',
                        'company_code',
                        'service_cat',
                        'service_name',
                        'available',
                        'full_name',
                        'contact_number',
                        'email:email',
                        'nif',
                        'date',
                        'time',
                        'created_date',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

</div>
