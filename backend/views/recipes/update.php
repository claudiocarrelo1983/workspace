<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */

$this->title = 'Update Recipes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('@backend/views/layouts/header'); ?>

<div class="recipes-update">
    <?= $this->render('_form', [
         'model' => $model,              
         'recipeCodeIngredients' => $recipeCodeIngredients,
         'recipeCodeSteps' => $recipeCodeSteps,    
         'modelsRecipeSteps' => $modelsRecipeSteps, 
         'modelIngredients' => $modelIngredients,
    ]) ?>

</div>    

<?= $this->render('/site/footer_simple'); ?>		
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();