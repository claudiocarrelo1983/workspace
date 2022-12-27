<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$recipesArr = $model->getLastFileUploaded('blogs');

$recipes = array();

foreach(array_reverse($recipesArr) as $key => $recipes){
    $recipes[] =  $recipes;

    if($key >= 10){
        break;
    }
}

print "<pre>";
print_R($recipes);
die();
?>
<ul class="simple-post-list">
    <?php foreach($recipesArr as $key => $categories): ?>   
        <?php 
        $timestamp = strtotime($categories['created_date']);

 
        ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                        <a href="recipes-post.html">
                            <img src="<?= $categories['image'] ?>" width="50" height="50" alt="<?= $categories['alt'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="recipes-post.html"><?= $categories['title'] ?></a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>