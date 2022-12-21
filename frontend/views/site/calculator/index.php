<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrTeams = $model->getLastFileUploaded('team');  

$teams = array();

foreach($arrTeams as $team){
    if($team['location'] == 'about'){
        $teams[] = $team;
    }
}

/* @var $this yii\web\View */

$this->title = 'About Us';

$this->params['breadcrumbs'][] = $this->title;

$path2 = 'calories';
?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>
