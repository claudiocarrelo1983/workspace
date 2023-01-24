<?php

use yii\helpers\Json;
use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrTeams = $model->getLastFileUploaded('team');  

$teams = array();

foreach($arrTeams as $team){
    if($team['location'] == 'home'){
        $teams[] = $team;
    }
}


//$json = file_get_contents(Yii::$app->basePath.'\web\json\public-menu.json');
//$structure = Json::decode($json);

$currentUrl = Yii::$app->controller->route;

$this->title = 'Home';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'home';
?>

<!-- Banner -->
<?= $this->render('../banner',['path1' => 'Menu','path2' => $path2]); ?>
<!--End  Banner -->

<div role="main" class="main">
    <div class="container">
        <section class="call-to-action featured featured-primary mb-5">
            <div class="col-sm-9 col-lg-9">
                <div class="call-to-action-content">
                    <h3>
                        <?= Yii::t('app','home_block_title_1') ?>
                    </h3>
                    <p class="mb-0">
                        <?= Yii::t('app', 'home_block_text_1') ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="call-to-action-btn">
                    <a href="<?= Url::toRoute('/site/signup') ?>" target="_blank" class="btn btn-modern text-2 btn-primary">
                        <?= Yii::t('app', 'home_block_button_1') ?>
                    </a>
                </div>
            </div>
        </section>

        <div class="row pt-5">
            <div class="col">
                <div class="row text-center pb-5">
                    <div class="col-md-9 mx-md-auto">
                        <div class="overflow-hidden mb-3">
                            <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                <span><?= Yii::t('app', "home_block_title_2_1") ?></span>
                                <span class="word-rotator-words bg-primary">
                                    <b class="is-visible"><?= Yii::t('app', 'Shedduling') ?></b>
                                    <b><?= Yii::t('app', 'home_block_title_2_2_1') ?></b>
                                    <b><?= Yii::t('app', 'home_block_title_2_2_2') ?></b>
                                    <b><?= Yii::t('app', 'home_block_title_2_2_3') ?></b>
                                </span>
                                <span><?= Yii::t('app', 'home_block_title_2_3') ?></span>
                            </h1>   
                        </div>
                        <div class="overflow-hidden mb-3">
                            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                                <?= Yii::t('app', 'home_block_text_2') ?>
                            </p>
                        </div>
                    </div>
                </div>             
            </div>
        </div>

        <hr class="solid mt-5">    

        <div class="row">
            <div class="col-lg-4 col-sm-6  mt-5">
                <div class="featured-box featured-box-primary featured-box-effect-2">
                    <div class="box-content box-content-border-bottom">
                        <i class="icon-featured far fa-bookmark"></i>
                        <h4 class="font-weight-normal text-5 mt-3"><?= Yii::t('app', 'home_block_title_3_1') ?></h4>
                        <p class="mb-2 mt-2 text-2"><?= Yii::t('app', 'home_block_text_3_1') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt-5">
                <div class="featured-box featured-box-primary featured-box-effect-2">
                    <div class="box-content box-content-border-bottom">
                        <i class="icon-featured far fa-file-alt"></i>
                        <h4 class="font-weight-normal text-5 mt-3"><?= Yii::t('app', 'home_block_title_3_2') ?></h4>
                        <p class="mb-2 mt-2 text-2"><?= Yii::t('app', 'home_block_text_3_2') ?></p>
                    </div>
                </div>
            </div>        
            <div class="col-lg-4 col-sm-6 mt-5">
                <div class="featured-box featured-box-primary featured-box-effect-2">
                    <div class="box-content box-content-border-bottom">
                        <i class="icon-featured far fa-calendar"></i>
                        <h4 class="font-weight-normal text-5 mt-3"><?= Yii::t('app', 'home_block_title_3_3') ?></h4>
                        <p class="mb-2 mt-2 text-2"><?= Yii::t('app', 'home_block_text_3_3') ?></p>
                    </div>
                </div>
            </div>
        </div>   


        <section id="overview">
            <div class="container pt-lg-5">
                <div class="row pt-lg-5">
                    <div class="col-lg-8 text-center text-lg-start pt-5 mt-5">
                        <h2 class="text-color-primary positive-ls-3 mt-lg-5 pt-lg-5 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">
                            <?= Yii::t('app', 'home_block_text_4_download_it') ?>
                        </h2>
                        <h1 class="custom-font-size-1 text-color-dark font-weight-bold py-3 mb-1 p-relative appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}"><span class="p-relative z-index-1">
                            <?= Yii::t('app', 'home_block_text_4_mobile_app') ?>
                            </span><span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">
                                <?= Yii::t('app', 'home_block_text_4_app') ?>
                            </span>
                        </h1>

                        <p class="text-4-5 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">
                            <?= Yii::t('app', 'home_block_text_4_subtitle') ?>
                        </p>

                        <a href="#" class="btn btn-secondary positive-ls-2 btn-outline font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">
                            <?= Yii::t('app', 'home_block_text_4_read_more') ?>
                        </a>
                    </div>
                    <div class="col-lg-4 pt-5 pt-lg-0 text-center">

                        <div class="custom-carousel-1 m-auto">
                            <div class="owl-carousel owl-theme stage-margin nav-style-1 " data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 45, 'autoplay': true, 'autoplayTimeout': 3000}">
                                <div>
                                    <img alt="" class="img-fluid" src="images/generic/screens/screen-4.jpg">
                                </div>
                                <div>
                                    <img alt="" class="img-fluid" src="images/generic/screens/screen-1.jpg">
                                </div>
                                <div>
                                    <img alt="" class="img-fluid" src="images/generic/screens/screen-2.jpg">
                                </div>
                                <div>
                                    <img alt="" class="img-fluid" src="images/generic/screens/screen-3.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
    <section class="section section-default section-with-divider mb-0">
					<div class="divider divider-solid divider-style-4">
						<i class="fas fa-chevron-down"></i>
					</div>
					<div class="container">
						<div class="row">
							<div class="col">
								<h4 class="mb-3">With Divider</h4>
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eros ipsum, facilisis eget scelerisque non, fermentum at tellus.</p>
							</div>
						</div>
					</div>
				</section>
    <hr class="my-5">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="row text-center pb-2">
                    <div class="col-md-9 mx-md-auto">
                        <div class="overflow-hidden mb-3">
                            <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                <span><?= Yii::t('app', "home_block_6_title") ?></span>
                                <span class="word-rotator-words bg-primary">
                                    <b class="is-visible"><?= Yii::t('app', "home_block_6_title_1") ?></b>
                                    <b><?= Yii::t('app', "home_block_6_title_2") ?></b>
                                    <b><?= Yii::t('app', "home_block_6_title_3") ?> </b>
                                </span>                           
                            </h1>   
                        </div>
                        <div class="overflow-hidden mb-3">
                            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                                <?= Yii::t('app', 'home_block_6_subtitle') ?>                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 pe-lg-5">
                <img alt="" class="img-fluid rounded mb-5" src="images/generic/laptop.jpg">
                <h3 class="font-weight-bold text-8 line-height-2 text-transform-none mb-3"><?= Yii::t('app','home_block_7_control_panel') ?> </h3>

                <p class="text-4 line-height-6 py-2 ">
                     <?= Yii::t('app', 'home_block_7_text') ?>
                </p>
                <a href="<?= Url::toRoute('/site/services') ?>" class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-5 mt-2">
                    <?= Yii::t('app', 'home_block_7_get_started') ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-3" style="padding-top: 120px;">
                <div class="card border-radius-2 bg-color-light box-shadow-1 mb-4">
                    <div class="card-body p-relative zindex-1">
                        <div class="feature-box feature-box-primary text-center d-flex flex-column align-items-center">
                            <div class="feature-box-icon border-radius-2 mb-3 w-auto h-auto p-4 text-5">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="feature-box-info p-0 mt-2">
                                <h4 class="mb-2">
                                    <?= Yii::t('app', 'home_block_7_title_secure') ?>                      
                                </h4>
                                <p class="mb-0">
                                    <?= Yii::t('app', 'home_block_7_subtitle_secure') ?>  
                                </p>
                                <a href="<?= Url::toRoute('/site/services') ?>" class="read-more text-color-primary font-weight-semibold mt-2 text-2">
                                    <?= Yii::t('app', "home_block_7_read_more") ?>   
                                    <i class="fas fa-angle-right position-relative top-1 ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-radius-2 bg-color-light box-shadow-1 mb-4">
                    <div class="card-body p-relative zindex-1">
                        <div class="feature-box feature-box-primary text-center d-flex flex-column align-items-center">
                            <div class="feature-box-icon border-radius-2 mb-3 w-auto h-auto p-4 text-5">
                                <i class="far fa-file-alt"></i>
                            </div>
                            <div class="feature-box-info p-0 mt-2">
                                <h4 class="mb-2">
                                    <?= Yii::t('app', 'home_block_7_title_bulk_email') ?>
                                </h4>
                                <p class="mb-0">
                                    <?= Yii::t('app', 'home_block_7_subtitle_bulk_email') ?>                              
                                </p>
                                <a href="/" class="read-more text-color-primary font-weight-semibold mt-2 text-2">                                    
                                    <?= Yii::t('app', "home_block_7_read_more") ?> 
                                    <i class="fas fa-angle-right position-relative top-1 ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card border-radius-2 bg-color-light box-shadow-1 mb-4">
                    <div class="card-body p-relative zindex-1">
                        <div class="feature-box feature-box-primary text-center d-flex flex-column align-items-center">
                            <div class="feature-box-icon border-radius-2 mb-3 w-auto h-auto p-4 text-5">
                                <i class="far fa-star"></i>
                            </div>
                            <div class="feature-box-info p-0 mt-2">
                                <h4 class="mb-2">
                                    <?= Yii::t('app', "home_block_7_title_easy") ?>                                  
                                </h4>
                                <p class="mb-0">
                                    <?= Yii::t('app', "home_block_7_subtitle_easy") ?>    
                                </p>
                                <a href="/" class="read-more text-color-primary font-weight-semibold mt-2 text-2">
                                    <?= Yii::t('app', "home_block_7_read_more") ?>    
                                    <i class="fas fa-angle-right position-relative top-1 ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-radius-2 bg-color-light box-shadow-1 mb-4">
                    <div class="card-body p-relative zindex-1">
                        <div class="feature-box feature-box-primary text-center d-flex flex-column align-items-center">
                            <div class="feature-box-icon border-radius-2 mb-3 w-auto h-auto p-4 text-5">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="feature-box-info p-0 mt-2">
                                <h4 class="mb-2">
                                    <?= Yii::t('app', "home_block_7_title_customizable") ?>
                                </h4>
                                <p class="mb-0">
                                    <?= Yii::t('app', "Ability to create a custom page for your team with there own colors, logo and links to social media. ") ?>
                                </p>
                                    <a href="/" class="read-more text-color-primary font-weight-semibold mt-2 text-2">
                                        <?= Yii::t('app', "home_block_7_read_more") ?>
                                        <i class="fas fa-angle-right position-relative top-1 ms-1"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section section-primary border-0 mb-0 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': -150}">
        <div class="container">
            <div class="row counters counters-sm pb-4 pt-3">
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-organization text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="87">0</strong>
                        <label class="text-4 mt-1 text-color-light"><?= Yii::t('app', "home_block_8_features") ?></label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-star text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="5">0</strong>
                        <label class="text-4 mt-1 text-color-light"><?= Yii::t('app', "home_block_8_make_it_better") ?></label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                    <div class="counter">
                        <i class="icons icon-graph text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="100" data-append="%">0</strong>
                        <label class="text-4 mt-1 text-color-light"><?= Yii::t('app', "home_block_8_boost") ?></label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter">
                        <i class="icons icon-directions text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="5">0</strong>
                        <label class="text-4 mt-1 text-color-light"><?= Yii::t('app', "home_block_8_countries") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </section>   


</div>

<div class="container">
    <div class="row ">
    <?= $this->render('blog-block') ?>	
    </div>
</div>
</div>	

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
       		






