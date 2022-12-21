<?php

/* @var $this yii\web\View */

$this->title = 'Mobile App';

$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('banner',['path1' => 'Menu','path2' => 'About Us']); ?>

<div role="main" class="main">

    <section id="overview">

        <div class="container pt-lg-5">
            <div class="row pt-lg-5">
                <div class="col-lg-8 text-center text-lg-start pt-5 mt-5">
                    <h2 class="text-color-primary positive-ls-3 mt-lg-5 pt-lg-5 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Check Out The Only</h2>

                    <h1 class="custom-font-size-1 text-color-dark font-weight-bold py-3 mb-1 p-relative appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}"><span class="p-relative z-index-1">Mobile App</span><span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">APP</span></h1>

                    <p class="text-4-5 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">This is the best that you will ever need!</p>

                    <a href="#" class="btn btn-secondary positive-ls-2 btn-outline font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">GET STARTED</a>

                </div>
                <div class="col-lg-4 pt-5 pt-lg-0 text-center">

                    <div class="custom-carousel-1 m-auto">
                        <div class="owl-carousel owl-theme stage-margin nav-style-1 " data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 45, 'autoplay': true, 'autoplayTimeout': 3000}">
                            <div>
                                <img alt="" class="img-fluid" src="img/demos/app-landing/screens/screen-4.jpg">
                            </div>
                            <div>
                                <img alt="" class="img-fluid" src="img/demos/app-landing/screens/screen-1.jpg">
                            </div>
                            <div>
                                <img alt="" class="img-fluid" src="img/demos/app-landing/screens/screen-2.jpg">
                            </div>
                            <div>
                                <img alt="" class="img-fluid" src="img/demos/app-landing/screens/screen-3.jpg">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="call-to-action custom-call-to-action call-to-action-dark mb-5">
        <div class="container">
            <div class="row p-3 p-md-0">
                <div class="col-lg-8">
                    <div class="call-to-action-content mx-auto m-lg-0">
                        <h3 class="mb-1 font-weight-semi-bold">App available for <strong class="font-weight-bold">Android, Iphone, and Porto Phone.</strong></h3>
                        <p class="mb-0 opacity-7">Also available on the Amazon App Store and Gallery App Store.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-start">
                    <div class="call-to-action-btn mx-auto mt-0 mt-md-4 m-lg-0">
                        <a class="btn btn-gradient-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3">
                            <span class="d-none d-sm-inline-block"><img width="32" height="28" src="img/demos/app-landing/icons/icon-cloud.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-stroke-color-light me-2'}" /></span>
                            Download Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-3 py-lg-5">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <img src="img/demos/app-landing/generic/generic-1.png" class="img-fluid mb-4 mb-lg-0" alt="" />
                </div>
                <div class="col-lg-6 text-center text-lg-start">

                    <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">

                        <h2 class="text-color-dark font-weight-bold text-10 mb-4-5">How it Works</h2>

                        <p class="font-weight-medium text-4-5 line-height-6 negative-ls-05">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, vitae lacinia arcu mollis ac. </p>

                        <p class="text-3-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies <span class="highlight highlight-primary px-0 highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="2000" data-plugin-options="{'flagClassOnly': true}">nisi elit consequat ipsum</span>, eu interdum enim.</p>

                    </div>

                    <div class="py-5">
                        <div class="custom-steps-icons justify-content-center">
                            <div class="custom-steps-icon appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">
                                <img width="75" height="75" src="img/demos/app-landing/icons/icon-sign-up.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                <h4>Sign Up</h4>
                            </div>
                            <div class="custom-steps-connect appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="400">
                                <img width="95" height="23" src="img/demos/app-landing/svg/connect-dots.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'custom-steps-connect-dots'}" />
                                <img width="14" height="14" src="img/demos/app-landing/svg/connect-point.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'custom-steps-connect-point'}" />
                            </div>
                            <div class="custom-steps-icon appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="600">
                                <img width="75" height="75" src="img/demos/app-landing/icons/icon-connect.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                <h4>Connect</h4>
                            </div>
                            <div class="custom-steps-connect appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="800">
                                <img width="95" height="23" src="img/demos/app-landing/svg/connect-dots.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'custom-steps-connect-dots'}" />
                                <img width="14" height="14" src="img/demos/app-landing/svg/connect-point.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'custom-steps-connect-point'}" />
                            </div>                       
                            <div class="custom-steps-icon appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="600">
                                <img width="75" height="75" src="img/demos/app-landing/icons/icon-share.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                <h4>Share</h4>
                            </div>
                        </div>
                    </div>

                    <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="400">
                        <p class="text-3-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies eu interdum enim convallis pretium.</p>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="py-4">
        <hr>
    </div>

    <section>
        <div class="container">
            <div class="row counters text-center">
                <div class="col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500">
                    <img width="74" height="74" src="img/demos/app-landing/icons/icon-group-users.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'mb-2'}" />
                    <div class="counter">
                        <strong class="text-color-dark text-10 negative-ls-2" data-to="1500" data-append="+">0</strong>
                        <label class="text-color-dark font-weight-semibold text-4 opacity-6 mb-0 line-height-1">People Connected</label>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="300">
                    <img width="74" height="74" src="img/demos/app-landing/icons/icon-download.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'mb-2'}" />
                    <div class="counter">
                        <strong class="text-color-dark text-10 negative-ls-2" data-to="25000" data-append="+">0</strong>
                        <label class="text-color-dark font-weight-semibold text-4 opacity-6 mb-0 line-height-1">APP Downloads</label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-sm-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300">
                    <img width="74" height="74" src="img/demos/app-landing/icons/icon-stop-watch.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'mb-2'}" />
                    <div class="counter">
                        <strong class="text-color-dark text-10 negative-ls-2" data-to="3000" data-append="+">0</strong>
                        <label class="text-color-dark font-weight-semibold text-4 opacity-6 mb-0 line-height-1">Development Hours</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="opacity-2"><div class="custom-el custom-el-circle border-color-secondary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: -45%;left: 5%;width: 15px;height: 15px;"></div></div>

        <div class="opacity-2"><div class="custom-el custom-el-circle custom-el-blur-1 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 146%;left: 7%;width: 48px;height: 48px;"></div></div>

        <div class="opacity-2"><div class="custom-el custom-el-rounded-rectangle custom-rotate-45 custom-el-blur-2 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 60%;left: 17%;width: 27px;height: 27px;"></div></div>

        <div class="opacity-2"><div class="custom-el custom-el-rounded-rectangle custom-rotate-45 custom-el-blur-1 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 17%;left: 15%;width: 18px;height: 18px;"></div></div>

        <div class="custom-svg-2">
            <img width="1290" height="1290" src="img/demos/app-landing/svg/shape-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': ''}" />
        </div>
    </section>

    <div class="py-4">
        <hr>
    </div>

    <section id="key-features" class="py-3 py-lg-5">
        <div class="container">

            <div class="row align-items-center">
                <div class="col appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">

                    <div class="text-center">
                        <h2 class="text-color-dark font-weight-bold text-10 mb-4-5">Key Features</h2>

                        <p class="font-weight-medium text-4-5 line-height-6 negative-ls-05">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec<br> imperdiet massa tellus, vitae lacinia arcu mollis ac. </p>
                    </div>

                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1 reverse">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-monitor.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-1'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Awesome Interface</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-refresh.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Free Updates</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1 reverse">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-finger.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">User Friendly</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-chat.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Instant Support</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1 reverse">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-avatar.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Connect With People</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-pencil.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Skin Colors</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1 reverse">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-paper-plane.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Notification</h4>
                                    <p class="mb-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start">
                            <div class="feature-box feature-box-style-6 custom-feature-box-1">
                                <div class="feature-box-icon">
                                    <img width="46" src="img/demos/app-landing/icons/icon-star.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="text-5 font-weight-bold mb-1 mt-3">Interactive</h4>
                                    <p class="mb-0 mb-lg-4 text-3-5 font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipiscing metus.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="py-4">
        <hr>
    </div>

    <section id="key-features" class="py-3 py-lg-5 p-relative">
        <div class="container">

            <div class="row align-items-center pb-5 pb-lg-0 mb-3 mb-lg-0">
                <div class="col-lg-3 text-center p-relative appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">
                    <div class="opacity-2"><div class="custom-el custom-el-circle border-color-secondary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 44%;left: 81%;width: 15px;height: 15px;"></div></div>

                    <div class="opacity-2"><div class="custom-el custom-el-circle custom-el-blur-1 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 39%;left: -15%;width: 48px;height: 48px;"></div></div>

                    <div class="opacity-2"><div class="custom-el custom-el-rounded-rectangle custom-rotate-45 custom-el-blur-2 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 68%;left: 5%;width: 27px;height: 27px;"></div></div>

                    <div class="opacity-2"><div class="custom-el custom-el-rounded-rectangle custom-rotate-45 custom-el-blur-1 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 17%;left: 15%;width: 18px;height: 18px;"></div></div>

                    <img src="img/demos/app-landing/generic/generic-2.png" class="img-fluid mb-4 mt-4 mb-lg-0" alt="" />
                </div>
                <div class="col-lg-9 text-center text-lg-start appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">

                    <h2 class="text-color-dark font-weight-bold text-10 mb-4-5">Very Active Community</h2>

                    <p class="font-weight-medium text-4-5 line-height-6 negative-ls-05">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, ipsum dolor sit amet, consectetur adipiscing vitae lacinia arcu mollis ac. </p>

                    <p class="text-3-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies <span class="highlight highlight-primary px-0 highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="2000" data-plugin-options="{'flagClassOnly': true}">nisi elit consequat ipsum</span>, eu interdum enim.</p>

                    <a href="#" class="btn btn-secondary positive-ls-2 btn-outline font-weight-bold text-2 btn-py-3 px-5 mt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">GO TO COMMUNITY</a>

                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-lg-9 text-center text-lg-end appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">

                    <h2 class="text-color-dark font-weight-bold text-10 mb-4-5">Quick Installation</h2>

                    <p class="font-weight-medium text-4-5 line-height-6 negative-ls-05">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, ipsum dolor sit amet, consectetur adipiscing vitae lacinia arcu mollis ac. </p>

                    <p class="text-3-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies <span class="highlight highlight-primary px-0 highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="2000" data-plugin-options="{'flagClassOnly': true}">nisi elit consequat ipsum</span>, eu interdum enim.</p>

                    <a href="#" class="btn btn-secondary positive-ls-2 btn-outline font-weight-bold text-2 btn-py-3 px-5 mt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">GO TO COMMUNITY</a>

                </div>
                <div class="col-lg-3 text-center appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">
                    <img src="img/demos/app-landing/generic/generic-3.png" class="img-fluid mb-4 mt-4 mb-lg-0" alt="" />
                </div>
            </div>

        </div>

        <div class="opacity-2"><div class="custom-el custom-el-circle border-color-secondary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 49%;left: 87%;width: 15px;height: 15px;"></div></div>

        <div class="opacity-2"><div class="custom-el custom-el-circle custom-el-blur-1 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 58%;left: 80%;width: 48px;height: 48px;"></div></div>

        <div class="opacity-2"><div class="custom-el custom-el-rounded-rectangle custom-rotate-45 custom-el-blur-2 border-color-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="3s" style="top: 96%;left: 78%;width: 27px;height: 27px;"></div></div>

        <div class="custom-svg-3">
            <img width="1290" height="1290" src="img/demos/app-landing/svg/shape-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': ''}" />
        </div>
    </section>

    <section id="reviews" class="bg-dark py-5 my-5 p-relative z-index-2">
        <div class="container">

            <div class="row align-items-center py-5">
                <div class="col text-center appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="100">

                    <h2 class="text-color-light font-weight-bold text-10 mb-4-5">Reviews</h2>

                    <div class="owl-carousel owl-theme stage-margin nav-style-1 nav-font-size-lg nav-light" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                        <div class="px-5">
                            <p class="text-primary text-7"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></p>
                            <p class="text-4-5 line-height-6 negative-ls-05 text-color-light mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, ipsum dolor sit amet, consectetur adipiscing vitae lacinia arcu mollis ac. </p>
                            <p class="text-2 opacity-7 text-color-light">NOV 2020</p>
                            <p class="text-4-5 line-height-6 negative-ls-05 font-weight-bold text-color-light mb-0">John Doe</p>
                        </div>
                        <div class="px-5">
                            <p class="text-primary text-7"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></p>
                            <p class="text-4-5 line-height-6 negative-ls-05 text-color-light mb-2">Ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, ipsum dolor sit amet, consectetur adipiscing vitae lacinia arcu mollis ac. </p>
                            <p class="text-2 opacity-7 text-color-light">NOV 2020</p>
                            <p class="text-4-5 line-height-6 negative-ls-05 font-weight-bold text-color-light mb-0">Josh Doe</p>
                        </div>
                        <div class="px-5">
                            <p class="text-primary text-7"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></p>
                            <p class="text-4-5 line-height-6 negative-ls-05 text-color-light mb-2">Dolor sit amet, consectetur adipiscing elit. Donec imperdiet massa tellus, ipsum dolor sit amet, consectetur adipiscing vitae lacinia arcu mollis ac. </p>
                            <p class="text-2 opacity-7 text-color-light">NOV 2020</p>
                            <p class="text-4-5 line-height-6 negative-ls-05 font-weight-bold text-color-light mb-0">Monica Doe</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="faq" class="py-5 my-5 p-relative">
        <div class="container">

            <div class="row">
                <div class="col">

                    <h2 class="text-color-dark font-weight-bold text-10 mb-4-5">FAQ's</h2>

                    <div class="accordion accordion-modern-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="150" id="accordion1">
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingOne">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1One" aria-expanded="false" aria-controls="collapse1One">
                                        1 - Why Choose Porto Auto Services?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1One" class="collapse" aria-labelledby="collapse1HeadingOne" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingTwo">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1Two" aria-expanded="false" aria-controls="collapse1Two">
                                        2 - Cras a elit sit amet leo accumsan?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1Two" class="collapse" aria-labelledby="collapse1HeadingTwo" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingThree">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1Three" aria-expanded="false" aria-controls="collapse1Three">
                                        3 - Hel officitur felis ultricis nan?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1Three" class="collapse" aria-labelledby="collapse1HeadingThree" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingFour">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1Four" aria-expanded="false" aria-controls="collapse1Four">
                                        4 - Wuspaisse hendreirit vehicula leo?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1Four" class="collapse" aria-labelledby="collapse1HeadingFour" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1HeadingFive">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1Five" aria-expanded="false" aria-controls="collapse1Five">
                                        5 - Lintegers aliquet ullamcorper dollor, quis sollic tudin?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1Five" class="collapse" aria-labelledby="collapse1HeadingFive" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-secondary positive-ls-2 btn-outline font-weight-bold text-2 btn-py-3 px-5 mt-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">GO TO COMMUNITY</a>

                </div>
            </div>
        </div>

        <div class="custom-svg-4">
            <img width="1290" height="1290" src="img/demos/app-landing/svg/shape-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': ''}" />
        </div>
    </section>

    <section id="downloads" class="bg-gradient py-5 my-5 p-relative z-index-2">
        <div class="container">

            <div class="row py-5 text-color-light p-relative">
                <div class="col-lg-7 text-center text-lg-start">

                    <h2 class="text-color-light font-weight-bold text-10 mb-5">Downloads</h2>

                    <p class="font-weight-semibold text-color-light text-6 line-height-6 negative-ls-05 mt-4 mb-0">App available for Android, Iphone, and Porto Phone.</p>
                    <p class="font-weight-medium text-color-light opacity-6 text-4-5 line-height-6 negative-ls-05 mb-5">Also available on the Amazon App Store and Gallery App Store.</p>

                    <a class="d-inline-flex align-items-center btn btn-light btn-py-2 px-4 text-start me-2 mb-3 mb-sm-0">
                        <img height="34" src="img/demos/app-landing/icons/icon-google-play.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-stroke-color-dark me-2'}" />
                        <span class="font-weight-semibold text-4"><em class="text-1 text-uppercase font-weight-medium opacity-6 d-block fst-normal p-relative top-2">Android App On</em><span class="text-color-dark text-4 negative-ls-05 p-relative bottom-2">Google Play</span></span>
                    </a>

                    <a class="d-inline-flex align-items-center btn btn-light btn-py-2 px-4 text-start mb-3 mb-sm-0">
                        <img height="34" src="img/demos/app-landing/icons/icon-apple.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-stroke-color-dark me-2'}" />
                        <span class="font-weight-semibold text-4"><em class="text-1 text-uppercase font-weight-medium opacity-6 d-block fst-normal p-relative top-2">Download On</em><span class="text-color-dark text-4 negative-ls-05 p-relative bottom-2">Apple Store</span></span>
                    </a>

                </div>
                <div class="col-lg-5 text-center pt-5 pt-lg-0">
                    <img src="img/demos/app-landing/generic/generic-4.png" class="img-fluid custom-img-1 mt-4 mb-lg-0" alt="" />
                </div>
            </div>

        </div>
    </section>

</div>

<footer id="footer" class="bg-transparent border-0 mt-lg-5 pt-lg-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="feature-box feature-box-style-2 feature-box-secondary">
                    <div class="feature-box-icon">
                        <i class="icons icon-envelope text-color-dark text-11"></i>
                    </div>
                    <div class="feature-box-info">
                        <h4 class="font-weight-bold text-color-dark line-height-1 mb-2">Subscribe To Our Newsletter</h4>
                        <p class="line-height-5 line-height-sm-1 mb-0 opacity-8 negative-ls-05 font-weight-medium">Get all the latest information on Events, Sales and Offers.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="alert alert-success d-none" id="newsletterSuccess">
                    <strong>Success!</strong> You've been added to our email list.
                </div>
                <div class="alert alert-danger d-none" id="newsletterError"></div>
                <form id="newsletterForm" class="form-style-3" action="php/newsletter-subscribe.php" method="POST" class="mw-100">
                    <div class="input-group">
                        <input class="form-control form-control-sm bg-default border-0 px-4 text-3 box-shadow-none" placeholder="Your E-mail Address" name="newsletterEmail" id="newsletterEmail" type="email">
                        <button class="btn btn-primary text-color-light text-2 positive-ls-3 py-3 px-5" type="submit"><strong class="position-relative top-1">SUBSCRIBE</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-transparent">
        <div class="container py-2">
            <hr class="bg-dark opacity-1 m-0">
            <div class="row py-4 pb-5">
                <div class="col-md-6 py-4 text-center text-md-start">
                    <p class="mb-0 text-3 opacity-8 negative-ls-05 font-weight-medium">Porto App Landing © Copyright 2021. All Rights Reserved.</p>
                </div>

                <div class="col-md-6 py-4 text-lg-end">
                    <div class="footer-nav footer-nav-links">
                        <nav class="justify-content-end p-relative top-3">
                            <ul class="nav" id="footerNav">
                                <li>
                                    <a class="text-dark text-color-hover-primary font-weight-semibold text-capitalize text-4-5" href="#">Overview</a>
                                </li>
                                <li>
                                    <a class="text-dark text-color-hover-primary font-weight-semibold text-capitalize text-4-5" href="#">Community</a>
                                </li>
                                <li>
                                    <a class="text-dark text-color-hover-primary font-weight-semibold text-capitalize text-4-5 pe-md-0" href="#">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

</div>
