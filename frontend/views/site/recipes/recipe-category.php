<?php

use yii\helpers\Url;
use yii\db\Query;
use common\models\Recipes;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('recipes_category');

$structure  = Recipes::recipeTags($structure);

$currentUrl = Yii::$app->controller->route;

$query = new Query;


?>

<aside class="sidebar">
    <h5 class="font-weight-semi-bold pt-4">
        <?= Yii::t('app', "recipes_block_categories") ?>
    </h5>
    <ul class="nav nav-list flex-column mb-5">
        <li class="nav-item">
            <a class="nav-link" href="<?= Url::toRoute(['site/blog']); ?>">
                <?= Yii::t('app', "recipes_block_all") ?>
            </a>
        </li>
            <?php foreach ($structure as $key => $categories): ?>        
        

            <?php $count = (isset($categories['submenu']) ? count($categories['submenu']) : 0); ?>

            <li class="nav-item">

                <?php

                    $url = '';

                    $urlParamsVal = ['site/recipes', 
                                            'username' => '#',																
                                            'tag' => $categories['recipe_cat_code'],													
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
                                           // 'pg' => $urlParams['pg'],
                                            'tag' => $subcategory['recipe_cat_code'],													
                                        ];?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute($urlParamsVal); ?>">
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
</aside>