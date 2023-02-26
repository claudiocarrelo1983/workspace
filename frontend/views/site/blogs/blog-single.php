<?php

/* @var $this yii\web\View */
use common\models\BlogsComments;
use yii\helpers\Url;
use yii\db\Query;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('blogs_category');  
 
$comments = $model->getLastFileUploaded('comments');

$comments = (isset($comments['blog_' . $blog_id]) ? $comments['blog_' . $blog_id] : []);

$teams = $model->getLastFileUploaded('team');

$arrUser = array();

foreach ($teams as $member) {
	if($blog['username'] == $member['username'] ){
		$arrUser = $member;
		break;
	}
}


$this->title = 'Blog';

$this->params['breadcrumbs'][] = $this->title;

$timestamp = strtotime($blog['created_date']);
$key = 1;

$path2 = 'blog';

?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

	<div role="main" class="main">
		<div class="container py-4">
			<div class="row">
				<div class="col-lg-3 order-lg-2">
					<?= $this->render('blog-sidebar'); ?>
				</div>
				<div class="col-lg-9 order-lg-1">
					<div class="blog-posts single-post">
						<section class="page-header page-header-modern page-header-md">
							<div class="container">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<h1 class="text-dark font-weight-bold text-8">										
											<?= Yii::t('app', $blog['page_code_title']) ?>
										</h1>
									</div>
								</div>
							</div>
						</section>
						<article class="post post-large blog-single-post border-0 m-0 p-0">
							<div class="post-image ms-0 post-image google-map-borders">							
									<img src="<?= $blog['path'].'900x500/'.$blog['image'] ?>"
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
								<h2 class="font-weight-semi-bold">
									<?= Yii::t('app', $blog['page_code_subtitle']) ?>
								</h2>
								<div class="post-meta">
									<span><i class="far fa-user"></i> By <a href="#">
										<?php $urlParamsVal = ['site/blog', 
															'username' => $blog['username'] ,																									
														];?>
																							
										<a href="<?= Url::toRoute($urlParamsVal); ?> ">
											<?= $arrUser['full_name'] ?>
										</a> 
									</span>

									<?php 		/*	

										$numberComments = BlogsComments::find()
											->where(['blog_id' => $key])
											->count();									
																		
																										
										foreach ($blog['tags'] as  $tags): 
											if(!empty($tags)){										
											?>
											<a href="<?= Url::toRoute(['site/blog', 'tag' => $tags['tag']]); ?> ">
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
										
											$arrTags = explode(',', $blog['tags']); 
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

											foreach ($tagList as $key => $tags):

											
												if(!empty($tags)){																	
													$comma = (($i == $count) ? '' : ',');		
													?>					
														<?php $urlParamsVal = ['site/blog', 									
															'username' => '#',																
															'tag' => $tags['tag'],													
														];?>
																					
														<a href="<?= Url::toRoute($urlParamsVal); ?> "> <?= Yii::t('app', $tags['page_code']) ?></a><?= $comma  ?>								
													<?php 
													$i++;
												}
											endforeach; 
										?> 
									</span> 

									<?= (count($comments) > 0)? '<span><i class="far fa-comments"></i> <a href="#">'.count($comments).' '.Yii::t('app', 'blog_comments').'</a></span>' : '' ?> 
								</div>

								<span class="text-4 text-dark">
									<?= Yii::t('app', $blog['page_code_text']) ?>
								</span>

									<div class="post-block mt-5 post-share">
										<h4 class="mb-3">
											<?= Yii::t('app', 'blog_share') ?>
										</h4>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
										<div class="addthis_inline_share_toolbox"></div>
										<script type="text/javascript"
											src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60ba220dbab331b0"></script>

									</div>
									<?php if (!empty($arrUser)) { ?>
										<div class="post-block mt-4 pt-2 post-author">
											<h4 class="mb-3">
												<?= Yii::t('app', 'author') ?>
											</h4>
											<div class="img-thumbnail img-thumbnail-no-borders d-block pb-3  google-map-borders">
											<?php $urlParamsVal = ['site/blog', 
																		'username' => $arrUser['username']																								
																	];?>											
												<a href="<?= Url::toRoute($urlParamsVal)?>">
													<div class="img-thumbnail d-block">
														<img class="img-fluid" src="<?= $arrUser['path'].'80x80/'.$arrUser['image'] ?>" alt="">
													</div>
												</a>
											</div>
											<p>
												<strong class="name">
													<a href="<?= Url::toRoute($urlParamsVal)?>"  class="text-4 pb-2 pt-2 d-block">												
														<?= $arrUser['full_name'] ?>
													</a>
												</strong>
											</p>
											<p>
												<?= $arrUser['title'] ?>
											</p>
										</div>
									<?php } ?>

									<?= $this->render('blog-comments', ['modelComment' => $modelComment, 'blog_id' => $blog_id, 'comments' => $comments]) ?>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>


<!-- Sub Footer -->
<?= $this->render('/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->