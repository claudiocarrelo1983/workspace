<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Clients $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-xl-12">
           
                <h4 class="mb-sm-0 font-size-18 pb-4">
                    <?= Html::encode($this->title) ?>
                </h4>         

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Client Information</span>    
                        </a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">Shedulle History</span>    
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">                    
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <p class="mb-0">
                            <div class="clients-view">
                                <p>
                                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </p>

                                <?= DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        'id',
                                        'guid',
                                        'username',
                                        'contact_number',
                                        'email:email',
                                        'nif',
                                        'first_name',
                                        'last_name',
                                        'full_name',
                                        'gender',
                                        'title',
                                        'path',
                                        'dob',
                                        'image',
                                        'company_code',
                                        'starting_date',
                                        'payment_month_fee',
                                        'payment_year_fee',
                                        'offer',
                                        'status',
                                        'language',
                                        'address',
                                        'postcode',
                                        'location',
                                        'country',
                                        'voucher',
                                        'terms_and_conditions',
                                        'gdpr',
                                        'privacy',
                                        'newsletter',
                                        'auth_key',
                                        'password_hash',
                                        'password_reset_token',
                                        'active',
                                        'created_at',
                                        'updated_at',
                                        'subscription',
                                        'subscription_startingdate',
                                        'created_date',
                                    ],
                                ]) ?>

                            </div>
                            
                        </p>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <p class="mb-0">
                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                            art party before they sold out master cleanse gluten-free squid
                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                            art party locavore wolf cliche high life echo park Austin. Cred
                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                            farm-to-table VHS.
                        </p>
                    </div>
                </div>

            </div>

</div>

