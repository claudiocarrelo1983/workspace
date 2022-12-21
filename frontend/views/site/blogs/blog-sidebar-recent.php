<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$blogs = $model->getLastFileUploaded('blogs');  

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

 
        ?> 
            <li>
                <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                        <a href="blog-post.html">
                            <img src="<?= $categories['image'] ?>" width="50" height="50" alt="<?= $categories['alt'] ?>">
                        </a>
                    </div>
                </div>
                <div class="post-info">
                    <a href="blog-post.html"><?= $categories['title'] ?></a>
                    <div class="post-meta">
                        <?= date('M', $timestamp) ?> <?= date('d', $timestamp) ?>, <?= date('Y', $timestamp) ?>
                    </div>        
                </div>
            </li>
    <?php endforeach; ?>       
</ul>