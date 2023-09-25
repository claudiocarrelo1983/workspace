<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Create Services';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                <?= Html::encode(Yii::t('app', 'menu_admin_services_list')) ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app', 'menu_admin_services') ?> 
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= Yii::t('app', 'menu_admin_services_list') ?> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <p>
        <?= Yii::t('app','create_services_category_first') ?>
    </p>  
    <?= $this->render('_form', [
        'model' => $model,
        'modelCat' => $modelCat,
        'countCat' => $countCat
    ]) ?>

</div>
