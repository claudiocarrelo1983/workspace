<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\db\Query;

$this->title = 'Pricing';

$this->params['breadcrumbs'][] = $this->title;

$standard = 0;
$professional = 0;
$enterprise = 0;

foreach($pricing  as $default){

    if($default['key'] == 'euro'){
        $standard = $default['standard'];
        $professional = $default['professional'];
        $enterprise = $default['enterprise'];
        break;
    }
}

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/pricing.js');

$path2 = 'pricing';

?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<!--End  Banner -->

<div class="container-fluid">
    <div class="container py-4 mb-4">
        <div class="row text-center pb-5">
            <div class="col-md-9 mx-md-auto">
                <div class="overflow-hidden mb-3">
                    <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                        <span><?= Yii::t('app', "pricing_block_1_title") ?></span>
                        <span class="word-rotator-words bg-primary">
                            <b class="is-visible"><?= Yii::t('app', 'pricing_block_1_title_1') ?></b>
                            <b><?= Yii::t('app', 'pricing_block_1_title_2') ?></b>
                            <b><?= Yii::t('app', 'pricing_block_1_title_3') ?></b>
                            <b><?= Yii::t('app', 'pricing_block_1_title_4') ?></b>
                        </span>				
                    </h1>                 
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                        <?= Yii::t('app', "pricing_block_1_text_1") ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
       
		<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
			<div class="home-concept mt-5">
				<div class="container">

					<div class="row text-center">
						<span class="sun"></span>
						<span class="cloud"></span>
						<div class="col-lg-2 ms-lg-auto">
							<div class="process-image">
								<img src="images/generic/home-concept-item-1.png" alt="" />
								<strong>
                                    <?= Yii::t('app', "pricing_block_2_strategy") ?>                                
                                </strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image process-image-on-middle">
								<img src="images/generic/home-concept-item-2.png" alt="" />
                                <strong>
                                    <?= Yii::t('app', "pricing_block_2_planning") ?>                                
                                </strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image">
								<img src="images/generic/home-concept-item-3.png" alt="" />
                                <strong>
                                    <?= Yii::t('app', "pricing_block_2_build") ?>                                
                                </strong>
							</div>
						</div>
						<div class="col-lg-4 ms-lg-auto">
							<div class="project-image">
								<div id="fcSlideshow" class="fc-slideshow">							
									<ul class="fc-slides">
										<li style="display: none;"><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src="images/generic/project-home-1.jpg" alt=""></a></li>
										<li style="display: list-item;"><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src="images/generic/project-home-2.jpg" alt=""></a></li>
										<li style="display: none;"><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src="images/generic/project-home-3.jpg" alt=""></a></li>
									</ul>
								</div>
                                <strong>
                                    <?= Yii::t('app', "pricing_block_2_our_work") ?>                                
                                </strong>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>


    <div class="container">   
        <div class="row my-5">
            <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
                <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app', 'pricing_block_2_title_1') ?></h3>
                <p><?= Yii::t('app', 'pricing_block_2_subtitle_1') ?></p>
            </div>
            <div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app', 'pricing_block_2_title_2') ?></h3>
                <p><?= Yii::t('app', 'pricing_block_2_subtitle_2') ?></p>
            </div>
            <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
                <h3 class="font-weight-bold text-4 mb-2"><?= Yii::t('app', 'pricing_block_2_title_3') ?></h3>
                <p><?= Yii::t('app', 'pricing_block_2_subtitle_3') ?></p>
            </div>
        </div>
        <div class="row">  
                <div class="col-4">
                    <div class="form-group field-contactform-subject required">
                    <label for="contactform-subject">
                        <strong><?= Yii::t('app', 'pricing_block_2_currency') ?></strong>
                    </label>
                    <select id="price-change" class="form-control" onchange="setPricing(this);" aria-required="true" >           
                        <?php foreach ($pricing as $key => $value): ?> 
                            <option value="<?= $value['key'] ?>" data-coin="<?= $value['coin'] ?>" data-standard="<?= $value['standard'] ?>" data-professional="<?= $value['professional'] ?>" data-enterprise="<?= $value['enterprise'] ?>"><?= $value['title'] ?></option>
                        <?php endforeach; ?>  
                    </select>
                </div>          
            </div> 
            <hr class="solid my-5">
        </div>
    </div>
     <div role="main" class="main">
        <div id="examples" class="container py-4"> 
            
            <div class="pricing-table pricing-table-no-gap mb-4">
        
                <div class="col-md-6 col-lg-3">
                    <div class="plan">
                        <div class="plan-header">
                            <h3><?= Yii::t('app', "pricing_block_3_basic") ?></h3>
                        </div>
                        <div class="plan-price">
                            <span class="price">
                                <span class="price-unit">
                                    <?= Yii::t('app', "pricing_block_2_free") ?>
                                </span>
                            </span>            
                        </div>
                        <div class="plan-features">
                            <ul>
                                <?php                            
                                    foreach ($pricingSpecs as $key => $categories): 
                                        if($categories['type'] == 'basic'){
                                            ?>    
                                            <li><?= Yii::t('app', $categories['page_code']) ?></li>
                                            <?php 
                                        }
                                    endforeach;
                                ?>     
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <a href="<?= str_replace('/frontend/web', '',
                                    Url::toRoute([
                                        'site/checkout','plan' => 'basic'
                                    ])) 
                                ?>" 
                                class="btn btn-dark btn-modern btn-outline py-2 px-4">
                                <?= Yii::t('app', "pricing_block_3_start_now") ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="plan plan-featured">
                        <div class="plan-header bg-primary">
                            <h3><?= Yii::t('app', "pricing_block_3_standard") ?></h3>
                        </div>
                        <div class="plan-price">
                            <span class="price"><span class="price-unit"><span id="value-standard-coin">€</span></span> <span id="value-standard"><?= $standard ?></span></span>
                            <label class="price-label">
                                <?= Yii::t('app', "pricing_block_3_per_month") ?>
                            </label>
                        </div>
                        <div class="plan-features">
                            <ul>
                                <?php                            
                                    foreach ($pricingSpecs as $key => $categories): 
                                        if($categories['type'] == 'standard'){
                                            ?>    
                                            <li><?= Yii::t('app', $categories['page_code']) ?></li>
                                            <?php 
                                        }
                                    endforeach;
                                ?>     
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <a href="<?= str_replace('/frontend/web', '',
                                    Url::toRoute([
                                        'site/checkout','plan' => 'standard'
                                    ])) 
                                ?>" 
                                class="btn btn-dark btn-modern btn-outline py-2 px-4">
                                <?= Yii::t('app', "pricing_block_3_start_now") ?>
                            </a>                     
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="plan">
                        <div class="plan-header">
                            <h3><?= Yii::t('app', "pricing_block_3_professional") ?></h3>
                        </div>
                        <div class="plan-price">
                            <span class="price"><span class="price-unit"><span id="value-professional-coin">€</span></span> <span id="value-professional"><?= $professional ?></span></span>
                            <label class="price-label">
                                <?= Yii::t('app', "pricing_block_3_per_month") ?>
                            </label>
                        </div>

                        <div class="plan-features">
                            <ul>
                                <?php                            
                                    foreach ($pricingSpecs as $key => $categories): 
                                        if($categories['type'] == 'professional'){
                                            ?>    
                                            <li><?= Yii::t('app', $categories['page_code']) ?></li>
                                            <?php 
                                        }
                                    endforeach;
                                ?>   
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <a href="<?= str_replace('/frontend/web', '',
                                    Url::toRoute([
                                        'site/checkout','plan' => 'professional'
                                    ])) 
                                ?>" 
                                class="btn btn-dark btn-modern btn-outline py-2 px-4">
                                <?= Yii::t('app', "pricing_block_3_start_now") ?>
                            </a>                           
                        </div>
                    </div>
                </div>      
                <div class="col-md-6 col-lg-3">
                    <div class="plan">
                        <div class="plan-header">
                            <h3><?= Yii::t('app', "pricing_block_3_enterprise") ?></h3>
                        </div>
                        <div class="plan-price">
                            <span class="price"><span class="price-unit"><span id="value-enterprise-coin">€</span></span> <span id="value-enterprise"><?= $enterprise ?></span></span>
                            <label class="price-label">
                                <?= Yii::t('app', "pricing_block_3_per_month") ?>
                            </label>                     
                        </div>
                        <div class="plan-features">
                            <ul>
                                <?php                            
                                    foreach ($pricingSpecs as $key => $categories): 
                                        if($categories['type'] == 'enterprise'){
                                            ?>    
                                            <li><?= Yii::t('app', $categories['page_code']) ?></li>
                                            <?php 
                                        }
                                    endforeach;
                                ?>  
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <a href="<?= Url::toRoute('/site/contact-us') ?>" class="btn btn-dark btn-modern btn-outline py-2 px-4">
                                <?= Yii::t('app', "pricing_block_3_contact_us") ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row pt-4 mt-2">
            <div class="col">
                <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                    <?= Yii::t('app', "pricing_block_4_title") ?> 
                </h2>
                <p><?= Yii::t('app', "pricing_block_4_text") ?></p>
    
            </div>
        </div>
    </div>

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
