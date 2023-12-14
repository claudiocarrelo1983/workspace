<?php

use yii\helpers\Html;
use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = 'Create Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-create">

    <?= Helpers::displayAminBreadcrumbs('events', 'events-list', 'create') ?> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
