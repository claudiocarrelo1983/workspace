<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<nav class="collapse header-mobile-border-top">
    <ul class="nav nav-pills" id="menu-main-menu">    
        <li class="dropdown order-1">       
            <?= 
                Html::a(
                Yii::t('app', 'menu_about_us') ,                      
                Url::toRoute(['/'.Yii::$app->request->get('code').'#about']),
                [                  
                    'class' => 'dropdown-item',   
                    'data-hash' => '',                                               
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 92,  
                ] 
            ) 
            ?> 
        </li>   
        <li class="dropdown order-2">
            <?= 
                Html::a(
                Yii::t('app', 'menu_team') ,                      
                Url::toRoute(['/'.Yii::$app->request->get('code').'#team']),
                [
                    'href' => '#team',
                    'class' => 'dropdown-item',   
                    'data-hash' => '',                                               
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 92,  
                ] 
            ) 
            ?> 
        </li>    
           
        <li class="dropdown order-2">          
            <?= 
                Html::a(
                Yii::t('app', 'menu_services') ,                      
                Url::toRoute(['/'.Yii::$app->request->get('code').'#services']),
                [
                    'href' => '#services',
                    'class' => 'dropdown-item',   
                    'data-hash' => '',                                               
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 92,  
                ] 
            ) 
            ?> 
        </li>       

        <li class="dropdown order-3">           
            <?= 
                Html::a(
                Yii::t('app', 'menu_contacts') ,                      
                Url::toRoute(['/'.Yii::$app->request->get('code').'#contactus']),
                [
                    'href' => '#contactus',
                    'class' => 'dropdown-item',   
                    'data-hash' => '',                                               
                    'data-hash-offset' => 0,  
                    'data-hash-offset-lg' => 92,  
                ] 
            ) 
            ?> 
        </li>                              
    </ul>
</nav>