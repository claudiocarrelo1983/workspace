<?php

/* @var $this yii\web\View */
use common\models\BlogsComments;
use yii\helpers\Url;
use yii\db\Query;
use common\models\GeneratorJson;
use yiier\chartjs\ChartJs;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('recipe_category');  


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
				<?= $this->render('recipe-sidebar'); ?>
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
						<div class="post-image ms-0">							
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
									<i class="far fa-clock"></i> <?= $recipe['cooking_time'] ?> <?= Yii::t('app', 'minutes') ?> 
								</span>
								<span class="px-2 text-left"  style='font-size:15px'>
									<i class="far fa-lightbulb" ></i> 
									<?= $recipe['difficulty'] ?>
								</span>
								<span class="px-2 text-left"  style='font-size:15px'>
									<i class="far fa-user-circle"></i>
									<?= $recipe['number_of_people'] ?> <?= Yii::t('app', 'people') ?> 
								</span>
							
								<span class="px-2 text-left" style='font-size:15px'>
									<i class="far fa-folder"></i>
										<a href="<?= Url::toRoute(['site/recipes-single', 'category' => $recipe['recipe_cat_code']]); ?>">
											<?= Yii::t('app', $recipe['category']) ?>
										</a>								
								</span>
									<?php $numberComments = 0;	?>
								<span>								
							</div>
							<div class="text-3 py-3">
								<?= Yii::t('app', $recipe['recipe_code_text']) ?>
							</div>
							<div class="row">
								<div class="col pt-5">
									<h4>                    
										<?= Yii::t('app', 'Ingredientes') ?>   
									</h4>  
									<table class="table">										
										<tbody>  
											<?php 
												$lipids = 0;
												$carbs = 0;
												$protein = 0;
												$total =  0; 
											?>
											<?php foreach ($recipe['food'] as $key => $food): ?>                     
												<tr>    
													<td>
														<?= Yii::t('app', $food['page_code']) ?>
														(
															<?= Yii::t('app', $food['quantity']) ?> 
															<?= Yii::t('app', $food['measure']) ?> 
														)
													</td>											
													<td class="text-right">
														<?= Yii::t('app', $food['calories']) ?> Kcal
													</td>   
												</tr>  
												<?php $total += $food['calories'] ?>
												<?php $lipids += $food['fat'] ?>
												<?php $carbs += $food['carbs'] ?>
												<?php $protein += $food['protein'] ?>
											<?php endforeach; ?>  
												<tr>    
													<td>
														<p>
															<strong>Total</strong>
														</p>
													</td>											
													<td class="text-right">
														<strong><?= $total ?> Kcal</strong>
													</td>   
												</tr>  
										</tbody>
									</table>
									<h4>
										<?= Yii::t('app','Macronutrients') ?>
									</h4>
									
									<?= ChartJs::widget([
										'type' => 'doughnut',
										
										'options' => [
											'height' => 450,
											'width' => 400,	
											'legend' => [	
												'position'=> 'bottom',
												'display'=> 'false'		
											],													
										],										
										'data' => [
											'labels' => [
													Yii::t('app','Lipids'),
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
														$lipids, 
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
								<div class="col pt-5">								
									<h4>                    
										<?= Yii::t('app', 'Preparation') ?>   
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
			</div>
		</div>
		<hr class=" my-5 ">
		<h4>                    
			<?= Yii::t('app', 'Related Recipes') ?>   
		</h4> 
		<div class="row">
			<?php				
				$i = 0;				
			?>
			<?php foreach ($recipeArr as $key => $recipeVal):  ?>   

			
					<?php 					
					if ($i  <= 2) { 
						if($recipe['recipe_cat_code'] == $recipeVal['recipe_cat_code'] && $recipe['id'] != $recipeVal['id'] ){
					?>
						<div class="col-4">
							<div class="card">
								<img class="card-img-top" src="<?= $recipeVal['image'] ?>" alt="Card Image">
								<div class="card-body">
									<h4 class="card-title mb-1 text-4 font-weight-bold">
										<?= Yii::t('app', $recipeVal['recipe_code_title']) ?>
									</h4>
									<span class=" text-left" style='font-size:15px'>
										<i class="far fa-clock"></i> <?= $recipeVal['cooking_time'] ?> <?= Yii::t('app', 'minutes') ?> 
									</span>
									<span class="px-2 text-left"  style='font-size:15px'>
										<i class="far fa-lightbulb" ></i> 
										<?= $recipeVal['difficulty'] ?>
									</span>
									<span class=" px-2 text-right"  style='font-size:15px'>
										<i class="far fa-user-circle"></i>
										<?= $recipeVal['number_of_people'] ?> <?= Yii::t('app', 'people') ?> 
									</span>									
									<p class="card-text mb-2 pt-3">
										<?= substr(Yii::t('app',$recipeVal['recipe_code_text']), 0,115).'[..]' ?>
									</p>						
								
									<p class="pt-3" style='font-size:15px'>										
										<a class="read-more text-color-primary font-weight-semibold text-2" href="<?= Url::toRoute(['site/recipe-single', 'id' => $recipeVal['id']]); ?>" class="btn btn-xs btn-light text-1 text-uppercase">
											<i class="fas fa-angle-right position-relative top-1 ms-1"></i> <?= Yii::t('app', 'read_more') ?>
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