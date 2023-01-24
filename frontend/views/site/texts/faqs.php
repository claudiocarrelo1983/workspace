<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\db\Query;

$this->title = "FAQ's";

$path2 = 'faqs';

?>

<!-- Banner -->

<?= $this->render('../banner',['path1' => 'Menu','path2' => $path2]); ?>

<!--End  Banner -->

    <div role="main" class="main">
        <div class="container py-4">
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        <?= Yii::t('app', 'faqs_title') ?>
                    </h2>
                    <p class="lead"><?= Yii::t('app', 'faqs_text') ?></p>

                    <hr class="solid my-5">

                    <div class="toggle toggle-primary m-0" data-plugin-toggle>
                        <?php foreach ($faqs as $key => $value): ?> 
                            <section class="toggle">
                                <a class="toggle-title toggle-title1"><?= Yii::t('app', $value['page_code_question']) ?></a>
                                <div class="toggle-content">
                                    <p><?=Yii::t('app', $value['page_code_answer']) ?></p>
                                </div>
                            </section>
                        <?php endforeach; ?>              
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- Sub Footer -->
<?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
       		