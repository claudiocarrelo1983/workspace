<?php

use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$blogs = $model->getLastFileUploaded('recipes');  

shuffle($blogs);

$blogsArr = array();

foreach($blogs as $key => $blog){
    $blogsArr[] =  $blog;

    if($key >= 3){
        break;
    }
}

?>
<ul class="simple-post-list">
    <?php foreach ($blogsArr as $key => $categories): ?>   
        <?php 
            $timestamp = strtotime($categories['created_date']);        
            $urlParamsVal = ['site/recipe-single', 														
                'id' => $categories['id'],													
            ];
        ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">                      
                        <a href="<?= str_replace('/frontend/web', '',Url::toRoute($urlParamsVal)); ?>">
                            <img src="<?= $categories['image'] ?>"  height="50" alt=" <?= Yii::t('app', $categories['recipe_code_title']) ?> ">
                        </a>
                    </div>
                </div>
                <div class="post-info">              
                    <a href="<?= str_replace('/frontend/web', '',Url::toRoute($urlParamsVal)); ?>">
                        <?= Yii::t('app', $categories['recipe_code_title']) ?> 
                    </a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>