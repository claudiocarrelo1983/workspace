<?php

/* @var $this yii\web\View */

use yii\db\Query;

$this->title = 'Privacy Policy';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'privacy';
?>

<?= $this->render('../banner',['path1' => 'Menu','path2' => $path2]); ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?= Yii::t('app', 'title_'.$path2) ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">            
                        <div class="post-content ms-0">   
                            <p>                
                                <?= Yii::t('app', 'text_privacy') ?>
                            </p> 
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sub Footer -->
<?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->

<?= $this->render('/site/footer', ['modelSubscriber' => $modelSubscriber]); ?>