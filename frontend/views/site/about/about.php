<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrTeams = $model->getLastFileUploaded('team');  

$teams = array();

foreach($arrTeams as $team){
    if($team['location'] == 'about'){
        $teams[] = $team;
    }
}


/* @var $this yii\web\View */

$this->title = 'About Us';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'about_us';

?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<?php
/*
$database = Yii::$app->firebase->getDatabase();
$reference = $database->getReference('path/to/child/location');
$value = $reference->getValue();
*/

?>

<section id="intro" class="section section-no-border section-angled bg-light pt-0 pb-5 m-0">  
    <div class="container pb-2">
        <div class="col-lg-10 text-center offset-lg-1">
            <h2 class="font-weight-bold text-9 mb-0"><?= Yii::t('app', "about_block_title_1") ?></h2>
            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">
                <?= Yii::t('app', "about_block_subtitle_1") ?>      
            </p>
            <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">
                <?= Yii::t('app', "about_block_text_1") ?>  
            </p>
        </div>      
    </div>
</section>

<section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2">
                    <?= Yii::t('app', "about_block_title_2") ?> 
                </h2>
                <p class="lead">
                    <?= Yii::t('app', "about_block_subtitle_2") ?>
                </p>
                <p class="pe-5 me-5">
                    <?= Yii::t('app', "about_block_text_2") ?>
                </p>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5" style="top: 1.7rem;">
                <img src="images/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
                <img src="images/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
                <img src="images/generic/generic-corporate-3-3.jpg" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark border-0 m-0">
    <div class="container">    
        <div class="row my-5">
            <div class="col-lg-6 pe-5">
                <h2 class="text-color-light font-weight-normal text-6 mb-2 pb-1">
                    <?= Yii::t('app', "about_block_title_3") ?> 
                </h2>
                <p class="lead text-color-light opacity-6">
                    <?= Yii::t('app', "about_block_subtitle_3") ?> 
                </p>
                <p class="text-color-light opacity-6">
                    <?= Yii::t('app', "about_block_text_3") ?> 
                </p>               
            </div>
            <div class="col-lg-6">
                <div class="progress-bars mt-5">
                    <div class="progress-label">
                        <span>
                            <?= Yii::t('app', "about_block_stats_3_1") ?>
                        </span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="100%">
                            <span class="progress-bar-tooltip">100%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>
                            <?= Yii::t('app', "about_block_stats_3_2") ?>
                        </span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%" data-appear-animation-delay="300">
                            <span class="progress-bar-tooltip">85%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>
                            <?= Yii::t('app', "about_block_stats_3_3") ?>
                        </span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="75%" data-appear-animation-delay="600">
                            <span class="progress-bar-tooltip">75%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>
                            <?= Yii::t('app', "about_block_stats_3_4") ?>
                        </span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%" data-appear-animation-delay="900">
                            <span class="progress-bar-tooltip">85%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class=" section-default border-0  mt-5">
    <div class="container">
        <div class="row">
            <div class="col pb-4 text-center">
                <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2">
                    <?= Yii::t('app', "about_block_title_4") ?>
                </h2>
                <?= Yii::t('app', "about_block_text_4") ?>
            </div>
        </div>
        <div class="row pb-4 mb-2">
            <?php
                 $timer = 0;
            ?>
            <?php foreach ($teams as $key => $team): ?>         
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="<?= $timer ?>">
                    <span class="thumb-info-wrapper border-radius-0">
                        <a href="about-me.html">
                            <img class="img-fluid rounded-0 mb-2"  src="<?= $team['image'] ?>" alt="">
                            <h3 class="font-weight-bold text-color-dark text-4 mb-0"><?= $team['full_name'] ?></h3>
                            <p class="text-2 mb-0"><?= $team['title'] ?></p>
                        </a>
                    </span>
                    <span class="thumb-info-caption">
                        <span class="thumb-info-caption-text"><?= $team['text'] ?></span>
                        <span class="thumb-info-social-icons">
                            <?php

                                $found  = 0;                               

                                foreach($team as $keyt => $value){              

                                    if(!empty($value)){

                                        switch ($keyt) {
                                            case 'instagram':
                                            case 'facebook':
                                            case 'twitter':
                                            case 'pinterest': 
                                            case 'linkedin':
                                                echo  '<a class="m-1" target="_blank" href="'.$value.'"><i class="fab fa-'.$keyt.'"></i><span>'.ucfirst($keyt).'</span></a>';                                        
                                                break;                                        
                                            case 'web':
                                                echo '<a class="m-1" href="'.$value.'"><i class="icon-globe icons"></i><span>Linkedin</span></a>';
                                                
                                                break;
                                        }   
                                    }
                                }

                                $timer = bcadd( $timer,200);
                            ?>
                        </span>
                    </span>                   
                </div>              
            <?php endforeach; ?>
        </div>
    </div>
</section>
</div>	

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->

