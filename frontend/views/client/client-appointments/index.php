<?php

use common\models\Sheddule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use common\Helpers\Helpers;
use kartik\date\DatePicker;

$companyArr = Helpers::myCompanyArr();

/** @var yii\web\View $this */
/** @var app\models\ShedduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sheddules';
$this->params['breadcrumbs'][] = $this->title;


?>
<?= $this->render('@frontend/views/client/client-booking/header', ['headerTransparent' => 1, 'model' => $model, 'companyArr' => $companyArr]); ?>

<div class="container">  
    <?= $this->render('@frontend/views/client/booking/steps', ['type' => 'appointments']); ?>
</div>

<div class="container py-5">
    <div class="row">
        <div class=" box-content featured-box  text-start mt-0 pt-5">
            <div class="col-12">
     
                <div class="clients-index">
                    <h1>
                        <?= Yii::t('app','scheduling_history') ?>
                    </h1>

                <?php echo $this->render('_search', ['model' => $searchModel,'companyArr' => $companyArr]); ?>
            
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => ['class' => 'table table-responsive'],
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],      
                                                   
                    
                        ['label' => Yii::t('app', 'booking_code') ,                        
                            'value' => function (Sheddule $model) {
                                return $model->booking_code;                         
                            },
                        ],                      
                        [     
                            'label' => Yii::t('app', 'team_member') ,                        
                            'value' => function (Sheddule $model) {                            
                                return Helpers::getUsersFullName($model->team_username);                          
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'location_code') ,                        
                            'value' => function (Sheddule $model) {
                                return Helpers::getCompanyLocationName($model->location_code);  
                            },
                        ],  
                        [     
                            'label' => Yii::t('app', 'service_name') ,                        
                            'value' => function (Sheddule $model) {
                                return  Yii::t('app', $model->service_name) ;
                            },
                        ],  
                        [     
                            'label' => Yii::t('app', 'price') ,                        
                            'value' => function (Sheddule $model) {
                                return  Yii::t('app', $model->price) ;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'date') ,                        
                            'value' => function (Sheddule $model) {
                                return  $model->date;
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'time') ,                        
                            'value' => function (Sheddule $model) {
                                return date('H:i',strtotime($model->time));                           
                            },
                        ], 
                        [     
                            'label' => Yii::t('app', 'details'),                         
                            'format' => 'raw',
                            'value' => function (Sheddule $model) {
                     
                                $str = '' ;     
                                $companyArr = Helpers::myCompanyArr();
                                $timeFrame = Helpers::validationTimeFrameCancelation($companyArr, $model);
                                                        

                                $str .= '<a href="#" data-bs-toggle="modal" data-bs-target="#viewmore-'.$model->id.'" data-service="'.$model->service_code.'" data-username="'.$model->team_username.'"  onclick ="getServicesByViewMore(this)">
                                            '.Yii::t('app', 'view_more').'
                                        </a>

                                        <div class="modal fade" id="viewmore-'.$model->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">
                                                            '.Yii::t('app', 'details').' : '.$model->id.'
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>'.Yii::t('app', 'id').'</strong> : '.$model->id.'<p>
                                                        <p><strong>'.Yii::t('app', 'booking_code').'</strong> : '.$model->booking_code.'<p>
                                                        <p><strong>'.Yii::t('app', 'team_username').'</strong> : '.Helpers::getUsersFullName($model->team_username).'<p>
                                                        <p><strong>'.Yii::t('app', 'location_code').'</strong> : '.Helpers::getCompanyLocationName($model->location_code).'<p>
                                                        <p><strong>'.Yii::t('app', 'service_name').'</strong> : '.Yii::t('app', $model->service_name).'<p>
                                                        <p><strong>'.Yii::t('app', 'service_code').'</strong> : '.$model->service_code.'<p>
                                                        <p><strong>'.Yii::t('app', 'contact_number').'</strong> : '.$model->contact_number.'<p>
                                                        <p><strong>'.Yii::t('app', 'email').'</strong> : '.$model->email.'<p>                                               
                                                        <p><strong>'.Yii::t('app', 'price').'</strong> : '.$model->price.'<p>
                                                        <p><strong>'.Yii::t('app', 'price_range').'</strong> : '.(($model->price_range == 0) ? '-' : $model->price_range).'<p>
                                                        <p><strong>'.Yii::t('app', 'date').'</strong> : '.$model->date.'<p>
                                                        <p><strong>'.Yii::t('app', 'time').'</strong> : '.$model->time.'<p>                               
                                                        <p><strong>'.Yii::t('app', 'created_date').'</strong> : '.$model->created_date.'<p>
                                                    </div>
                                                    <div class="modal-footer">';                                                       
                                                         
                                                        switch ($timeFrame) {
                                                            case "1":
                                                                $str .= Html::a(
                                                                    Yii::t('app', 'edit_button'),                                           
                                                                    Url::toRoute(
                                                                        [
                                                                            '/client-appointments/update',                                                                 
                                                                            'id' => $model->id,
                                                                            'code' => Yii::$app->request->get('code')
                                                                        ]
                                                                    ),
                                                        
                                                                    [                                                      
                                                                        'class' => 'btn btn-primary'
                                                                    ]
                                                                 ); 
                                                                 
                                                                $str .= Html::a(Yii::t('app', 'cancel_button'), 
                                                                    [
                                                                        '/client-appointments/cancel', 
                                                                        'id' => $model->id,
                                                                        'code' => Yii::$app->request->get('code')
                                                                    ], 
                                                                    [
                                                                        'class' => 'btn btn-danger',
                                                                        'data' => [
                                                                            'confirm' => Yii::t('app', 'sure_delete_appointment'),
                                                                            'method' => 'post',
                                                                        ],
                                                                    ]
                                                                );
                                                                break;
                                                            case "2":
                                                          
                                                                $str .=  Html::button(Yii::t('app', 'cancel_button'), 
                                                                            [ 'class' => 'btn btn-danger', 
                                                                                'onclick' => '(function ( $event ) { 
                                                                                    alert("'.Yii::t('app', 'cannot_cancel_timeframe').Yii::t('app', 'close_button').'"); 
                                                                                })();' 
                                                                            ]
                                                                        );
                                                                break;                                                                                                         
                                                
                                                            }
                                                                
                                               $str .= '<button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                            '.Yii::t('app', 'close_button').'
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';                             

                                

                                    return  $str;

                            },
                        ], 
                  
                    ],
                ]);
                ?>  
                </div>         
            </div>
        </div>
    </div>
</div>
