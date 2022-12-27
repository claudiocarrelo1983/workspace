<?php

use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$recipes = $model->getLastFileUploaded('recipes');  

shuffle($recipes);

$recipesArr = array();

foreach($recipes as $key => $recipes){
    $recipesArr[] =  $recipes;

    if($key >= 10){
        break;
    }
}



?>
<ul class="simple-post-list">
    <?php foreach ($recipesArr as $key => $categories): ?>   
        <?php 
            $timestamp = strtotime($categories['created_date']);        
            $urlParamsVal = ['site/recipes-single', 														
                'id' => $categories['id'],													
            ];
        ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">                      
                        <a href="<?= Url::toRoute($urlParamsVal); ?>">
                            <img src="<?= $categories['image'] ?>" width="50" height="50" alt="<?= $categories['alt'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">              
                    <a href="<?= Url::toRoute($urlParamsVal); ?>">
                        <?= $categories['title'] ?>
                    </a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>