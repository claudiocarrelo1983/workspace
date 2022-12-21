<?php

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';


$class = new yii\helpers\ArrayHelper;

$config = $class::merge(
    require __DIR__ . '/../../../common/config/main.php',
    require __DIR__ . '/../../../common/config/main-local.php',  
    require __DIR__ . '/../../config/main.php',
    require __DIR__ . '/../../config/main-local.php'   

);

print_r(new yii\console\Application($config)->run());
die();
print_r(Yii::t('app', "Home"));
die('____');




$arrayCheck = [
    [['sex'], 'string'],
    [['age'], 'min','5'],
    [['height'], 'min','100'],
    [['weight'], 'min','20'],
    [['height','age','weight'], 'integer'],
    [['height','age','sex','weight','measure'], 'required']
];

$arrTypes =  ['min','string','integer','required'];

$error = array();

foreach($arrTypes as $type){       
    foreach($arrayCheck as $col){   
        switch ($type) {
            case "string":  
            if($col[1] == $type){                    
                foreach($col[0] as $value){               
                    if(!is_string($_POST[$value])){                        
                        $error[$value] = ucfirst($value).Yii::t('app', " must be an string.");
                    }  
                }                      
            }                                          
            break;
            case "integer":   
            if($col[1] == $type){
                foreach($col[0] as $value){            
                    if(!is_numeric($_POST[$value])){
                        $error[$value] = ucfirst($value).Yii::t('app', " must be an integer.");
                    }  
                }                      
            }                
            break;
            case "required":   
            if($col[1]== $type){
                foreach($col[0] as $value){                         
                    if(empty($_POST[$value])){
                        $error[$value] = ucfirst($value).Yii::t('app', "  cannot be blank.");
                    }  
                }                      
            }  
            break;
            case "min":   
            if($col[1]== $type){
                foreach($col[0] as $value){   
                    if($_POST['measure'] == 'l'){

                        if($value == 'height'){
                            if($_POST[$value] < bcdiv($col[2],2.54,2)){                    
                                $error[$value] = ucfirst($value).Yii::t('app', "  cannot be less then.").bcdiv($col[2],2.54,2);
                            }  
                        }
                    
                        if($value == 'weight'){
                            if($_POST[$value] < bcmul($col[2],2.205,2)){                    
                                $error[$value] = ucfirst($value).Yii::t('app', "  cannot be less then.").bcmul($col[2],2.205,2);
                            }  
                        }
                            
                    } else{
                        if($_POST[$value] < $col[2]){                    
                            $error[$value] = ucfirst($value).Yii::t('app', "  cannot be less then.").$col[2];
                        }  
                    }                
                   
                }                      
            }  
            break;
          
        }         
    }
}


print_r($error);
die();


$sex = 0;
$age = 0;
$measure = 0;

if(isset($_POST['sex'])){
    $sex = $_POST['sex'];
}

if(isset($_POST['measure'])){
    $measure = $_POST['measure'];
}


if(isset($_POST['age']) && !empty($_POST['age'])){
    if($_POST['age'] < 5){
        $age = 1;
    }
}


$jsonReturn = ['validation'=> [], 'result'=> [], 'imc' => 0, 'sex' => $sex, 'age' => $age, 'measure' => $measure];

if(!empty($error)){       
    echo json_encode(array_merge($jsonReturn ,[
        'validation' => $error 
    ] 
));
    die();
}

if($_POST){

    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $height = ($measure == 'l') ? bcdiv($_POST['height'],2.54) : $_POST['height'];
    $weight = ($measure == 'l') ? bcmul($_POST['weight'],2.205) : $_POST['weight'];

    
    //IMC = Peso ÷ (Altura × Altura)
    $imc =  bcmul($height, $height,5);
    $imc =  bcdiv($weight, $imc,5);  

    $result = 1;    
    $from = 0;
    $to = '18.5';
    $color = '#5c9baa';   

    if($imc >= '0.001850'  && $imc <= '0.002490'){
        $from = '18.5';
        $to = '24.9';
        $result = '2';  
        $color = '#91c058';
    }

    if($imc >= '0.002500'  &&  $imc <= '0.002990'){
        $to = '25';
        $from = '29.9';
        $result = '3';  
        $color = '#e4b345';
    }  

    if($imc >= '0.003000'  &&  $imc <= '0.003490'){
        $from = '30';
        $to = '34.9';
        $result = '4';
        $color = '#d18b4b';
    }

    if($imc >= '0.003500'  &&  $imc <= '0.003990'){
        $from = '35';
        $to = '39.9';
        $result = '5';
        $color = '#c44b42';    
    }

    if($imc >= '0.004000'){
        $from = '40';
        $to = 0;
        $result = '6';
        $color = '#b33e36';    
    }
}

$imc =  bcmul(10000, $imc,2);  


$jsonReturn = array_merge($jsonReturn ,[
    'result' => $result, 
    'imc' => $imc, 
    'color' => $color
]);

echo json_encode($jsonReturn);
die();


