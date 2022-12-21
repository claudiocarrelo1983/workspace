<?php

namespace common\models;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\helpers\Json;
   /*

    Generate Json on @frontend/web/json/blog/

    */
    
class GeneratorJson extends \yii\db\ActiveRecord
{

    public $imageFile;

    public $generate;
  

    public static function getAllTables()
    {
        preg_match("/dbname=([^;]*)/", Yii::$app->db->dsn, $matches);
        $database = $matches[1]; 
      
        $sql="SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='".$database."'";
        $tables = Yii::$app->db
                ->createCommand($sql)
                ->queryAll();

 
       return  $tables;
    }

    public  function generatejson()
    {    
        $tables = GeneratorJson::getAllTables();    

        foreach($tables as $table){
            if(isset($table['TABLE_NAME'])){

                $method = GeneratorJson::methodTitle($table['TABLE_NAME']);

                $columns = GeneratorJson::getTableColumns($table['TABLE_NAME']);

                if(method_exists(__CLASS__, $method)){
                    GeneratorJson::$method($table['TABLE_NAME'],  $columns);            
                }else{
                    GeneratorJson::updateTablesGeneric($table['TABLE_NAME'],  $columns);  
                }
            }           
        }
    }

    public static function methodTitle($table){

        $result = '';
        $method = '';       
      
        $table = explode("_",$table);            
    
        if(is_array($table)){
            foreach($table as $name){
                $method .= ucfirst($name);
            
            }              
        }else{
            $method = ucfirst($table);
        }                 
          
        $result = 'update'.$method;

        return $result;
    }
    


    public static function getTableColumns($table){    

        $result = array();
        $connection = Yii::$app->db;//get connection
        $dbSchema = $connection->schema;
        $tables = $dbSchema->getTableNames();
      
        //or $connection->getSchema();
        $tables = $dbSchema->getTableSchemas();//returns array of tbl schema's
        foreach($tables as $tbl)
        {            
            if($tbl->name == $table){     
                foreach($tbl->columns as $key => $value) {
                    $result[] = $key;
                }      
            }         
        }

        return  $result;    
    }

    public static function updateTablesGeneric($table,  $columns){

        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])      
        ->all();

        GeneratorJson::saveJson($blogArr, $table);
    }  
    public static function saveJson($blogArr, $table){       
     
        $directory = Yii::getAlias('@frontend/web/json/'.$table.'/');
     
        if (!file_exists($directory)) {      
            mkdir($directory, 0777, true);
        }else{
            GeneratorJson::deleteOldJson($table); 
        }

        $fileName = $table.'_'.date('YmdHis');        

        file_put_contents($directory.$fileName.'.json', json_encode($blogArr));  

    }

    public static function deleteOldJson($dir){

        $directory = Yii::getAlias('@frontend/web/json/'.$dir.'/');
        $rrFiles =scandir( $directory, 1);

        foreach($rrFiles as $key => $doc){
            if($key > 3){
                if($doc != '..' && $doc != '.'){
                    unlink( $directory.$doc);
                }             
            }
        }       
    }

    public static function getLastFileUploaded($dir, $specificfile = '', $pathParent = ''){

        $pathParent = (empty($pathParent)) ? 'frontend' : $pathParent;
        $url = Yii::getAlias('@'.$pathParent.'/web/json/'.$dir.'/');

        $rrFiles = scandir($url, 1);
      
    
        $path = '';
        $return = array();

        if(isset($rrFiles[0])){       
            if (strlen($rrFiles[0]) >= 3) {
                $path = $rrFiles[0];
            }          
        }    

        if(!empty($specificfile)){       
            $path = $specificfile . '.json';        
        }
    
        if (!empty($path)) { 
            if (file_exists($url.$path)) {         
                $json = file_get_contents($url.$path);
                 $return = Json::decode($json);
            }
        }    

        return  $return;
    }

    public static function updateTranslations($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogArr = $blogQuery->select(['t.country_code', 't.page_code', 't.text'])
            ->from(['t' => 'translations'])
            ->innerJoin(['c' => 'countries'], 'c.country_code = t.country_code')
            ->all();

        GeneratorJson::saveJson($blogArr, $table);
    }


    public static function updateFaqs($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])    
        ->orderBy([
            'order' => SORT_ASC          
          ])->all();


        GeneratorJson::saveJson($blogArr, $table);
    }

    public static function updateSubjects($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])    
        ->orderBy([
            'order' => SORT_ASC          
          ])->all();


        GeneratorJson::saveJson($blogArr, $table);
    }

    public static function updatePricingSpecs($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])    
        ->orderBy([
            'order' => SORT_ASC          
          ])->all();


        GeneratorJson::saveJson($blogArr, $table);
    }

    public static function getTranslations($language){
        
        $model = new GeneratorJson(); 
        $translations = $model->getLastFileUploaded('translations');  

        $result = array(); 

        foreach($translations as $value){
            if($language ==  $value['country_code']){
                $result[$value['page_code']] = $value['text'];
            }            
        }

        return  $result;
  
    }

    public static function getCountries(){              

        $model = new GeneratorJson(); 
        $countries = $model->getLastFileUploaded('countries');  
        
        $result =  array();

        foreach($countries as $country){
            $result[$country['country_code']] = $country['small_title'];               
        }

        $resultR['languages'] = $result;            
        
        return  $resultR;
  
    }

}
