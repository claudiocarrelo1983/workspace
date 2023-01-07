<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Recipes;
use common\models\RecipesFood;
use common\models\RecipesSteps;
use yii\bootstrap4\Modal;
USE yii\widgets\ActiveForm;
$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="recipes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipes', ['create'], ['class' => 'btn btn-success']) ?>

        <?php
            Modal::begin([
                'title' => 'Choose a Recipe ID',
                'toggleButton' => ['label' => 'Load Recipe','class' => 'btn btn btn-outline-success'],
            ]);

            $form = ActiveForm::begin();

            echo $form->field($modelRecipeId, 'recipe_id')->textInput();

            echo '</div>
                <div class="modal-footer">'.
                    Html::submitButton('Save', ['class' => 'btn btn-success'])
                .'</div>';
            ActiveForm::end();
            Modal::end();
        ?>
   </p>
   
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,       
      
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],          
            'recipe_title',
            'recipe_code_title',      
            'recipe_text:ntext',
            'recipe_cat_code',
            'cooking_time',  
            'number_of_people',           
            'active',  
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recipes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
