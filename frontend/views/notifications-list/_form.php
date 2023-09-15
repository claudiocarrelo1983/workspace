<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Team $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="team-form pb-5">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row pt-4">   
        <div class="col">
            <?= $form->field($model, 'text')->textarea(['rows'=> '8','maxlength' => true, 'value' => ' '])->label(Yii::t('app', 'message')) ?>
        </div>       
    </div>    
    <div class="form-group pt-3">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#replyModal">
            <?=  Yii::t('app', 'confirm_reply_button') ?>
        </button>
        <a class= "btn btn-outline-secondary" href="<?= Url::toRoute('/notifications-list/index'); ?>">
            <?=  Yii::t('app', 'go_back') ?>
        </a>

        <!-- sample modal content -->
        <div id="replyModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            <?=  Yii::t('app', 'confirm_reply_title') ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>
                            <?=  Yii::t('app', 'confirm_reply_answer') ?>
                        </h5>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                            <?=  Yii::t('app', 'button_close') ?>
                        </button>
                        <?= Html::submitButton(Yii::t('app', 'button_send'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>


    <?php ActiveForm::end(); ?>

</div>
