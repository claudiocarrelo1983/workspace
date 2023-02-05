<?php

use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$blogs = $model->getLastFileUploaded('blogs');  

shuffle($blogs);

$blogsArr = array();

foreach($blogs as $key => $blog){
    $blogsArr[] =  $blog;

    if($key >= 4){
        break;
    }
}



?>
<ul class="simple-post-list">
    <?php foreach ($blogsArr as $key => $categories): ?>   
        <?php 
            $timestamp = strtotime($categories['created_date']);        
            $urlParamsVal = ['site/blog-single', 														
                'id' => $categories['id'],													
            ];
        ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">                      
                        <a href="<?= Url::toRoute($urlParamsVal); ?>">
                            <img src="<?= $categories['path'].'90x50/'.$categories['image'] ?>" height="50" alt="<?= $categories['alt'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">              
                    <a href="<?= Url::toRoute($urlParamsVal); ?>">
                        <?= Yii::t('app', $categories['page_code_title'])  ?>
                    </a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>