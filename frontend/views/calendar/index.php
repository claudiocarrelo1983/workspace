<?php

/*
require __DIR__ . '/../../web/ajax/loadCalendar.ajax.php';

die('___');


use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
    ->from(['calendar'])
    ->where(['username' => Yii::$app->user->identity->username]) 
    ->all();


*/


//use talma\widgets\FullCalendar;

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use edofre\fullcalendar\Fullcalendar;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
                    ->from(['events'])
                    ->where(['username' => Yii::$app->user->identity->username]) 
                    ->all();

                    $colors = [
                        '#4e71b0',
                        '##e08632',
                        '#60a339',
                        '#b73232',
                        '#8b5fba',
                        '#7e584d',
                        '#cb74c0',
                        '#7f7f7f',
                        '#b9c23e',
                        '#72bccc',
                        '#e36159',
                        '#2BAAB1',
                        '#d1e7dd',
                        '#cff4fc',  
                        '#fff3cd',
                        '#f8d7da',
                    ];
                    

$events = array();
  //Testing
  $Event = new \edofre\fullcalendar\models\Event();
  $Event->id = 1;
  $Event->title = 'milad';
  $Event->editable=TRUE;
  $Event->start = date('2023-03-14');
  $events[] = $Event;

  $Event = new  \edofre\fullcalendar\models\Event();
  $Event->id = 2;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
  $events[] = $Event;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Load jQuery -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>



<script>

  document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');
   
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',  
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },

      events: <?= $myData ?>
    });

    calendar.render();
  });

</script>

<div class="col-12">   
    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                        <?= Html::encode(Yii::t('app', 'menu_admin_events')) ?>
                    </h4>  
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    <?= Yii::t('app', 'menu_admin_events') ?> 
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?= Yii::t('app', 'menu_admin_agenda_calendar') ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
               
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal"><i class="mdi mdi-plus-circle-outline"></i>
                                        <?= Yii::t('app', 'Create New Event') ?> 
                                    </button>
                                </div>                          
                                <div id="external-events" class="mt-2">
                                    <br>
                                    <p class="text-muted">
                                        <?= Yii::t('app', ' Drag and drop your event or click in the calendar') ?>                                       
                                    </p>

                                    <div class="bg-random">
                                        <?php foreach($eventsArr as $event) : ?>
                                        <div class="external-event fc-event <?= $event['color_code'] ?>"  data-bs-toggle="modal" data-bs-target="#event-modal<?= $event['id'] ?>" data-class="<?= $event['color_code'] ?>">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>
                                                <?= Yii::t('app', $event['page_code']) ?>                                                           
                                        </div>   
                                         <!-- Add New Event MODAL -->
                                         <div class="modal fade" id="event-modal<?= $event['id'] ?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header  border-bottom-0">
                                                            <h5 class="modal-title" id="modal-title">Event</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="events-form">
                                                            <?php
                                                              

                                                               $arr = [];
                                                      

                                                                $arr['Events'] = $event;

                                                                $modelEvents->load($arr); 

                                                            ?>
                                                            <?= $this->render('_form', [
                                                                'modelEvents' => $modelEvents,
                                                            ]) ?>                                                                                                    </div>
                                                    </div> <!-- end modal-content-->
                                                </div> <!-- end modal dialog-->
                                            </div>
                                            <!-- end modal-->                                        
                                        <?php endforeach; ?>
                                    </div>                           
                                </div>

                                <div class="row justify-content-center mt-5">
                                    <img src="assets/images/verification-img.png" alt="" class="img-fluid d-block">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> 

                <div style='clear:both'></div>            
        
                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header  border-bottom-0">
                                <h5 class="modal-title" id="modal-title">Event</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                            </div>
                            <div class="modal-body">
                                <div class="events-form">
                                <?= $this->render('_form', [
                                    'modelEvents' => $modelEvents,
                                ]) ?>  
                                
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->

            </div>
        </div>
        
    </div> <!-- container-fluid -->











