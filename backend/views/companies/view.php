<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Companies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="companies-view">

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
            'first_name',
            'last_name',
            'full_name',
            'gender',
            'title',
            'foto',
            'nif',
            'email:email',
            'contact_number',
            'dob',
            'logo',
            'team_code',
            'team_name',
            'summary',
            'description:ntext',
            'role',
            'level',
            'sublevel',
            'address',
            'postcode',
            'location',
            'country',
            'language',
            'website',
            'facebook',
            'pinterest',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube',
            'gdpr',
            'terms_and_conditions',
            'newsletter',
            'active',
            'order',
            'created_date',
        ],
    ]) ?>

</div>
