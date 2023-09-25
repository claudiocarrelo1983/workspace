<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Company $model */

$this->title = 'Company Details';
?>
<div class="company-view">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4>  

    <p>
        <?= Html::a(Yii::t('app', 'edit_button'), ['update'], ['class' => 'btn btn-primary']) ?>  
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [        
            'company_code',
            'category_code',        
            'full_name',
            'description:ntext',
            'nif',
            'cae',          
            'contact_number_1',
            'contact_number_2',
            'contact_number_3',
            'address_line_1',
            'address_line_2',
            'website',
            'facebook',
            'pinterest',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube',
            'email_1:email',
            'email_2:email',
            'city',
            'postcode',
            'location',
            'country',                
        ],
    ]) ?>

</div>
