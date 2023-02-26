<?php
namespace common\Helpers;
use yii\imagine\Image;  
use Imagine\Image\Box;
use Yii;

class Helpers{       
    
    public static function tableName()
    {
        return 'blogs';
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
}


?>