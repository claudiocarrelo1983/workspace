<?php

/* @var $this yii\web\View */

$this->title = 'About Us';

$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../banner',['path1' => 'Menu','path2' => 'About Us']); ?>

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
            <h2 class="font-weight-bold text-9 mb-0">The Perfect Template for<br>Beginners or Professionals</h2>
            <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4">YOUR WEBSITE TO <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">A NEW LEVEL</span></p>
            <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5">Porto is simply a better choice for your new website design. The template is several years among the most popular in the world, being constantly improved and following the trends of design and best practices of code. Your search for the best solution is over, get your own copy and join tens of thousands of happy customers.</p>
        </div>      
    </div>
</section>

<section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2">Who <strong class="font-weight-extra-bold">We Are</strong></h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc. </p>
                <p class="pe-5 me-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget</p>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5" style="top: 1.7rem;">
                <img src="img/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
                <img src="img/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
                <img src="img/generic/generic-corporate-3-3.jpg" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark border-0 m-0">
    <div class="container">    
        <div class="row my-5">
            <div class="col-lg-6 pe-5">
                <h2 class="text-color-light font-weight-normal text-6 mb-2 pb-1">Project <strong class="font-weight-extra-bold">Skills</strong></h2>
                <p class="lead text-color-light opacity-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enikklam id valorem ipsum dolor sit amet, consectetur adipiscing.</p>
                <p class="text-color-light opacity-6">Phasellus blandit massa enim. Nullam id varius elit. blandit massa enim d varius blandit massa enimariusi d varius elit.</p>
                <a href="#" class="font-weight-semibold text-decoration-none learn-more text-2">VIEW MORE <i class="fas fa-chevron-right ms-2"></i></a>
            </div>
            <div class="col-lg-6">
                <div class="progress-bars mt-5">
                    <div class="progress-label">
                        <span>HTML/CSS</span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="100%">
                            <span class="progress-bar-tooltip">100%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>Design</span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%" data-appear-animation-delay="300">
                            <span class="progress-bar-tooltip">85%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>WordPress</span>
                    </div>
                    <div class="progress progress-dark mb-2">
                        <div class="progress-bar progress-bar-primary" data-appear-progress-animation="75%" data-appear-animation-delay="600">
                            <span class="progress-bar-tooltip">75%</span>
                        </div>
                    </div>
                    <div class="progress-label">
                        <span>Photoshop</span>
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
                <h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2">Meet <strong class="font-weight-extra-bold">Our Team</strong></h2>
                <p>Rockstars lorem ipsum dolor sit amet, consectetur adipiscing elit ac laoreet libero.</p>
            </div>
        </div>
        <div class="row pb-4 mb-2">
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
                    <span class="thumb-info-wrapper border-radius-0">
                        <a href="about-me.html">
                            <img src="img/team/team-1.jpg" class="img-fluid border-radius-0" alt="">
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner">Cl??udio Carrelo</span>
                                <span class="thumb-info-type">Founder</span>
                            </span>
                        </a>
                    </span>
                    <span class="thumb-info-caption">
                        <span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
                        <span class="thumb-info-social-icons">
                            <a target="_blank" href="http://www.facebook.com"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                            <a href="http://www.twitter.com"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            <a href="http://www.linkedin.com"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                <span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
                    <span class="thumb-info-wrapper border-radius-0">
                        <a href="about-me.html">
                            <img src="img/team/team-1.jpg" class="img-fluid border-radius-0" alt="">
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner">Nelson Santos</span>
                                <span class="thumb-info-type">Marketing</span>
                            </span>
                        </a>
                    </span>
                    <span class="thumb-info-caption">
                        <span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
                        <span class="thumb-info-social-icons">
                            <a target="_blank" href="http://www.facebook.com"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                            <a href="http://www.twitter.com"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            <a href="http://www.linkedin.com"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                        </span>
                    </span>
                </span>
            </div>
        </div>
    </div>
</section>


<section class=" call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="call-to-action-content">
                    <h2 class="font-weight-normal text-6 mb-0">My Special Gym is <strong class="font-weight-extra-bold">everything</strong> you need to get fit, just start with this <strong class="font-weight-extra-bold">awesome</strong> tool!</h2>
                    <p class="mb-0">The Best Tool in the fitness market</p>
                </div>
            </div>
        </div>
    </div>
</section>

