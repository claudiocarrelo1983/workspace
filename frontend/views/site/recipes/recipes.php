<?php

use yii\helpers\Url;
use common\models\recipes;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('recipes');  

$this->title = 'Recipes';

$this->params['breadcrumbs'][] = $this->title;

$numberPerPage = 7;
$recipes = ['1'];
//total recipes
$numberPosts = count($recipes);

//number of divisions
$numberOfDivisionsCeil = ceil(bcdiv($numberPosts, $numberPerPage, 2));

//last page
$numberOfDivisions = bcdiv($numberPosts, $numberPerPage);
$numberOfDivisions = bcmul($numberPerPage, $numberOfDivisions);

//number of last
$remainRecipes = bcsub($numberPosts, $numberOfDivisions);

$arrRecipes = array();
$index = 1;
$numberPage = $numberPerPage;

$recipesFilter = array();

foreach($recipes as $key => $recipe){	
	
	if($numberPage == $key){	
		$index ++;
		$numberPage = bcadd($numberPerPage, $key);
	}
	$arrRecipes[$index][] = $recipe;
}



if(0 < $pg){	
	$arrRecipesCeil =  (isset($arrRecipes[$numberOfDivisionsCeil]) ? $arrRecipes[$numberOfDivisionsCeil] : array());
	$arrRecipes = (isset($arrRecipes[$pg]) ? $arrRecipes[$pg] : $arrrecipesCeil);
}else{
	$arrRecipes = (isset($arrRecipes[1]) ? $arrRecipes['1'] : $arrRecipes);
}


$path2 = 'recipes';

?>

<!-- Banner -->
<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<div class="container py-4 mb-4">
	<div class="row text-center pb-5">
		<div class="col-md-9 mx-md-auto">
			<div class="overflow-hidden mb-3">
				<h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
					<span>
						<?= Yii::t('app', "recipes_block_1_title_1") ?>
					</span>
					<span class="word-rotator-words bg-primary">
						<b class="is-visible"><?= Yii::t('app', "recipes_block_1_1") ?></b>
						<b><?= Yii::t('app', "recipes_block__1_2") ?></b>
						<b><?= Yii::t('app', "recipes_block__1_3") ?></b>
					</span>
					<span>
						<?= Yii::t('app', "recipes_block__1_title_2") ?>
					</span>
				</h1>   
			</div>
			<div class="overflow-hidden mb-3">
				<p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
					<?= Yii::t('app', "recipes_block_1_text") ?>
				</p>
			</div>
		</div>
	</div>
</div>

<div role="main" class="main">
	<div class="container py-4">
		<div class="row">
			<div class="col-lg-3 order-lg-2">
				<?= $this->render('recipes-sidebar', ['urlParams' => $urlParams, '']); ?>					
			</div>		
			<div class="col-lg-9 order-lg-1">
				<div class="recipes-posts">		
						   
						
				</div>
			</div>				
		</div>
	</div>
</div>
</div>


<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->

<!--  Footer -->
<?= $this->render('../footer',
     [           
        'modelFooter' =>  $modelFooter   
    ]) ?>	
<!--  Footer -->