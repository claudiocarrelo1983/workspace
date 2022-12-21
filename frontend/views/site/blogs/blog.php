<?php

use yii\helpers\Url;
use common\models\Blogs;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$tagsCategory = $model->getLastFileUploaded('blogs_category');  

$this->title = 'Blog';

$this->params['breadcrumbs'][] = $this->title;

$numberPerPage = 7;

//total blogs
$numberPosts = count($blogs);

//number of divisions
$numberOfDivisionsCeil = ceil(bcdiv($numberPosts, $numberPerPage, 2));

//last page
$numberOfDivisions = bcdiv($numberPosts, $numberPerPage);
$numberOfDivisions = bcmul($numberPerPage, $numberOfDivisions);

//number of last
$remainBlogs = bcsub($numberPosts, $numberOfDivisions);

$arrBlog = array();
$index = 1;
$numberPage = $numberPerPage;

$blogFilter = array();

foreach($blogs as $key => $blog){	
	
	if($numberPage == $key){	
		$index ++;
		$numberPage = bcadd($numberPerPage, $key);
	}
	$arrBlog[$index][] = $blog;
}



if(0 < $pg){	
	$arrBlogCeil =  (isset($arrBlog[$numberOfDivisionsCeil]) ? $arrBlog[$numberOfDivisionsCeil] : array());
	$arrBlog = (isset($arrBlog[$pg]) ? $arrBlog[$pg] : $arrBlogCeil);
}else{
	$arrBlog = (isset($arrBlog[1]) ? $arrBlog['1'] : $arrBlog);
}

$path2 = 'blog';

?>

<!-- Banner -->
<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<div class="container py-4 mb-4">
	<div class="row text-center pb-5">
		<div class="col-md-9 mx-md-auto">
			<div class="overflow-hidden mb-3">
				<h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
					<span>
						<?= Yii::t('app', "blog_block__1_title_1") ?>
					</span>
					<span class="word-rotator-words bg-primary">
						<b class="is-visible"><?= Yii::t('app', "blog_block__1_1") ?></b>
						<b><?= Yii::t('app', "blog_block__1_2") ?></b>
						<b><?= Yii::t('app', "blog_block__1_3") ?></b>
					</span>
					<span>
						<?= Yii::t('app', "blog_block__1_title_2") ?>
					</span>
				</h1>   
			</div>
			<div class="overflow-hidden mb-3">
				<p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
					<?= Yii::t('app', "blog_block_1_text") ?>
				</p>
			</div>
		</div>
	</div>
</div>

<div role="main" class="main">
	<div class="container py-4">
		<div class="row">
			<div class="col-lg-3 order-lg-2">
				<?= $this->render('blog-sidebar', ['urlParams' => $urlParams, '']); ?>					
			</div>		
			<div class="col-lg-9 order-lg-1">
				<div class="blog-posts">
					<?php foreach ($arrBlog as $key => $categories): ?>    
						
					<?php 
				
						$arrTags = explode(',', $categories['tags']); 
						$tagList = array();

						foreach($arrTags as $tag){	
							foreach($tagsCategory as $category){
								if($tag == $category['tag']){
									$tagList[] = $category;
								}
							}			
						}	
			

					?>

						<article class="post post-medium">
							<div class="row mb-3">
								<div class="col-lg-5">
									<div class="post-image">
										<a href="<?= Url::toRoute(['site/blog-single', 'id' => $categories['id']]); ?>">
											<img src="<?= $categories['image'] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="<?= Yii::t('app', $categories['alt']) ?>" />
										</a>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="post-content">
										<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
											<a href="<?= Url::toRoute(['site/blog-single', 'id' => $categories['id']]); ?>">
												<?= Yii::t('app', $categories['title']) ?>
											</a>
										</h2>
										<p class="mb-0">
											<?= Blogs::getWords( $categories['text'], 320); ?> [...]
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="post-meta">
										<span><i class="far fa-calendar-alt"></i><?= $categories['created_date'] ?> </span>
											<span><i class="far fa-user"></i> By
												<?php $urlParamsVal = ['site/blog', 
																		'username' => $categories['username']																								
																	];?>
												<a href="<?= Url::toRoute($urlParamsVal)?>">
													<?= $categories['username'] ?>
												</a>											
											</span>								
											<span>
												<i class="far fa-folder"></i>
												<?php 		
													$count = count($tagList);
													$i = 1;

													foreach ($tagList as  $key => $tags): 
														if(!empty($tags)){																	
															$comma = (($i == $count) ? '' : ',');		
															?>					
																<?php $urlParamsVal = ['site/blog', 									
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
										<span><i class="far fa-comments"></i> 
										
											<?php $urlParamsVal = ['site/blog-single', 
																	'id' => $categories['id']												
																];?>
																							
											<a href="<?= Url::toRoute($urlParamsVal); ?> ">12 <?= Yii::t('app', 'Comments') ?></a><?= $comma  ?>								
										</span>
										<span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0">
											<a href="<?= Url::toRoute(['site/blog-single', 'id' => $categories['id']]); ?>" class="btn btn-xs btn-light text-1 text-uppercase">
												<?= Yii::t('app', 'Read More') ?>
											</a>
										</span>
									</div>
								</div>
							</div>
						</article>      
					<?php endforeach; ?>
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
										<?php $urlParamsVal = ['site/blog', 
											'username' => $urlParams['username'],																
											'pg' =>  $x,
											'tag' =>  $urlParams['tag']														
										];?>	
										<a class="page-link" href="<?= Url::toRoute($urlParamsVal); ?>">
											<?= $x ?>
										</a>	
									</li>
								<?php else: ?>
									<li class="page-item <?= (($inc == '1' && $pg == '') ? 'active' : '') ?>">
										<?php $urlParamsVal = ['site/blog', 
											'username' => $urlParams['username'],																	
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
								<?php $urlParamsVal = ['site/blog', 
									'username' => $urlParams['username'],																	
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

</div>	

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->