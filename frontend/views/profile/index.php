<?php

use app\models\Clients;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\Models\ClientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients List';
$this->params['breadcrumbs'][] = $this->title;



$query = new Query;
$userArr = $query->select('*')
->from(['company'])
->where([
   'company_code' => Yii::$app->user->identity->company_code
]) 
->one();


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 pb-4">
                <?= Yii::t('app','menu_admin_settings_profile') ?>
            </h4>  
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?= Yii::t('app','menu_admin_settings') ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?= Yii::t('app','menu_admin_settings_profile') ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <?= 
        $this->render('_form', [
            'model' => $model,
            'weekDays' => $weekDays,
            'serviceTimeMin' => $serviceTimeMin,
        ]) 
    ?>
</div>






