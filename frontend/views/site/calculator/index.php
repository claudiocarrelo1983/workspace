<?php

use common\models\GeneratorJson;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('other','public-menu');


$calcArr = [];

if(isset($structure['menu'])){
    foreach($structure['menu'] as $menu){
        if($menu['key'] == 't-calculators'){
            $calcArr = $menu['submenu'];
            break;
        }
    }    
}

/* @var $this yii\web\View */

$this->title = 'Calculators';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'calculatores';
?>

<?= $this->render('/layouts/public_header'); ?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>


<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-2 m-0">  
    <div class="container pb-2">
        <div class="col-lg-10 text-center offset-lg-1">
            <h2 class="font-weight-bold text-9 mb-0"><?= Yii::t('app', "calculators_block_title_1") ?></h2>
            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-2">
                <?= Yii::t('app', "calculators_block_subtitle_1") ?>      
            </p>
            <p class="text-5 text-color-default negative-ls-05 pb-4 mb-5">
                <?= Yii::t('app', "calculators_block_text_1") ?>  
            </p>
        </div>      
    </div>
</section>

<div class="container">
        <?php $i = 1; ?>
        <?php foreach($calcArr as $key => $value) {
                $name = str_replace('t-','',$value['key']);
                $url = $value['url'];
            ?>
            <section class="call-to-action with-full-borders mb-5">
                <div class="col-sm-9 col-lg-9">
                    <div class="call-to-action-content">
                        <h3>
                            <strong>
                                 <?= Yii::t('app', "calculators_title_1_".$name) ?>
                            </strong>
                        </h3>
                        <p class="mb-0">
                            <?= Yii::t('app', "calculators_block_title_1") ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="call-to-action-btn">
                        <?= Html::a(
                            Yii::t('app', 'calculators_go_to'), 
                            Url::toRoute($url),     
                                [
                                'class' => 'btn btn-modern text-2 btn-primary'
                                ]      
                        ) ?>                        
                    </div>
                </div>
            </section>

        <?php } ?>
    </div>

</div>

</div>

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
