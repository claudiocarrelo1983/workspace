<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Company $model */

$this->title = 'Company Details';

?>
<div class="company-update">

    <h4 class="mb-sm-0 font-size-18 pb-4">
        <?= Html::encode($this->title) ?>
    </h4> 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
