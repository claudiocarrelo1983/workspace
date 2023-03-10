<?php

use yii\helpers\Url;
use yii\db\Query;
use common\models\Recipes;
use common\models\RecipesCategory;
use common\models\GeneratorJson;

$recipesCat = new RecipesCategory();
$arrResult = $recipesCat::organizeRecipesCategories();

$currentUrl = Yii::$app->controller->route;

$query = new Query;


?>

<aside class="sidebar">
    <!--
        <form action="page-search-results.html" method="get">
            <div class="input-group mb-3 pb-1">
                <input class="form-control text-1" placeholder="<?= Yii::t('app', "recipes_block_search") ?>" name="s" id="s" type="text">
                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
            </div>
        </form>
    -->
    <h5 class="font-weight-semi-bold pt-4">
        <?= Yii::t('app', "recipes_block_categories") ?>
    </h5>
    <ul class="nav nav-list flex-column mb-5">
        <li class="nav-item">
            <a class="nav-link" href="<?= str_replace('/frontend/web', '',Url::toRoute(['site/recipes'])); ?>">
                <?= Yii::t('app', "recipes_block_all") ?>
            </a>
        </li>
            <?php foreach ($arrResult as $key => $categories): ?>        
        

            <?php $count = (isset($categories['submenu']) ? count($categories['submenu']) : 0); ?>

            <li class="nav-item">

                <?php

                    $url = '';

                    $urlParamsVal = ['site/recipes', 
                                            'pg' => $urlParams['pg'],											
                                            'tag' => $categories['recipe_cat_code'],													
                                        ];

                    if(empty($categories['submenu'])){                     
                        $url = 'href="'.str_replace('/frontend/web', '',Url::toRoute($urlParamsVal)).'"';
                    }

                ?>
                <a class="nav-link" onclick="BlogToogle(<?= $key ?>);" <?= $url ?>><?= Yii::t('app',$categories['page_code']) ?> <?= (($count == 0) ? '' :  '('.$count.')') ?></a>  
                
                <ul id="dropdown-menu<?= $key ?>" style="display:none;">
                <?php 
                if($count > 0){
                    foreach ($categories['submenu'] as  $subcategory): 
                ?>
                	<?php $urlParamsVal = ['site/recipes',                                            															
                                            'pg' => $urlParams['pg'],
                                            'tag' => $subcategory['recipe_cat_code'],													
                                        ];?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= str_replace('/frontend/web', '',Url::toRoute($urlParamsVal)); ?>">
                            <?= Yii::t('app',$subcategory['page_code']) ?>
                        </a>
                    </li>
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
                    <?= Yii::t('app', "recipes_block_popular") ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-bs-toggle="tab">
                    <?= Yii::t('app', "recipes_block_categories") ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="popularPosts">
                <?= $this->render('recipes-sidebar-popular'); ?>	
            </div>
            <div class="tab-pane" id="recentPosts">
                <?= $this->render('recipes-sidebar-recent'); ?>	
            </div>
        </div>
    </div>
</aside>