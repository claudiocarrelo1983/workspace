<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */

$this->title = 'Create Recipes';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('@backend/views/layouts/header'); ?>

    <div class="recipes-create">

        <?= $this->render('_form', [
            'model' => $model,
            'recipeCodeTitle' => $recipeCodeTitle,
            'recipeCodeText' => $recipeCodeText,
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