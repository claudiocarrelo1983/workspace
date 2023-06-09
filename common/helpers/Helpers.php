<?php
namespace common\Helpers;
use yii\imagine\Image;  
use Imagine\Image\Box;
use yiier\chartjs\ChartJs;
use Yii;
use frontend\assets\PublicAsset;
//use frontend\assets\CalendarAsset;


use yii\db\Query;

class Helpers{       
    
    public static function tableName()
    {
        return 'blogs';
    }

    public static function getBaseUrl(){

        $url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //$url = parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST); 
        $base_url = trim($url, '/');  
        $base_url = explode('/', $base_url);
        $base_url =  $base_url['0'];
        $base_url = str_replace('http://','', $base_url);
        $base_url = str_replace('https://','', $base_url);    

        return $base_url;
    }

    public static function languageTranslations(){
  
        $base_url = Helpers::getBaseUrl();

        $tag = '';
        
        switch($base_url){
            case 'localhost:100':
            case 'specialcalendar.com':
                $tag =  '_calendar';                  
                break;
          
            case 'localhost':
            case 'myspecialgym.com':
                $tag =  '';     
                break;
            default:
                $tag = ''; 
            break;
        } 

        return $tag;
    }

    public static function logoHeader($size = 8){
        
        $logo = '';

        $base_url = Helpers::getBaseUrl();

        switch($base_url){
            case 'localhost:100':
            case 'specialcalendar.com':
                $logo =  '<div class="header-row">
                                <div class="header-logo">							
                                    <span class="text-color-light font-weight-normal text-'.$size.' mb-2 mt-2">Special</span>
                                    <span class="font-weight-extra-bold blue-lettering text-'.$size.' mb-2 mt-2">Calendar</span>						
                                </div>
                            </div>';                  
                break;
          
            case 'localhost':
            case 'myspecialgym.com':
                $logo =  '<div class="header-row">
                    <div class="header-logo">							
                            <span class="text-color-light font-weight-normal text-'.$size.' mb-2 mt-2">My </span>
                            <span class="text-color-light font-weight-extra-bold text-'.$size.' mb-2 mt-2">Special</span>
                            <span class="font-weight-extra-bold blue-lettering text-'.$size.' mb-2 mt-2">Gym</span>						
                    </div>
                </div>';   
                break;
            default:
                $logo = ''; 
            break;
        } 

        return $logo;
    }

    public static function companyUrl($val){     

        $base_url = Helpers::getBaseUrl();

        switch($base_url){
            case 'localhost:100':
            case 'specialcalendar.com':
                \frontend\assets\CalendarAsset::register($val);                    
                 break;
          
            case 'localhost':
            case 'myspecialgym.com':
                \frontend\assets\PublicAsset::register($val);
                break;
            default:
                \frontend\assets\PublicAsset::register($val);
            break;
        }              
    }


    public static function GUID(){
        
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public static function generateCompanyCode(){
        
        $int= mt_rand(1262055681,1262055681);

        $string = date("ymdhis",$int);

        return $string;

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public static function generateRandowHumber($keyLength = 8)
    {
        // Set a blank variable to store the key in
        $key = "";
        for ($x = 1; $x <= $keyLength; $x++) {
            // Set each digit
            $key .= random_int(0, 9);
        }

        return $key;
    }

    public static function cleanTynyMceText($text, $arrOptions = ['strong', 'p', 'span','table','h1','div', 'h2', 'h3', 'h4', 'h5'])
    {        

        foreach($arrOptions as $value){

            switch($value){
                case 'font-weight-semibold':
                case '<b>':
                case '</b>':
                    $text = str_replace($value, ' ', $text); 
                    break;
                case 'strong':
            
              
                    $start = '<'.$value;
                    $end = '>';
                  
                    
                    $start = preg_quote($start, '/');
                    $end = preg_quote($end, '/');
                    $regex = "/({$start})(.*?)({$end})/";
        
                    $text = preg_replace($regex, '', $text); 

                    break;
                case 'p':
                case 'span':                      
                case 'div':

                    $start = '<'.$value;
                    $end = '>';
                    $replacement = '<'.$value.'>';
                    
                    $start = preg_quote($start, '/');
                    $end = preg_quote($end, '/');
                    $regex = "/({$start})(.*?)({$end})/";
        
                    $text = preg_replace($regex, $replacement, $text); 

                    break;
                case 'table':
                    $text = strip_tags($text, '<p><a><em><span><table>');
                    break;
                case 'h1':
                case 'h2':              
                case 'h3':
                case 'h4':
                case 'h5':

                    $start = '<'.$value;
                    $end = '>';
                    $replacement = '';
                    
                    $start = preg_quote($start, '/');
                    $end = preg_quote($end, '/');
                    $regex = "/({$start})(.*?)({$end})/";
        
                    $text = preg_replace($regex, $replacement, $text);

                    break;
            }


        }

        return $text;
    }

    public static function removeSpecialChars($str){

        $unwanted_array = array(   
                'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' 
        );
        
        $str = strtr($str, $unwanted_array);

       $str = str_replace(" ", "-", strtolower($str));
       $str = str_replace(")", "", strtolower($str));
       $str = str_replace("(", "", strtolower($str));

        return $str;
    }

    public static function upload($sImageFilePath, $width, $height, $mode, $quality, $chosenFileName) {    
        Yii::$app->imageresize->getUrl($sImageFilePath, $width, $height, $mode, $quality, $chosenFileName);
    }

    public static function lines($resultIntake){

        return  ChartJs::widget([
            'type' => 'line',
            
            'options' => [
                'responsive' => true,
                'height' => 200,
                'width' => 400,	
                'legend' => [	
                    'position'=> 'top',
                    'display'=> true		
                ],													
            ],										
            'data' => [
                'labels' => $resultIntake['date'],
                'datasets' => [
                    [					
                        'fill' => false,
                        'backgroundColor' => 'none',
                        'label'=> 'Calories',
                        'borderColor' => "#f7a923",
                        'data' => $resultIntake['calories']									
                    ]
                ]
            ],
            'clientOptions' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ]
            ]

        ]);
    }

    public static function bars($foodIntake, $chart = 'bar')
    {
     
        echo ChartJs::widget([
                'type' => $chart,   
                'options' => [
                    'responsive' => true,
             
                    'legend' => [	
                        'position'=> 'top',
                        'display'=> true		
                    ],	
                    'scales' => [
                        'x' => [
                            
                            'stacked' => true,
                            'display' => true,
                            'title' => [
                                'display' => true,
                                'text' => 'Value',                        
                            ]
                          
                        ],
                        'y' => [
                            'stacked' => true,
                            'display' => true,
                            'title' => [
                                'display' => true,
                                'text' => 'Value',                        
                            ]
                        ]
                    ]												
                ],	         
                'data' => [
                    'labels' =>  $foodIntake['date'],
                    'datasets' => [[
                        'type' => $chart,
                        'label'=> 'Fat (%)',
                        'yAxisID'=>"y-axis-0",
                        'backgroundColor' => "#1abd99",
                        'data' =>  $foodIntake['lipids'],
                    ],
                    [
                        'type'=> $chart,
                        'label'=> 'Carbs (%)',
                        'yAxisID'=>"y-axis-0",
                        'backgroundColor' => "#f7a923",
                        'data' =>  $foodIntake['carbs'],
                    ],
            
                    [
                        'type' => $chart,
                        'label'=> 'Protein (%)',
                        'yAxisID'=>"y-axis-0",
                        'backgroundColor' => "#e64a18",
                        'data' =>  $foodIntake['protein'],
                    ],
                    ]
                ],
                'clientOptions' =>
                [
                    'options' => [
                        'title'=>[
                            'display' => true,
                        ],
                        'tooltips'=>[
                            'mode'=> 'label'
                        ],
                        'responsive'=> true,
                    ],
                    
                    'scales'=> [
                        'xAxes'=> [
                            [
                                'stacked'=>true,
                                'labelString' =>  '%'

                    
                            ],
                        ],
                        'yAxes'=>[
                            [
                                'stacked'=>true,
                                'labelString' =>  '%'
                    
                            ],                          

                        ]
                    ],
                ],
            ]);

    }

    public static function getFoodIntake($username){


        $result = [];
        $macrosArr = [];

        $types = ['all','month','week'];

        foreach($types as $type){            

            switch($type){
                case 'all':
                    $command = Yii::$app->db->createCommand("SELECT * FROM (
                        SELECT *
                            FROM `macros` WHERE username='".$username."'  ORDER BY `date` DESC LIMIT 90
                        ) t1 ORDER BY t1.date");
                    
                    $macrosArr = $command->queryAll();
                    break;
                case 'month':
                    $command = Yii::$app->db->createCommand("SELECT * FROM (
                        SELECT *
                            FROM `macros` WHERE username='".$username."'  ORDER BY `date` DESC LIMIT 30
                        ) t1 ORDER BY t1.date");
                    
                    $macrosArr = $command->queryAll();
                    break;                   
                case 'week':

                    $command = Yii::$app->db->createCommand("SELECT * FROM (
                        SELECT *
                        FROM `macros` WHERE username='".$username."'  ORDER BY `date` DESC LIMIT 7
                    ) t1 ORDER BY t1.date");
                    $macrosArr = $command->queryAll();
                    break;
            }
        

            $protein = [];
            $calories = [];
            $carbs = [];
            $lipids = [];
            $date = [];

            foreach($macrosArr as $macros){
                $date[]  =  date('d M', strtotime($macros['date']));
                $calories[] = $macros['calories'];
                $protein[] = $macros['protein'];
                $carbs[]  = $macros['carbs'];
                $lipids[]  = $macros['lipids'];
            }

            $result[$type] = [
                'date' => $date,
                'calories' => $calories,
                'protein' => $protein,
                'carbs' => $carbs,
                'lipids' => $lipids,
            ];

        }

        return $result;

    }
}


?>