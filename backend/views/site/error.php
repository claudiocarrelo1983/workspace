<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="site-error">
    <div class="account-pages my-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h1 class="display-2 fw-medium">404</h1>
                    <h4 class="text-uppercase">Sorry, page not found</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="<?= Url::home() ?>">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="assets/images/error-img.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

</div>
