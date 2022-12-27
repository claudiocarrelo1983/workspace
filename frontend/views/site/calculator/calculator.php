
<?php

use yii\helpers\Url;
/* @var $this yii\web\View */
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('other','public-menu');

$arrCalculator = [];

if(isset($structure['menu'])){
    foreach($structure['menu'] as $value){

        if(isset($value['title'])){
            if($value['title'] == 'menu_calculators'){
                if (isset($value['submenu'])) {
                    $arrCalculator = $value['submenu'];
                    break;               
                }
            }
        }      
    }
}



$this->title = 'About Us';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'calculators';

?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>



    <section id="intro" class="section section-no-border section-angled bg-light pt-0 m-0">  
        <div class="container pb-2">
            <div class="col-lg-10 text-center offset-lg-1">
                <h2 class="font-weight-bold text-9 mb-0"><?= Yii::t('app', "about_block_title_1") ?></h2>
                <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">
                    <?= Yii::t('app', "calculators_block_subtitle_1") ?>      
                </p>
                <p class="text-1rem text-color-default negative-ls-05 pt-3">
                    <?= Yii::t('app', "calculators_block_text_1") ?>  
                </p>
            </div>      
        </div>
    </section> 

    <div class="container">

        <?php foreach ($arrCalculator as $key => $fields): ?>   
        <?php $id = str_replace("t-", "", $fields['key']); ?>
        <section class="call-to-action with-borders button-centered mb-5">
            <div class="col-12">
                <div class="call-to-action-content">
                    <h3>
                        <?= Yii::t('app', "calculators_box_title_". $id) ?>  
                    </h3>
                    <p class="mb-0">
                        <?= Yii::t('app', "calculators_box_text_". $id) ?>  
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="call-to-action-btn">
                    <a href="<?= Url::toRoute($fields['url']) ?>" target="_blank" class="btn btn-modern text-2 btn-primary">
                        <?=  Yii::t('app', "calculator_read_more") ?>
                    </a>
                </div>
            </div>
        </section>

        <hr class="solid my-5">
        <?php endforeach ?>      
    </div>
</div>


<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->


<!--  Footer -->
<?= $this->render('../footer',
     [           
        'modelFooter' =>  $modelFooter   
    ]) ?>	
<!--  Footer -->