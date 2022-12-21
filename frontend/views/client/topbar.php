<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;


$json = file_get_contents(Yii::$app->basePath.'\views\json\client-menu.json');
$structure = Json::decode($json);

$currentUrl = Yii::$app->controller->route;

$active1 = '';
$active2 = '';
$active3 = '';

?>

<?php foreach ($structure['left-menu'] as $menucategory): ?>
    


<?php 

    $key = $menucategory['key']; 
    $url = (($menucategory['url'] == 'null') ? '#' : Url::toRoute($menucategory['url']));
    $title = $menucategory['title']; 
    $icon = $menucategory['icon']; 

    $hasArrow = (empty($menucategory['submenu']) ? '' : 'arrow-down');
    $dropDown = (empty($menucategory['submenu']) ? '' : 'dropdown');

    if(isset($menucategory['new']) && $menucategory['new'] == true){
        $badge = '<span class="badge rounded-pill bg-success float-end">New</span>';
    }

    if(isset($menucategory['key']) && $menucategory['key'] == 't-messages'){
        $numberMessages = 102;
        $badge = '<span class="badge rounded-pill bg-danger float-end">'.$numberMessages.'</span>';
    }
 
?>

<li class="nav-item <?= $dropDown ?>">


    <?= Html::a(
        '<i class="'.$icon.'"></i>  <span key="'.$key.'">'.$title.' </span>', 
        $url,     
        ['class' => 'nav-link dropdown-toggle '.$hasArrow.' waves-effect '],
        ['id' => '.$key.'],
        ['aria-expanded' => 'true']
    ) ?>

    
    <div class="dropdown-menu" aria-labelledby="<?= $key ?>">    
        
        <?php foreach ($menucategory['submenu'] as $submenu): ?>
        
                <?php 

                    $key = $submenu['key']; 
                    $url = (($submenu['url'] == 'null') ? null : Url::toRoute($submenu['url']));
                    $title = $submenu['title']; 
                    $hasArrow = (empty($submenu['submenu']) ? '' : 'has-arrow');    
           
                ?>
        
                <?= Html::a(
                    '<span>'.$title.' </span><div class="arrow-down"></div>', 
                    $url,     
                    ['class' => 'dropdown-item '. $hasArrow.' waves-effect '],
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
          
                
        <?php endforeach; ?>
    </div>
</li>
<?php endforeach; ?>




