<?php

use yii\helpers\Url;
use common\models\recipes;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$recipesArr = $model->getLastFileUploaded('recipes');

/*
$arr = [];
foreach ($recipesArr as $recipeValues) {
	$arr[] = $recipeValues['recipe_title'];
}

print "<pre>";
print_r($arr);
die();

*/
$this->title = 'Recipes';

$this->params['breadcrumbs'][] = $this->title;

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
<div class="container py-4">
	<div class="row">
		<div class="col-lg-3 order-lg-2">
			<?= $this->render('recipe-sidebar', ['urlParams' => '#', '']); ?>				
		</div>
		<div class="col-lg-9 order-lg-1">
			<div class="blog-posts">			
				<?php foreach ($recipesArr as $recipeValues) { ?>
					<article class="post post-medium">
						<div class="row mb-3">
							<div class="col-lg-5">
								<div class="post-image">
									<a href="<?= Url::toRoute(['site/recipe-single', 'id' => $recipeValues['id']]); ?>">
										<img src="<?= $recipeValues['image'] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
									</a>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="post-content">
									<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
										<a href="<?= Url::toRoute(['site/recipe-single', 'id' => $recipeValues['id']]); ?>">
											<?= Yii::t('app',$recipeValues['recipe_code_title']) ?>
										</a>
									</h2>
									<p class="mb-0">										
										<?= substr(Yii::t('app',$recipeValues['recipe_code_text']), 0, 1000).'[..]' ?>
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="post-meta">
									<span style='font-size:15px'>
										<i class="far fa-clock"></i> <?= $recipeValues['cooking_time'] ?> <?= Yii::t('app', 'minutes') ?> 
									</span>
									<span style='font-size:15px'>
										<i class="far fa-lightbulb" ></i> 
										<?= $recipeValues['difficulty'] ?>
									</span>
									<span style='font-size:15px'>
										<i class="far fa-user-circle"></i>
										<?= $recipeValues['number_of_people'] ?> <?= Yii::t('app', 'people') ?> 
									</span>
								
									<span style='font-size:15px'>
										<i class="far fa-folder"></i>
											<a href="<?= Url::toRoute(['site/recipes-single', 'category' => $recipeValues['recipe_cat_code']]); ?>">
												<?= Yii::t('app', $recipeValues['category']) ?>
											</a>								
									</span>
									
									<span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0">
										<a href="<?= Url::toRoute(['site/recipe-single', 'id' => $recipeValues['id']]); ?>" class="btn btn-xs btn-light text-1 text-uppercase">
											<?= Yii::t('app', 'read_more') ?>
										</a>
									</span>
								</div>
							</div>
						</div>
					</article>
				<?php } ?>


				<ul class="pagination float-end">
					<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
				</ul>

			</div>
		</div>
	</div>

</div>

</div>


