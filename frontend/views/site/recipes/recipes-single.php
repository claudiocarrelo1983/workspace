<?php

/* @var $this yii\web\View */
use common\models\recipesComments;
use yii\helpers\Url;
use yii\db\Query;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('recipes_category');  


$this->title = 'recipes';

$this->params['breadcrumbs'][] = $this->title;

$tagQuery  = new Query;

$timestamp = strtotime($recipes['created_date']);
$key = 1;

$path2 = 'all_pricing';

?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>



	<div role="main" class="main">
		<div class="container py-4">
			<div class="row">
				<div class="col-lg-3 order-lg-2">
					<?= $this->render('recipes-sidebar'); ?>
				</div>
				<div class="col-lg-9 order-lg-1">
					<div class="recipes-posts single-post">
						<section class="page-header page-header-modern page-header-md">
							<div class="container">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<h1 class="text-dark font-weight-bold text-8">
											<?= $recipes['title'] ?>
										</h1>
									</div>
								</div>
							</div>
						</section>
						<article class="post post-large recipes-single-post border-0 m-0 p-0">
							<div class="post-image ms-0">							
									<img src="<?= $recipes['image'] ?>"
										class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />								
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
								<h2 class="font-weight-semi-bold"><a href="recipes-post.html">
										<?= $recipes['subtitle'] ?>
									</a></h2>
								<div class="post-meta">
									<span><i class="far fa-user"></i> By <a href="#">
										<?php $urlParamsVal = ['site/recipes', 
															'username' => $recipes['username'] ,																									
														];?>
																							
										<a href="<?= Url::toRoute($urlParamsVal); ?> ">
											<?= $recipes['username'] ?>
										</a> 
									</span>

									<?php 		/*	

										$numberComments = recipesComments::find()
											->where(['recipes_id' => $key])
											->count();									
																		
																										
										foreach ($recipes['tags'] as  $tags): 
											if(!empty($tags)){										
											?>
											<a href="<?= Url::toRoute(['site/recipes', 'tag' => $tags['tag']]); ?> ">
												<?= $tags['tag'] ?>
											</a>
											<?php 
											}
										endforeach; 	
										*/			
										$numberComments = 0;				
									?>

								<span>
									<i class="far fa-folder"></i>
										<?php 	
										
											$arrTags = explode(',', $recipes['tags']); 
											$tagList = array();

											foreach($arrTags as $tag){	
												foreach($tagsCategory as $category){
													if($tag == $category['tag']){
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
															'username' => '#',																
															'tag' => $tags['tag'],													
														];?>
																					
														<a href="<?= Url::toRoute($urlParamsVal); ?> "><?= $tags['description'] ?></a><?= $comma  ?>								
													<?php 
													$i++;
												}
											endforeach; 
										?> 
									</span> 

									<span><i class="far fa-comments"></i> <a href="#"><?= ($numberComments < 0)? $numberComments.'Comments' : '' ?> HHHHHH</a></span>
								</div>

								<?= $recipes['text'] ?>

									<div class="post-block mt-5 post-share">
										<h4 class="mb-3">Share this Post</h4>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
										<div class="addthis_inline_share_toolbox"></div>
										<script type="text/javascript"
											src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60ba220dbab331b0"></script>

									</div>

									<?= $this->render('recipes-comments') ?>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>


<!-- Sub Footer -->
<?= $this->render('/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->