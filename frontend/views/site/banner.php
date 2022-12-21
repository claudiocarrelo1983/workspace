<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Banner -->

<section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" style="background-image: url(images/generic/header_bg.jpg); background-size: cover; background-position: center; animation-duration: 750ms; animation-delay: 300ms; animation-fill-mode: forwards; min-height: 600px;">
	<div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light" style="padding: 8rem 0;"></div>
    <div class="container pt-lg-5 mt-5">
        <div class="row pt-3 pb-lg-0 pb-xl-0">
            <div class="col-lg-6 pt-4 mb-5 mb-lg-0">
                <ul class="breadcrumb font-weight-semibold text-4 negative-ls-1">
                    <li>
                        <a href="#"><?= Yii::t('app','breadcrumb_'.strtolower($path1)) ?></a>
                    </li>
                    <li class="text-color-primary">
                        <a href="#">
                            <?= Yii::t('app','breadcrumb_'.strtolower($path2)) ?>
                        </a>
                    </li>          
                </ul>
                <h1 class="font-weight-bold text-10 text-xl-12 line-height-2 mb-3">
                    <?= Yii::t('app', 'menu_'.strtolower($path2)) ?>
                </h1>
                <p class="font-weight-light opacity-7 pb-2 mb-4"></p>
                <a href="<?= Url::toRoute('site/mobile-app') ?>" data-hash="" data-hash-offset="0" data-hash-offset-lg="100" class="btn btn-gradient-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3">
                    <?= Yii::t('app', 'breadcrumb_get_started_now') ?>	
                </a>
                <a href="<?= Url::toRoute('site/pricing') ?>" class="btn btn-light btn-outline btn-outline-thin btn-outline-light-opacity-2 btn-effect-5 font-weight-semi-bold px-4 btn-py-2 text-3 text-color-light text-color-hover-dark ms-2" target="_blank">
                    <?= Yii::t('app', 'breadcrumb_pricing') ?>	
                    <i class="fas fa-external-link-alt ms-1"></i></a>
            </div>

        </div>
    </div>
</section>


<!--End  Banner -->