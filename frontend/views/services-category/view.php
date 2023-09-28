<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Services Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-category-view">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

    <p>
        <?= Html::a(Yii::t('app', 'edit_button'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'delete_button'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) 
        ?>
        <?= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',  
            'company_code',
            'title',
            'title_pt',
            'title_en',
            'order',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
