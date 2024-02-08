<?php

use common\Helpers\Helpers;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


?>


<span id="anchor-about-us"></span>

<?= $this->render('/client/page/header', ['myData' => $myData, 'model' => $model, 'companyArr' => $companyArr]); ?>

<?= $this->render('/client/page/banner',['code' => $company, 'companyArr' => $companyArr]); ?>

<div role="main">  
   
    <?= $this->render('/client/page/about', ['companyArr' => $companyArr]); ?>  


    <?= $this->render('/client/page/gallery', ['companyArr' => $companyArr]); ?>   


    <?= $this->render('/client/page/team', ['companyArr' => $companyArr]); ?>
 
   
    <!--
        <div class="container"> 
            <section class="section section-height-1 bg-light position-relative border-0 m-0" id="events">
                <?php // $this->render('/client/page/events', ['companyArr' => $companyArr]); ?>
            </section>
        </div> 
    -->

    <?= $this->render('/client/page/services', ['companyArr' => $companyArr]); ?>

  
    <?= $this->render('/client/page/book-now', ['companyArr' => $companyArr]); ?> 

    <?= $this->render('/client/page/contact', ['model' => $model]); ?>

    <?= $this->render('/client/page/location'); ?>

    <?= $this->render('/client/page/social', [ 'companyArr' => $companyArr]); ?>
 
    <?= $this->render('/client/page/subfooter', [ 'companyArr' => $companyArr]); ?>
</div>







