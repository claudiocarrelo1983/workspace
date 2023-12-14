<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Clients $model */

$this->title = 'Create Clients';
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-create">
    <?= Helpers::displayAminBreadcrumbs('notifications','notifications-subject','create') ?>

    <?= $this->render('_form', [
        'model' => $model,
        'code' => $code,
        ]) 
    ?>

</div>
