<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('other','public-menu');

/*
$json = file_get_contents(Yii::$app->basePath.'\web\json\public-menu.json');
$structure = Json::decode($json);
*/

$currentUrl = Yii::$app->controller->route;

?>

<nav class="collapse">
     <ul class="nav nav-pills" id="mainNav">
        <?php foreach ($structure['menu'] as $menucategory): ?> 


        <?php 

            $key = $menucategory['key']; 
            $url = (($menucategory['url'] == 'null') ? '#' : $menucategory['url']);
            $title = $menucategory['title'];   

        ?>

        <li class="dropdown">
       
            <?= Html::a(
                Yii::t('app', $title), 
                Url::toRoute($url),     
                [
                'class' => 'dropdown-item dropdown-toggle',
                'data-hash' => '',         
                'data-hash-offset' => 0,  
                'data-hash-offset-lg' => 130,  
                ]      
            ) ?>


            <?php if (!empty($menucategory['submenu'])): ?>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">   
                            <?php foreach ($menucategory['submenu'] as $submenu): ?>
                        
                                <?php 

                                    $key = $submenu['key']; 
                                    $url = (($submenu['url'] == 'null') ? null : Url::toRoute($submenu['url']));
                                    $title = $submenu['title']; 
                                    $hasArrow = (empty($submenu['submenu']) ? '' : 'has-arrow');    
                        
                                ?>
                        
                                <?= Html::a(
                                    '<span key="'.$key.'">'.Yii::t('app', $title).' </span>', 
                                    $url,     
                                    ['class' => 'dropdown-item']
                        
                                ) ?>              

                            <?php endforeach; ?>   
                    </li>
                </ul>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>






