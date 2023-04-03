<?php

$arr =  [

    [
        'title' => 'Click for Google',
        'start' => '2023-03-10',
        'end' => '2023-03-10',
        'url' => 'http://google.com/',
        'className' => 'bg-dark1'
    ],
    [
        'title' => 'Click for Google',
        'start' => '2023-04-10',
        'end' => '2023-03-10',
        'url' => 'http://google.com/',
        'className' => 'bg-dark1'
    ]
];

echo json_encode($arr);
die();




/*

namespace frontend\controllers\ajax;

use Yii;
use yii\web\Controller;

class MyAjaxController extends Controller
{
    public function actionMyAction()
    {
        // process the AJAX request here
    }
}

echo $str = '
{
    title: "All Day Event",
    start: new Date(o, d, 1)
}, {
    title: "Long Event",
    start: new Date(o, d, n - 5),
    end: new Date(o, d, n - 2),
    className: "bg-warning"
}, {
    id: 999,
    title: "Repeating Event",
    start: new Date(o, d, n - 3, 16, 0),
    allDay: !1,
    className: "bg-info"
}, {
    id: 999,
    title: "Repeating Event",
    start: new Date(o, d, n + 4, 16, 0),
    allDay: !1,
    className: "bg-primary"
}, {
    title: "Meeting",
    start: new Date(o, d, n, 10, 30),
    allDay: !1,
    className: "bg-success"
}, {
    title: "Lunch",
    start: new Date(o, d, n, 12, 0),
    end: new Date(o, d, n, 14, 0),
    allDay: !1,
    className: "bg-danger"
}, {
    title: "Birthday Party",
    start: new Date(o, d, n + 1, 19, 0),
    end: new Date(o, d, n + 1, 22, 30),
    allDay: !1,
    className: "bg-success"
}, {
    title: "Click for Google",
    start: new Date(o, d, 28),
    end: new Date(o, d, 29),
    url: "http://google.com/",
    className: "bg-dark"
}

';
die();


require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';


$class = new yii\helpers\ArrayHelper;

$config = $class::merge(
    require __DIR__ . '/../../../common/config/main.php',
    require __DIR__ . '/../../../common/config/main-local.php',  
    require __DIR__ . '/../../config/main.php',
    require __DIR__ . '/../../config/main-local.php'   

);

use yii\db\Query;


$query = new Query;
$userArr = $query->select('*')
->from(['user'])
//->where(['username' => Yii::$app->user->identity->username]) 
->one();

print_r($query );
die();


require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';


$class = new yii\helpers\ArrayHelper;

$config = $class::merge(
    require __DIR__ . '/../../../common/config/main.php',
    require __DIR__ . '/../../../common/config/main-local.php',  
    require __DIR__ . '/../../config/main.php',
    require __DIR__ . '/../../config/main-local.php'   

);

(new yii\web\Application($config))->run();


use yii\db\Query;

$query = new Query;
$userArr = $query->select('*')
->from(['user'])
->where(['username' => Yii::$app->user->identity->username]) 
->one();

var c = [{
                title: "All Day Event",
                start: new Date(o, d, 1)
            }, {
                title: "Long Event",
                start: new Date(o, d, n - 5),
                end: new Date(o, d, n - 2),
                className: "bg-warning"
            }, {
                id: 999,
                title: "Repeating Event",
                start: new Date(o, d, n - 3, 16, 0),
                allDay: !1,
                className: "bg-info"
            }, {
                id: 999,
                title: "Repeating Event",
                start: new Date(o, d, n + 4, 16, 0),
                allDay: !1,
                className: "bg-primary"
            }, {
                title: "Meeting",
                start: new Date(o, d, n, 10, 30),
                allDay: !1,
                className: "bg-success"
            }, {
                title: "Lunch",
                start: new Date(o, d, n, 12, 0),
                end: new Date(o, d, n, 14, 0),
                allDay: !1,
                className: "bg-danger"
            }, {
                title: "Birthday Party",
                start: new Date(o, d, n + 1, 19, 0),
                end: new Date(o, d, n + 1, 22, 30),
                allDay: !1,
                className: "bg-success"
            }, {
                title: "Click for Google",
                start: new Date(o, d, 28),
                end: new Date(o, d, 29),
                url: "http://google.com/",
                className: "bg-dark"
            }]



require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';


$class = new yii\helpers\ArrayHelper;

//C:\workspace\frontend\config\main.php
//C:\workspace\frontend\web\ajax\loadCalendarEvents.ajax.php

print_r($class);
die();

$config = $class::merge(
    //require __DIR__ . '/../../../common/config/main.php',
    //require __DIR__ . '/../../../common/config/main-local.php',  
    require __DIR__ . '/../../config/main.php'
    //require __DIR__ . '/../../config/main-local.php'  
);
die('___');
(new yii\web\Application($config))->run();

die('___');
use yii\db\Query;

$query = new Query;
$eventsArr = $query->select('*')
                    ->from(['events'])
                    ->where(['username' => Yii::$app->user->identity->username]) 
                    ->all();
echo json_encode($eventsArr);
die();

$arr =  [

        [
            'title' => 'Click for Google',
            'start' => '2023-03-10',
            'end' => '2023-03-10',
            'url' => 'http://google.com/',
            'className' => 'bg-dark1'
        ],
        [
            'title' => 'Click for Google',
            'start' => '2023-03-10',
            'end' => '2023-03-10',
            'url' => 'http://google.com/',
            'className' => 'bg-dark1'
        ]
];

echo json_encode($arr);
die();

*/