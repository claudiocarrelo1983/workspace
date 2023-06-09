<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\GeneratorJson;


$model = new GeneratorJson(); 
$structure = $model->getLastFileUploaded('other','admin-menu','backend');

$currentUrl = Yii::$app->controller->route;

$active1 = '';
$active2 = '';
$active3 = '';


?>

<?php foreach ($structure['left-menu'] as $menucategory): ?>
    

<?php 

    $key = $menucategory['key']; 
    
    if($menucategory['url'] == 'home'){
        $url = Url::home();
    }else{
        $url = (($menucategory['url'] == 'null') ? null : Url::toRoute($menucategory['url']));
    }

    $title = $menucategory['title']; 
    $icon = $menucategory['icon']; 

    $hasArrow = (empty($menucategory['submenu']) ? '' : 'has-arrow');
    $active1 = (($currentUrl  == $menucategory['url']) ? 'mm-active' : '');  

    $expand = ''; 
    $badge = '';

    if(isset($menucategory['childs'])){
        foreach($menucategory['childs']  as $child){        
            if($child == $currentUrl){
                $active1 = 'mm-active';
                $expand = 'mm-show';   
                break;          
            }
        }
    } 

    if(isset($menucategory['new']) && $menucategory['new'] == true){
        $badge = '<span class="badge rounded-pill bg-success float-end">New</span>';
    }

    if(isset($menucategory['key']) && $menucategory['key'] == 't-messages'){
        $numberMessages = 102;
        $badge = '<span class="badge rounded-pill bg-danger float-end">'.$numberMessages.'</span>';
    }
 
?>

<li>

    <?= Html::a(
        '<i class="'.$icon.'"></i>  <span>'.$title.' </span>'.$badge, 
        $url,     
        ['class' => $hasArrow.' waves-effect '.$active1],
        ['aria-expanded' => 'true']
    ) ?>

    <ul class="sub-menu <?= $expand  ?>" aria-expanded="true">
        
        <?php foreach ($menucategory['submenu'] as $submenu): ?>

                <?php 



                    $key = $submenu['key']; 
                    $url = (($submenu['url'] == 'null') ? null : Url::toRoute($submenu['url']));
                    $title = $submenu['title']; 
                    $hasArrow = (empty($submenu['submenu']) ? '' : 'has-arrow');      
                    $active2 = (($currentUrl  == $submenu['url']) ? 'mm-active' : '');
                ?>

                <li>           
                <?= Html::a(
                    '<span>'.$title.' </span>', 
                    $url,     
                    ['class' => $hasArrow.' waves-effect '.$active2],
                    ['aria-expanded' => 'true']
                ) ?>

                    <ul class="sub-menu" aria-expanded="true">
                        <?php foreach ($submenu['submenu'] as $submenu2): ?>
                        
                        <?php 
                            $key = $submenu2['key']; 
                            $url = (($submenu2['url'] == 'null') ? null : Url::toRoute($submenu2['url']));
                            $title = $submenu2['title']; 
                            $hasArrow = (empty($submenu2['submenu']) ? '' : 'has-arrow');                     
                        ?>

                        <li>                        
                            <?= Html::a(
                                '<span>'.$title.' </span>', 
                                null,     
                                ['class' => $hasArrow.' waves-effect '.$active3],
                                ['aria-expanded' => 'true']
                            ) ?>                        
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
