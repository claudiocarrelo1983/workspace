<?php

use common\Helpers\Helpers;

/** @var yii\web\View $this */
/** @var app\models\MessagesTemplate $model */

$this->title = 'Create Messages Template';
$this->params['breadcrumbs'][] = ['label' => 'Messages Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-template-create">


<?= Helpers::displayAminBreadcrumbs('message','message-templates', 'create') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
