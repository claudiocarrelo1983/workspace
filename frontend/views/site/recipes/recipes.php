<?php

use yii\helpers\Url;
use common\models\recipes;
use common\models\GeneratorJson;


$model = new GeneratorJson(); 


//total blogs
$numberPosts = count($recipes);


//number of divisions
$numberOfDivisionsCeil = ceil(bcdiv($numberPosts, $numberPerPage, 2));

//last page
$numberOfDivisions = bcdiv($numberPosts, $numberPerPage);
$numberOfDivisions = bcmul($numberPerPage, $numberOfDivisions);

//number of last
$remainBlogs = bcsub($numberPosts, $numberOfDivisions);


$recipesArr = array();
$index = 1;
$numberPage = $numberPerPage;

$blogFilter = array();

foreach($recipes as $key => $blog){	
	
	if($numberPage == $key){	
		$index ++;
		$numberPage = bcadd($numberPerPage, $key);
	}
	$recipesArr[$index][] = $blog;
}


if(0 < $pg){	
	$arrBlogCeil =  (isset($arrBlog[$numberOfDivisionsCeil]) ? $arrBlog[$numberOfDivisionsCeil] : array());
	$recipesArr = (isset($recipesArr[$pg]) ? $recipesArr[$pg] : $arrBlogCeil);
}else{
	$recipesArr = (isset($recipesArr[1]) ? $recipesArr['1'] : $arrBlog);
}


$tagsCategory = $model->getLastFileUploaded('recipes_category');  

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
			<?= $this->render('recipe-sidebar', ['urlParams' => $urlParams]); ?>				
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
										<?php 	
											
											$arrTags = explode(',',  $recipeValues['recipe_cat_code']); 
											$tagList = array();

											foreach($arrTags as $tag){	
												foreach($tagsCategory as $category){
													if($tag == $category['recipe_cat_code']){
														$tagList[] = $category;
													}
												}			
											}	

											$count = count($tagList);
											$i = 1;									

											foreach ($tagList as  $key => $tags): 
												if(!empty($tags)){																	
													$comma = (($i == $count) ? '' : ',');		
													?>					
														<?php $urlParamsVal = ['site/recipes', 	
															'pg' => 1,																		
															'tag' => $tags['recipe_cat_code'],													
														];?>
																					
														<a href="<?= Url::toRoute($urlParamsVal); ?> "><?= $tags['description'] ?></a><?= $comma  ?>								
													<?php 
													$i++;
												}
											endforeach; 
										?> 							
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

				<?php if($numberOfDivisionsCeil > 1){ ?>
					<ul class="pagination float-end">
						<li class="page-item">		
							<?php $urlParamsVal = ['site/blog', 
								'username' => $urlParams['username'],																	
								'pg' =>  1,
								'tag' =>  $urlParams['tag']														
							];?>			
							<a class="page-link" href="<?= Url::toRoute($urlParamsVal); ?>">
								<i class="fas fa-angle-left"></i>
							</a>							
						</li>							
						<?php
							$first = bcsub($pg, 3);
							$first = (($first >= '1') ? $first : 1);
							$end = ($numberOfDivisionsCeil <= (bcadd($pg, 3)) ? $numberOfDivisionsCeil : bcadd($pg, 3));
							$inc = 1;						
						?>
						<?php 					
							for($x = $first; $x <= $end; $x++){ ?>  							
								<?php if ($x == $pg): ?>
									<li class="page-item active">	
										<?php $urlParamsVal = ['site/recipes', 																										
											'pg' =>  $x,
											'tag' =>  $urlParams['tag']														
										];?>	
										<a class="page-link" href="<?= Url::toRoute($urlParamsVal); ?>">
											<?= $x ?>
										</a>	
									</li>
								<?php else: ?>
									<li class="page-item <?= (($inc == '1' && $pg == '') ? 'active' : '') ?>">
										<?php $urlParamsVal = ['site/recipes', 																										
											'pg' =>  $x,
											'tag' =>  $urlParams['tag']														
										];?>	
										<a class="page-link" href="<?= Url::toRoute($urlParamsVal); ?>">
											<?= $x ?>
										</a>
									</li>
								<?php endif; ?>										
							<?php 
							$inc++;		
						}
						?>
						<li class="page-item">
								<?php $urlParamsVal = ['site/recipes', 																									
									'pg' =>  $numberOfDivisionsCeil,
									'tag' =>  $urlParams['tag']														
								];?>	
							<a class="page-link" href="<?= Url::toRoute($urlParamsVal); ?>">
								<i class="fas fa-angle-right"></i>
							</a>						
						</li>
					</ul>		
					<?php } ?>	
			
			</div>
		</div>
	</div>

</div>

</div>


