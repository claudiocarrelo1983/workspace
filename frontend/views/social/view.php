<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Company $model */

$this->title = 'Social Networking';
?>
<div class="company-view">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

    <p>
        <?= Html::a('Edit', ['update'], ['class' => 'btn btn-primary']) ?>  
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [       
            'website',
            'facebook',
            'pinterest',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube'                      
        ],
    ]) ?>

</div>
