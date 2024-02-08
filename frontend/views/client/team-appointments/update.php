<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */

?>
<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div id="examples" class="container  pb-5">
    <?= $this->render('@frontend/views/client/client-booking/links'); ?>   
</div>
<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <div class="clients-index">
                <p class="text-6 text-dark pb-5">
                    <?= Yii::t('app', 'update').' : '.$model->booking_code ?>                
                </p>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
