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

    public static function cleanTynyMceText($text)
    {

        $arrOptions = ['strong', 'p', 'span','table','h1','div', 'h2', 'h3', 'h4', 'h5'];

        foreach($arrOptions as $value){

            switch($value){
                case 'strong':
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

    public static function upload($sImageFilePath, $width, $height, $mode, $quality, $chosenFileName) {    
        Yii::$app->imageresize->getUrl($sImageFilePath, $width, $height, $mode, $quality, $chosenFileName);
    }
}


?>