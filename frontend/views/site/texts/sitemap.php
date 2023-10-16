<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use common\models\GeneratorJson;

$urlParamsVal = array();

$model = new GeneratorJson(); 
$menu = $model->getLastFileUploaded('other','calendar-menu');

$blogCategory = $model->getLastFileUploaded('blogs_category');

$path2 = 'sitemap';

?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<!--End  Banner -->


    <div role="main" class="main">
        <div class="container py-4">    
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                            <?= Yii::t('app', 'sitemap_title') ?>
                    </h2>
                </div>
            </div>
            <p class="lead"><?= Yii::t('app','sitemap_text') ?></p>
            <hr class="solid my-5">
            <div class="row">
                <div class="col">       
                    <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app','sitemap_menu') ?></h3>
                    <ul class="list list-icons list-icons-sm mb-4">
                        <li>
                            <a href="<?= Url::home() ?>"><i class="far fa-file"></i>
                                <?= Yii::t('app','sitemap_landing_pages') ?>
                            </a>
                        </li>
                        <li>
                            <h4 class="font-weight-bold text-3 mb-1 mt-2">Menu </h3>
                            <ul class="list list-icons list-icons-sm mb-3 text-2">
                                <?php foreach ($menu['menu'] as $menucategory): ?> 
                                    <li><a href="<?= Url::toRoute($menucategory['url']) ?>"><i class="far fa-file"></i><?= Yii::t('app', $menucategory['title']) ?></a></li>  
                                <?php endforeach; ?>  
                            </ul>
                        </li>            
                    </ul>
            
                
                </div>
                <!--
                    <div class="col-sm-3">
                        <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app','sitemap_blog_categories') ?></h3>
                        <ul class="list list-icons list-icons-sm mb-4">
                            <li>             
                                <ul class="list list-icons list-icons-sm mb-3 text-2">
                                    <?php foreach ($blogCategory as $key => $subcategory): ?> 
                                
                                        <li>
                                            <a href="<?= Url::toRoute(['site/blog','tag' => $subcategory['tag']]); ?>">
                                                <i class="far fa-file"></i><?= $subcategory['description'] ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>  
                                </ul>
                            </li>            
                        </ul>
                    </div>
                -->
                <div class="col">
                    <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app','sitemap_login_pages') ?></h3>
                    <ul class="list list-icons list-icons-sm mb-4">
                        <li>                     
                            <ul class="list list-icons list-icons-sm mb-3 text-2">
                                <li><a href="<?= Url::toRoute('site/login') ?>"><i class="far fa-file"></i><?= Yii::t('app','login') ?></a></li>
                                <li><a href="<?= Url::toRoute('site/signup') ?>"><i class="far fa-file"></i><?= Yii::t('app','register') ?></a></li>             
                                <li><a href="<?= Url::toRoute('site/request-password-reset') ?>"><i class="far fa-file"></i><?= Yii::t('app','recover_password') ?></a></li>                          
                            </ul>
                        </li>
                    </ul>      
                </div>   
                <div class="col">
                    <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app','sitemap_other_pages') ?></h3>
                    <ul class="list list-icons list-icons-sm mb-4">
                        <li>
                        
                            <ul class="list list-icons list-icons-sm mb-3 text-2">
                                <li><a href="<?= Url::toRoute('site/faqs') ?>"><i class="far fa-file"></i><?= Yii::t('app','footer_category_usefull_links_faqs') ?></a></li>
                                <li><a href="<?= Url::toRoute('site/privacy-policy') ?>"><i class="far fa-file"></i><?= Yii::t('app','footer_category_usefull_links_privacy_policy') ?></a></li>
                                <li><a href="<?= Url::toRoute('site/coockies') ?>"><i class="far fa-file"></i><?= Yii::t('app','footer_category_usefull_links_coockies') ?></a></li>
                                <li><a href="<?= Url::toRoute('site/gdpr') ?>"><i class="far fa-file"></i><?= Yii::t('app','footer_category_usefull_links_gdpr') ?></a></li>
                                <li><a href="<?= Url::toRoute('site/404') ?>"><i class="far fa-file"></i>404</a></li>
                            </ul>
                        </li>
                    </ul>      
                </div>      
            </div>
        </div>
    </div>
</div>
<!-- Sub Footer -->
    <?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
