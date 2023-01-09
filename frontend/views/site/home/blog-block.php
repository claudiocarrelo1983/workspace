<?php

use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$blog = $model->getLastFileUploaded('blogs');  

$tagsCategory = $model->getLastFileUploaded('blogs_category'); 

?>

<hr class="solid ">
    <div class="row pb-4 my-5">  
        <div class="col text-center">
            <h2 class="font-weight-bold mb-0"><?= Yii::t('app', "home_block_11_blog_title") ?></h2>
            <p class="lead text-4 pt-2 font-weight-normal">
                <?= Yii::t('app', "home_block_11_blog_subtitle") ?>
            </p>
        </div> 
    </div>

    <?php 

    $i =  1;
    
    foreach ($blog as $key => $categories): ?>         

    <?php if($i == 1): ?>

    <div class="col-lg-7 mb-4 pb-2">
        <a href="<?= Url::toRoute(['site/blog-single', 'id' => $categories['id']]); ?>">
            <article class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                    <img src="<?= $categories['image'] ?>" class="img-fluid" alt="<?= $categories['alt'] ?>">
                    <div class="thumb-info-title bg-transparent p-4">
                        <div class="thumb-info-type bg-color-dark px-2 mb-1"><?= $categories['subtitle'] ?></div>
                        <div class="thumb-info-inner mt-1">
                            <h2 class="font-weight-bold text-color-light line-height-2 text-5 mb-0"><?= $categories['title'] ?></h2>
                        </div>
                        <div class="thumb-info-show-more-content">
                            <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5"><?= $categories['text'] ?></p>
                        </div>
                    </div>
                </div>
            </article>
        </a>
    </div>
    <div class="col-lg-5">
    <?php elseif($i <= 4): ?>

        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
            <div class="row align-items-center pb-1">
                <div class="col-sm-5">
                    <a href="<?= Url::toRoute(['site/blog-single', 'id' => $categories['id']]); ?>">
                        <img src="<?= $categories['image'] ?>" class="img-fluid border-radius-0" alt="Simple Ways to Have a Pretty Face">
                    </a>
                </div>
                <div class="col-sm-7 ps-sm-1">
                    <div class="thumb-info-caption-text">
                	
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
                    
                    <?php 		
                        $count = count($tagList);
                        $inc = 1;
                     
                        foreach ($tagList as  $key => $tags):                             
                            if(!empty($tags)){																	
                                $comma = (($inc == $count) ? '' : ',');		
                                ?>					
                                    <?php $urlParamsVal = ['site/blog', 									
                                        'username' => '#',																
                                        'tag' => $tags['tag'],													
                                    ];?>
                                                                
                                    <div class="thumb-info-type text-light text-uppercase d-inline-block bg-color-dark px-2 m-0 mb-1 float-none">						
                                        <a href="<?= Url::toRoute(['site/blog', 'category' => $tags['tag']]); ?>" class="text-decoration-none text-color-light -5"><?= $tags['description'] ?></a> 	
                                    </div>								
                                <?php 
                                $inc++;
                            }
                        endforeach; 
               
                    ?>  
 
                        <h2 class="d-block line-height-2 text-4 text-dark font-weight-bold mt-1 mb-0">
                            <a href="<?= Url::toRoute(['site/blog-single', 'id' => $key]); ?>" class="text-decoration-none text-color-dark text-color-hover-primary"><?= $categories['title'] ?></a>
                        </h2>
                    </div>
                </div>
            </div>
        </article>

    <?= (($i == 4) ? '</div>': '') ?>
    <?php endif; ?>            
                 
    <?php 
    $i++;
    endforeach; 
    ?>
</div>
