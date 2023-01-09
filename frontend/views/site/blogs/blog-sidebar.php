<?php

use yii\helpers\Url;
use yii\db\Query;
use common\models\Blogs;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('blogs_category');  

$structure  = Blogs::blogTags($structure);

$currentUrl = Yii::$app->controller->route;

$query = new Query;


?>

<aside class="sidebar">
    <form action="page-search-results.html" method="get">
        <div class="input-group mb-3 pb-1">
            <input class="form-control text-1" placeholder="<?= Yii::t('app', "blog_block_search") ?>" name="s" id="s" type="text">
            <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
        </div>
    </form>
    <h5 class="font-weight-semi-bold pt-4">
        <?= Yii::t('app', "blog_block_categories") ?>
    </h5>
    <ul class="nav nav-list flex-column mb-5">
        <li class="nav-item">
            <a class="nav-link" href="<?= Url::toRoute(['site/blog']); ?>">
                <?= Yii::t('app', "blog_block_all") ?>
            </a>
        </li>
            <?php foreach ($structure as $key => $categories): ?>           

            <?php $count = (isset($categories['submenu']) ? count($categories['submenu']) : 0); ?>

            <li class="nav-item">

                <?php

                    $url = '';

                    $urlParamsVal = ['site/blog', 
                                            'username' => '#',																
                                            'tag' => $categories['tag'],													
                                        ];

                    if(empty($categories['submenu'])){                     
                        $url = 'href="'.Url::toRoute($urlParamsVal).'"';
                    }

                    

                ?>
                <a class="nav-link" onclick="BlogToogle(<?= $key ?>);" <?= $url ?>><?= Yii::t('app',$categories['page_code']) ?> <?= (($count == 0) ? '' :  '('.$count.')') ?></a>  
                
                <ul id="dropdown-menu<?= $key ?>" style="display:none;">
                <?php 
                if($count > 0){
                    foreach ($categories['submenu'] as  $subcategory): 
                ?>
                	<?php $urlParamsVal = ['site/blog', 
                                            'username' => '#',																
                                            'pg' => $urlParams['pg'],
                                            'tag' => $subcategory['tag'],													
                                        ];?>

                    <li class="nav-item"><a class="nav-link" href="<?= Url::toRoute($urlParamsVal); ?>"><?= Yii::t('app',$subcategory['page_code']) ?></a></li>
                <?php 
                    endforeach; 
                }?>  
                </ul>  
            </li>                    
        
        <?php endforeach; ?>      
    </ul>

    <div class="tabs tabs-dark mb-4 pb-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-bs-toggle="tab">
                    <?= Yii::t('app', "blog_block_popular") ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
                    <?= Yii::t('app', "blog_block_categories") ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts">
                <?= $this->render('blog-sidebar-popular'); ?>	
            </div>
            <div class="tab-pane" id="recentPosts">
                <?= $this->render('blog-sidebar-recent'); ?>	
            </div>
        </div>
    </div>
</aside>