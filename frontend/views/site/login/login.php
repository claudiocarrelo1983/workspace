<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../banner',['path1' => 'Menu','path2' => 'Login']); ?>

<div role="main" class="main mb-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="row text-center pb-5">
                <div class="col-md-9 mx-md-auto">
                    <div class="overflow-hidden mb-3">
                        <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                            <span>We are Porto, We </span>
                            <span class="word-rotator-words bg-primary">
                                <b class="is-visible">Create</b>
                                <b>Build</b>
                                <b>Develop</b>
                            </span>
                            <span> Solutions</span>
                        </h1>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0">Login</h2>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="row">
                        <div class="form-group col">                      
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg text-4',  'autofocus' => true])->label('Username')?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label('Password')?>
                        </div>
                    </div>
                  

                    <div class="row justify-content-between">
                        <div class="form-group col-md-auto">
                            <div class="custom-control custom-checkbox">
                                 <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'custom-control-input'])->label('Remember Me')?>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'login-button']) ?>
                            <div class="divider">
                                <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                            </div>
                            <a href="#" class="btn btn-defaulth -scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-google text-5 me-2"></i> Login With Google</a>
                            <a href="#" class="mt-5 btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login With Facebook</a>
                          
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>


