<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Company $model */

$this->title = 'Company Details';

?>
<div class="company-update">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                    <?= Html::encode(Yii::t('app', 'menu_admin_company')) ?>
                </h4>  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                <?= Yii::t('app', 'menu_admin_company') ?> 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= Yii::t('app', 'menu_admin_company_details') ?> 
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
