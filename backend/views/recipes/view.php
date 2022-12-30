<?php

use common\models\RecipesSteps;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('@backend/views/layouts/header'); ?>

<div class="recipes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create Recipes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                     Recipes
                </a>
            </li>      
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#steps" data-bs-toggle="tab">
                    Steps
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#ingredients" data-bs-toggle="tab">
                    Ingredients
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts"> 
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',                                     
                            'recipe_code_title',
                            'recipe_code_text',
                            'recipe_title',
                            'recipe_text:ntext',
                            'recipe_cat_code',
                            'image',
                            'cooking_time',
                            'number_of_people',
                            'recipe_title_pt',
                            'recipe_text_pt',
                            'recipe_title_es',
                            'recipe_text_es',
                            'recipe_title_en',
                            'recipe_text_en',
                            'recipe_title_it',
                            'recipe_text_it',
                            'recipe_title_fr',
                            'recipe_text_fr',
                            'recipe_title_de',
                            'recipe_text_de',
                            'active',
                            'created_date',
                        ],
                    ]) ?>
            </div>         
            <div class="tab-pane " id="steps"> 
               <?= GridView::widget([
                    'dataProvider' => $dataProviderStep,       
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'recipe_code',
                        'page_code',
                        'recipe_step_text:ntext',
                        'recipe_step_text_pt:ntext',
                        'recipe_step_text_es:ntext',
                        'recipe_step_text_en:ntext',
                        'recipe_step_text_it:ntext',
                        'recipe_step_text_fr:ntext',
                        'recipe_step_text_de:ntext',
                        'order',
                        'created_date'
                    ],
                ]);?> 
            </div>
            <div class="tab-pane " id="ingredients"> 
                <?= GridView::widget([               
                    'dataProvider' => $dataProviderFood,       
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'recipe_code',
                        'page_code',
                        'recipe_food_name',
                        'measure',
                        'quantity',                    
                        'fat',
                        'carbs',
                        'protein',
                        'recipe_food_pt',
                        'recipe_food_es',
                        'recipe_food_en',                
                        'active',
                        'created_date',
                    ],
                ]);?> 
            </div>
        </div>
    </div>
</div>
