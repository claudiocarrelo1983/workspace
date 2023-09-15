<?php

use yii\helpers\Html;
use common\models\Tickets;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


Yii::$app->db->createCommand()->update('tickets', ['read' => 1], 'id ='.$model->id)->execute();


/** @var yii\web\View $this */
/** @var app\models\Team $model */

$this->title = 'Team Member : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-update">
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18 pb-4">
                  <?= Html::encode(Yii::t('app', 'menu_admin_messages')) ?>
              </h4>  
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                          <a href="javascript: void(0);">
                              <?= Yii::t('app', 'menu_admin_messages') ?> 
                          </a>
                      </li>
                      <li class="breadcrumb-item active">
                          <?= Html::encode($model->full_name) ?>
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>  
  <div>
      <strong>    
          <?= Yii::t('app', 'full_name') ?>: 
      </strong>  
      <?= $model->full_name ?>
  </div>
  <div>
      <strong>
          <?= Yii::t('app', 'ticket_number') ?>: 
      </strong>  
      <?= $model->ticket_number ?>
  </div> 

    <div>
      <strong>    
          <?= Yii::t('app', 'contact_number') ?>: 
      </strong>  
      <?= $model->contact_number ?>
    </div>
    <div>
        <strong>    
          <?= Yii::t('app', 'email') ?>: 
      </strong> 
      <?= $model->email ?>
    </div>  
    <div class="pt-3">
      <?php
        $status = (($model->closed_ticket == 1) ? 'close': 'open')
      ?>

      <button type="button" class="btn btn-<?= (($model->closed_ticket == 1) ? 'danger': 'success') ?> waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#closeModal">
            <?=  Yii::t('app', 'confirm_'.$status.'_ticket_button') ?>
      </button>
          <?php $formClose = ActiveForm::begin(); ?>          
              <?= $formClose->field($model, 'closed_ticket')->hiddenInput(['value' => $status])->label(false) ?>
              <div id="closeModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">
                                  <?=  Yii::t('app', 'confirm_'.$status.'_ticket_title') ?>
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h5>
                                  <?=  Yii::t('app', 'confirm_'.$status.'_ticket_text') ?>
                              </h5>
                          </div>
                          <div class="modal-footer">               
                              <?= Html::submitButton(Yii::t('app', 'confirm_'.$status.'_ticket_button'), ['class' => 'btn btn-'.(($model->closed_ticket == 1) ? 'danger': 'success')]) ?>                        
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          <?php ActiveForm::end(); ?>
      </div> 
    <div class="pt-5">
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          //'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],        
              [     
                'label' => Yii::t('app', 'type'),                         
                'value' => function (Tickets $model) {
                  if($model->type == 'message'){
                    return Yii::t('app', 'question') .':';
                  }
                  if($model->type == 'message_reply'){
                    return Yii::t('app', 'answer') .':';
                  }
 
                },
            ],                        
            [     
                'label' => Yii::t('app', 'message') ,                          
                'value' => function (Tickets $model) {
                    return $model->text;       
                },
            ],  
            [     
              'label' => Yii::t('app', 'created_date') ,                         
              'value' => function (Tickets $model) {
                return $model->created_date;       
              },
            ]                      
          ],
      ]); ?>

    </div>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
