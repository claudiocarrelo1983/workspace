<?php

use common\models\GeneratorJson;
use yii\helpers\Url;

$model = new GeneratorJson(); 
$blogs = $model->getLastFileUploaded('recipes');  

$blogsArr = array();

foreach(array_reverse($blogs) as $key => $blog){
    $blogsArr[] =  $blog;

    if($key >= 10){
        break;
    }
}
?>

<ul class="simple-post-list">
    <?php foreach($blogsArr as $key => $categories): ?>   
            <?php 
                $timestamp = strtotime($categories['created_date']);        
                $urlParamsVal = ['site/recipe-single', 														
                    'id' => $categories['id'],													
                ];
            ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                        <a href="<?= Url::toRoute($urlParamsVal); ?>">
                            <img src="<?= $categories['image'] ?>" width="50" height="50" alt=" <?= Yii::t('app', $categories['recipe_code_title']) ?> ">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="<?= Url::toRoute($urlParamsVal); ?>">                   
                        <?= Yii::t('app', $categories['recipe_code_title']) ?> 
                    </a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>