<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Sheddule $model */


?>
<div class="sheddule-create">
    
    <?= Helpers::displayAminBreadcrumbs('sheddule', 'create') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
