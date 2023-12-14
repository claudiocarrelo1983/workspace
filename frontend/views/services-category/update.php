<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\ServicesCategory $model */

?>
<div class="services-category-update">

    <?= Helpers::displayAminBreadcrumbs('services','services-category','services-category','update', $model->title) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
