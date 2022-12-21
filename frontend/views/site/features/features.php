<?php

/* @var $this yii\web\View */

$this->title = 'Features';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'features';

?>

<!-- Banner -->

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<!--End  Banner -->

	<div role="main" class="main">
		<div class="container pb-1">
			<div class="row pt-4 text-center">
				<div class="col">
					<div class="overflow-hidden mb-3">
						<h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
							<span><?= Yii::t('app', "features_block_title_1") ?></span>
							<span class="word-rotator-words bg-primary">
								<b class="is-visible"><?= Yii::t('app', "features_block_title_1_1") ?></b>
								<b><?= Yii::t('app', "features_block_title_1_2") ?></b>
								<b><?= Yii::t('app', "features_block_title_1_3") ?></b>
							</span>
						</h2>
					</div>
				</div>
			</div>

			<div class="row mb-2 py-4">
				<div class="col-lg-12">
					<div class="overflow-hidden">
						<p class="lead mb-0 appear-animation text-center" data-appear-animation="maskUp" data-appear-animation-delay="250">
							<?= Yii::t('app', "features_block_text_1") ?>
						</p>
					</div>
				</div>			
			</div>
		</div>
		<section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
			<div class="container py-4">
				<div class="row align-items-center">
					<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
						<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
							<div>
								<?= Yii::t('app', "features_block_youtube_iframe") ?>								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="overflow-hidden mb-2">
							<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">
								<?= Yii::t('app', "features_block_title_2") ?>
							</h2>
						</div>
						<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">
							<?= Yii::t('app', "features_block_text_2") ?>
						</p>
					</div>
				</div>
			</div>
		</section>	

		<div class="container">
			<div class="row mt-5 py-3">			
				<div class="row align-items-center pt-5 pb-3 appear-animation" data-appear-animation="fadeInRightShorter">
					<div class="col-md-8 pe-md-5 mb-5 mb-md-0">
						<h2 class="font-weight-normal text-6 mb-3">
							<?= Yii::t('app', "features_block_title_3") ?>
						</h2>
						<p class="text-4">
							<?= Yii::t('app', "features_block_text_3") ?>
						</p>
					</div>
					<div class="col-md-4 px-5 px-md-3">
						<img class="img-fluid scale-2 my-4" src="images/generic/style-switcher.png" alt="style switcher" />
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>

<!-- Sub Footer -->
<?= $this->render('../subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->
