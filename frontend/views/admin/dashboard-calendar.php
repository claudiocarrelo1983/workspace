<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yiier\chartjs\ChartJs;
use yii\db\Query;

$this->title = 'Dashboard';

$tagQuery = new Query;

$teamArr = $tagQuery->select('*')
    ->from('team')    
    ->orderBy(['created_date' => SORT_ASC])
    ->limit(15)
    ->all();


$notifications = $tagQuery->select('*')
    ->from('tickets')    
    //->orderBy(['created_date' => SORT_ASC])
    ->limit(15)
    ->all();

   

$notifications =  array(
    array(
        'username' => ' TW_Ccarrelo',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/flags/portugal.png'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),

    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
    array(
        'username' => ' TW_Ccarrelo',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/flags/portugal.png'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),

    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
    array(
        'username' => ' TW_Eurico',
        'title' => ' Portuguese',
        'message' => ' If several languages coalesce the grammar',
        'time' => '3 min ago',
        'img' => 'images/users/avatar-4.jpg'
    ),
);


?>
           
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">    
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?= $this->title ?></h4>

                <div class="page-title-right">
                    <a href="<?= Url::toRoute('definition/index') ?>" class="btn btn-primary text-color-light" >
                        <i class="bx bxs-cog align-middle me-1"></i>Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card bg-primary bg-soft">
                <div>
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary"><?= Yii::$app->user->identity->full_name ?></h5>
                                <div><?= Yii::$app->user->identity->title ?></div>
                                <div class="py-1"><?= Yii::$app->user->identity->company ?> ( <?= Yii::$app->user->identity->level ?> )</div>                                  
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="bx bx-home-circle"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Companys</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>1452</h4>                                                 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="dripicons-user-group"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Users</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>452</h4>                                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="bx bx-comment"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Posts</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>162</h4>                                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">                                    
                        <h4 class="card-title mb-4">Past Year Earnings</h4>
                    </div>

                    <div class="row">
                        <?= ChartJs::widget([
                            'type' => 'line',                                                
                            'options' => [
                                'height' => 90,
                                'width' => 200,	
                                'legend' => [	
                                    //'position'=> 'bottom',
                                    'display'=> 'top'		
                                ],													
                            ],										
                            'data' => [
                                'labels' => [
                                        Yii::t('app','Jan'),
                                        Yii::t('app','Feb'),
                                        Yii::t('app','March'),
                                        Yii::t('app','Abril'),
                                        Yii::t('app','May'),
                                        Yii::t('app','June'),
                                        Yii::t('app','July'),
                                        Yii::t('app','Aug'),
                                        Yii::t('app','Sep'),
                                        Yii::t('app','Oct'),
                                        Yii::t('app','Nov'),
                                        Yii::t('app','Dec')
                                    ],
                                'datasets' => [
                                    [                                    
                                        'label'=> '# of Votes',
                                        'data' => [
                                            100, 
                                            200,
                                            150
                                        ],
                                        'borderColor'=> '#0088CC'
                                    ],
                                    [
                                    
                                        'label'=> '# of Votes',
                                        'data' => [
                                            50, 
                                            20,
                                            90
                                        ],                                     
                                        'borderColor'=> '#1abd99'
                                    ],
                                    [
                                    
                                        'label'=> '# of Votes',
                                        'data' => [
                                            120, 
                                            100,
                                            70
                                        ],
                                        'borderColor'=> '#dc3545'
                                    ]
                                ]
                            ],
                            'clientOptions' => [
                                'legend' => [
                                    'display' => true,
                                    'position' => 'bottom',
                                ]
                            ]

                        ]);?>	
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">     
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Notifications</h4>

                    <ul class="list-group" data-simplebar style="max-height: 460px;">

                        <?php foreach ($notifications as $key => $message): ?> 
                            <li class="list-group-item border-0">
                                <div class="d-flex">                                                    
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-14"><?= $message['title'] ?></h5>
                                        <p class="text-muted"><?= $message['message'] ?></p>

                                        <div class="float-end">
                                            <p class="text-muted mb-0"><i class="mdi mdi-account me-1"></i> Joseph</p>
                                        </div>
                                        <p class="text-muted mb-0"><?= $message['time'] ?></p>
                                    </div>
                                </div>
                            </li>      
                        <?php endforeach; ?>  
                                                  
                    </ul>
                </div>
            </div>                         
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Users</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                      <th style="width: 20px;">#</th>
                                        <th class="align-middle">Username</th>  
                                        <th class="align-middle">Name</th>  
                                        <th class="align-middle">Email</th>                                                                  
                                        <th class="align-middle">Company</th>
                                        <th class="align-middle">Level</th>               
                                        <th class="align-middle">Date</th>
                                        <th class="align-middle">View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($teamArr as $key => $user): ?> 
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold"><?= $user['username'] ?></a> </td>
                                            <td><?= $user['full_name'] ?></td>                                  
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['company'] ?></td>
                                            <td><?= $user['level'] ?></td>
                                            <td><?= $user['created_date'] ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>                           
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

<!-- End Page-content -->


