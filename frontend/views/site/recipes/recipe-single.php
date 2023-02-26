<?php

/* @var $this yii\web\View */
use common\models\BlogsComments;
use yii\helpers\Url;
use yii\db\Query;
use common\models\GeneratorJson;
use yiier\chartjs\ChartJs;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('recipes_category');  

$this->title = 'Recipes';

$this->params['breadcrumbs'][] = $this->title;

$tagQuery  = new Query;

$timestamp = strtotime($recipe['created_date']);
$key = 1;

$path2 = 'recipes_single';


?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>


<div role="main" class="main">
	<div class="container py-4">
		<div class="row">
			<div class="col-lg-3 order-lg-2">
				<?= $this->render('recipe-sidebar', ['urlParams' => $urlParams]); ?>
			</div>
			<div class="col-lg-9 order-lg-1">
				<div class="blog-posts single-post">
					<section>
						<div class="container">
							<div class="row">
								<div class="col-md-12 align-self-center p-static order-2 text-center">
									<h1 class="text-dark font-weight-bold text-8">									
										<?= Yii::t('app', $recipe['recipe_code_title']) ?>
									</h1>
								</div>
							</div>
						</div>
					</section>
					<article class="post post-large blog-single-post border-0 m-0 p-0">
						<div class="post-image ms-0 google-map-borders">							
							<img src="<?= $recipe['image'] ?>" class=" img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />								
						</div>
						<div class="post-date ms-0">
							<span class="day">
								<?= date('d', $timestamp) ?>
							</span>
							<span class="month">
								<?= date('M', $timestamp) ?>
								<?= date('Y', $timestamp) ?>
							</span>								
						</div>
						<div class="post-content ms-0">
							<h2 class="font-weight-semi-bold">															
								<?= Yii::t('app', $recipe['recipe_code_title']) ?>								
							</h2>
							<div class="post-meta text-right pt-4">
								<span class="px-2 text-left" style='font-size:15px'>
									<i class="far fa-clock"></i> <?= $recipe['cooking_time'] ?> <?= Yii::t('app', 'recipe_minutes') ?> 
								</span>
								<span class="px-2 text-left"  style='font-size:15px'>
									<i class="far fa-lightbulb" ></i>									
									<?= Yii::t('app', 'recipe_'.$recipe['difficulty']) ?> 
								</span>
								<span class="px-2 text-left"  style='font-size:15px'>
									<i class="far fa-user-circle"></i>
									<?= $recipe['number_of_people'] ?> <?= Yii::t('app', 'recipe_people') ?> 
								</span>
							
								<span class="px-2 text-left" style='font-size:15px'>
									<i class="far fa-folder"></i>
										<?php 	
											
											$arrTags = explode(',',  $recipe['recipe_cat_code']); 
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
															'tag' => $tags['recipe_cat_code'],													
														];?>
																					
														<a href="<?= str_replace('/frontend/web', '',Url::toRoute($urlParamsVal)); ?> "><?= $tags['description'] ?></a><?= $comma  ?>								
													<?php 
													$i++;
												}
											endforeach; 
										?> 
																
								</span>
									<?php $numberComments = 0;	?>
								<span>								
							</div>
							<div class="text-3 text-justify post post-large blog-single-post  py-3">
								<?= Yii::t('app', $recipe['recipe_code_text']) ?>
							</div>
							<div class="d-block pb-2">
								<input type="text" class="rating-invisible" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'dark', 'size':'sm'}">
							</div>
							<div class="row">
								<div class="col-lg-6 pt-5">
									<h4>                    
										<?= Yii::t('app', 'recipe_food_ingredients') ?>   
									</h4>  
									<table class="table">	
										<thead> 
											<tr> 
												<th>
													<?= Yii::t('app','recipe_food_name') ?>										
												</th> 
												<th>
													<?= Yii::t('app','recipe_food_measure') ?>	
												</th> 
												<th>
													<?= Yii::t('app','recipe_food_calories') ?>	
												</th> 
											<tr>	
										</thead> 								
										<tbody>  
											<?php 
												$fat = 0;
												$colesterol = 0;
												$sodium = 0;
												$fibers = 0;
												$sugar = 0;
												$carbs = 0;
												$protein = 0;
												$totalCalories =  0; 
											?>
											<?php foreach ($recipe['food'] as $key => $food): ?>   
											
												<tr>    
													<td>
														<?= Yii::t('app', $food['page_code']) ?>													
													</td>	
													<td>																											
														(
															<?= $food['quantity'] ?> 
															<?= Yii::t('app', $food['measure']) ?> 
														)
													</td>										
													<td class="text-right">
														<?= Yii::t('app', $food['calories']) ?> Kcal
													</td>   
												</tr>  
											
												<?php $totalCalories += $food['calories'] ?>
												<?php $colesterol += $food['colesterol'] ?>
												<?php $sodium += $food['sodium'] ?>
												<?php $fibers += $food['fibers'] ?>
												<?php $sugar += $food['sugar'] ?>									
												<?php $fat += $food['fat'] ?>
												<?php $carbs += $food['carbs'] ?>
												<?php $protein += $food['protein'] ?>
											<?php endforeach; ?>  

											<?php
												$totalNutri = bcadd($fat, $carbs);
												$totalNutri = bcadd($totalNutri, $protein);
											?>
												<tr>    
													<td>
														<p>
															<strong>Total</strong>
														</p>
													</td>
													<td>
													</td>											
													<td class="text-right">
														<strong><?= $totalCalories ?> Kcal</strong>
													</td>   
												</tr>  
										</tbody>
									</table>								
								</div>
								<div class="col-lg-6 pt-5">								
									<h4>                    
										<?= Yii::t('app', 'recipe_food_preparation') ?>   
									</h4>  
									<table class="table">										
										<tbody>  
											<?php 
											$total =  0;
											$i = 1;
											 ?>
											<?php foreach ($recipe['steps'] as $key => $steps):  ?>                     
												<tr>    
													<td class="py-3">
														<div>
															<strong>												
																<?= Yii::t('app','recipe_steps').' ' ?> <?= $i++ ?>												
															</strong>	
														</div> 
														<div>
															<?= Yii::t('app', $steps['page_code']) ?>  
														</div>												
													</td>
												</tr>  												
											<?php endforeach; ?>  									
										</tbody>
									</table>              																		
								</div>					
							</div>
					</article>
				</div>
			<div class=" my-5 "></div>
			<h4>                    
				<?= Yii::t('app', 'recipe_nutricional_title') ?>   
			</h4> 	
			<hr>	
		
			<div class="row">			
				<div class="col">
					<div class="border p-4">
						<h4>
							<?= Yii::t('app','recipe_nutricional_fact') ?>
						</h4>		
						<table class="table">	
							<thead>
								<tr> 
									<th>
										<?= Yii::t('app','recipe_quantity') ?>										
									</th> 
									<th>
										<?= Yii::t('app','recipe_dose') ?>	
									</th> 
									<th>
										(%)
									</th> 
								<tr>
							</thead>					
							<tbody>  								
								<tr> 
									<td>
										<strong>
											<?= Yii::t('app','recipe_carbs') ?>
										</strong>
									</td>
									<?php
										if($totalNutri <= 0){
											$totalNutri = 1;
										}
									?>
									<td><?= $carbs ?> g</td>
									<td><?= bcdiv(bcmul(100, $carbs), $totalNutri) ?> %</td>
								</tr> 
								<tr> 
									<td>
										<strong>
											<?= Yii::t('app','recipe_fat') ?>
										</strong>
									</td>
									<td><?= $fat ?> g</td>
									<td><?= bcdiv(bcmul(100, $fat), $totalNutri) ?> %</td>
								</tr> 
								<tr> 
									<td>
										<strong>
											<?= Yii::t('app','recipe_protein') ?>
										</strong>
									</td>
									<td><?= $protein ?> g</td>
									<td><?= bcdiv(bcmul(100, $protein), $totalNutri) ?> %</td>
								</tr>
								<tr> 
									<td>
										<strong>
											<?= Yii::t('app','recipe_total') ?>
										</strong>
									</td>
									<td><?= $totalNutri ?> g</td>	
									<td><?= bcdiv(bcmul(100, $totalNutri), $totalNutri) ?> %</td>							
								</tr>
							</tbody>
						</table>  
					</div> 
				</div>
				<div class="col p-2">			
					<?= ChartJs::widget([
						'type' => 'doughnut',
						
						'options' => [
							'height' => 320,
							'width' => 400,	
							'legend' => [	
								'position'=> 'bottom',
								'display'=> 'false'		
							],													
						],										
						'data' => [
							'labels' => [
									Yii::t('app','Fat'),
									Yii::t('app','Carbs'),
									Yii::t('app','Protein')
								],
							'datasets' => [
								[
									'backgroundColor'=> [
										"#1abd99", 
										"#f7a923", 
										"#e64a18", 
									], 
									'label'=> '# of Votes',
									'data' => [
										$fat, 
										$carbs,
										$protein
									],
									'colors'=> ['#e0440e', '#e6693e', '#ec8f6e']
								]
							]
						],
						'clientOptions' => [
							'legend' => [
								'display' => true,
								'position' => 'bottom',
							]
						]

					]);?>					
				</div>
			</div>		
			<hr class=" my-5 ">
			</div>
		</div>
		<h4>                    
			<?= Yii::t('app', 'recipe_related') ?>   
		</h4> 
		<div class="row">
			<?php				
				$i = 0;				
			?>
			<?php foreach ($recipeArr as $key => $recipeVal):  ?>  			
					<?php	
					
					$arrTags1 = explode(',',  $recipeVal['recipe_cat_code']); 				

					$arrTags2 = explode(',',  $recipe['recipe_cat_code']); 
					$diplay = 0;			

					foreach($arrTags1 as $tag){
						if (str_contains($recipe['recipe_cat_code'], $tag)) {	

					
					
							$diplay = 1;
							break;
						}					
					}

					if ($i  <= 2) { 
						if($diplay === 1 && $recipe['id'] != $recipeVal['id']){		
						
					?>
						<div class="col-lg-4">
							<div class="card">
								<img class="card-img-top" src="<?= $recipeVal['image'] ?>" alt="Card Image">
								<div class="card-body">
									<h4 class="card-title mb-1 text-4 font-weight-bold">
										<?= Yii::t('app', $recipeVal['recipe_code_title']) ?>
									</h4>
									<span class=" text-left" style='font-size:15px'>
										<i class="far fa-clock"></i> <?= $recipeVal['cooking_time'] ?> 
										<?= Yii::t('app', 'recipe_minutes') ?> 
									</span>
									<span class="px-2 text-left"  style='font-size:15px'>
										<i class="far fa-lightbulb" ></i> 
										<?= Yii::t('app', 'recipe_'.$recipeVal['difficulty']) ?> 								
									</span>
									<span class=" px-2 text-right"  style='font-size:15px'>
										<i class="far fa-user-circle"></i>
										<?= $recipeVal['number_of_people'] ?> <?= Yii::t('app', 'recipe_people') ?> 
									</span>									
									<p class="card-text mb-2 pt-3">
										<?= substr(Yii::t('app',$recipeVal['recipe_code_text']), 0,115).'[..]' ?>
									</p>						
								
									<p class="pt-3" style='font-size:15px'>										
										<a class="read-more text-color-primary font-weight-semibold text-2" href="<?= str_replace('/frontend/web', '',Url::toRoute(['site/recipe-single', 'id' => $recipeVal['id']])); ?>" class="btn btn-xs btn-light text-1 text-uppercase">
											<i class="fas fa-angle-right position-relative top-1 ms-1"></i> <?= Yii::t('app', 'recipe_read_more') ?>
										</a>										
									</p>								
								</div>
							</div>																
						</div>	
					<?php 
						$i++;	
						}	
										
					}
				
					 ?>
			<?php endforeach; ?>  		
		</div>
	</div>
</div>
</div>



<!-- Sub Footer -->
<?= $this->render('/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->