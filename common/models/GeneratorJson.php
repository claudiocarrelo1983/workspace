<?php

namespace common\models;
use Yii;
use yii\db\Query;
use yii\helpers\Json;
use yii\helpers\Url;

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

                switch ($table['TABLE_NAME']) {
                    case 'pricing':
                    case 'pricing_specs':
                    case 'translations':
                    case 'blogs':
                    case 'blogs_category':
                    case 'configurations':
                    case 'countries':
                    case 'faqs':
                    case 'subjects': 
                    case 'texts':    
                    case 'recipes':     
                    case 'recipes_category': 
                    case 'comments':       
                    case 'team':                
                        if(method_exists(__CLASS__, $method)){
                            GeneratorJson::$method($table['TABLE_NAME'],  $columns);            
                        }else{
                            GeneratorJson::updateTablesGeneric($table['TABLE_NAME'],  $columns);  
                        }             
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

    public static function methodTitleSimple($table){

        $method = '';       
      
        $table = explode("_",$table);            
    
        if(is_array($table)){
            foreach($table as $name){
                $method .= ucfirst($name);
            
            }              
        }else{
            $method = ucfirst($table);
        }                 
          
        return $method;
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

        $path = '';
        $return = array();

        if (file_exists($url)) {
            $rrFiles = scandir($url, 1);
        }else{
            return $return;
        }

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


    public static function updateRecipes($table, $columns){
        
        $recipesQuery = new Query; 
      
        $recipesArr = $recipesQuery->select('*')
            ->from('recipes')
            ->all();

        $recipesResult = [];    

        foreach($recipesArr as $key => $recipesValue){

            if($recipesValue['active'] == 1){

                $recipesStepArr = $recipesQuery->select('*')
                ->from('recipes_steps')
                ->where(['recipe_code' => $recipesValue['recipe_code']])
                ->all();

                $recipesFoodArr = $recipesQuery->select('*')
                    ->from('recipes_food')
                    ->where(['recipe_code' => $recipesValue['recipe_code']])
                    ->all();
                
                $recipesCatArr = $recipesQuery->select('*')
                    ->from('recipes_category')
                    ->where(['recipe_cat_code' => $recipesValue['recipe_cat_code']])
                    ->one();


                $recipesValue = array_merge($recipesValue, ['steps' => $recipesStepArr]);
                $recipesValue = array_merge($recipesValue, ['food' => $recipesFoodArr]);
                $recipesValue = array_merge($recipesValue, ['category' => ((isset($recipesCatArr['page_code'])) ? $recipesCatArr['page_code'] : '')]);
                $recipesResult[] = $recipesValue;   

            }           
        }

        GeneratorJson::saveJson($recipesResult , $table);
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

    public static function updateRecipesCategory($table, $columns){
        
        $recipesQuery = new Query; 
      
        $recipesQuery = new Query; 

        $recipesArr = $recipesQuery->select(
            $columns
        )
        ->from([$table])    
        ->orderBy([
            'order' => SORT_ASC          
          ])->all();

        GeneratorJson::saveJson($recipesArr, $table);
    }


    

    public static function updateBlogs($table, $columns){
        
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])   
        ->where([
            'publish' => true,  
            'active' => true,  
        ])     
        ->orderBy([       
            'order' => SORT_ASC          
          ])->all();

        GeneratorJson::saveJson($blogArr, $table);
    }

    public static function updateBlogsCategory($table, $columns){
        
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])   
        ->where([       
            'active' => true,  
        ])     
        ->orderBy([       
            'order' => SORT_ASC          
          ])->all();

        GeneratorJson::saveJson($blogArr, $table);
    }

    public static function updateConfigurations($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])->all();


        $arrResult = [];

        foreach($blogArr as $result){
            $arrResult[$result['field']] = $result['active'];
        }
 
        GeneratorJson::saveJson($arrResult, $table);
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

    public static function updateComments($table, $columns){
        
        $blogQuery = new Query; 
      
        $blogQuery = new Query; 

        $blogArr = $blogQuery->select(
            $columns
        )
        ->from([$table])    
        ->orderBy([
            'id' => SORT_ASC          
          ])->all();


        $arrResult = [];

        foreach($blogArr as $comments){
            $arrResult[$comments['page']][] = $comments;
        }
       
        GeneratorJson::saveJson($arrResult, $table);
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
                $result[trim($value['page_code'])] = trim($value['text']);
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

    
    public function populateTable(){

        $tables = GeneratorJson::getAllTables();    

        foreach($tables as $table){
            if(isset($table['TABLE_NAME'])){

                $method = 'updateTranslations'.ucfirst($table['TABLE_NAME']);    

                $columns = GeneratorJson::getTableColumns($table['TABLE_NAME']);

                switch ($table['TABLE_NAME']) {
                    /*
                    case 'pricing':
                    case 'pricing_specs':
                    case 'translations':
                    case 'blogs':
                    case 'blogs_category':
                    case 'configurations':
                    case 'countries':
                    case 'faqs':
                    case 'subjects': 
                    case 'texts':    
                    case 'recipes':     
                    case 'recipes_category': 
                    case 'comments':       
                    case 'team':     
                    */ 
                    case 'pricing_specs':
                    case 'faqs':
                    case 'subjects':  
                    case 'texts':    
                    case 'team':  
                    case 'recipes':     
                    case 'recipes_category': 
                    case 'recipes_steps': 
                    case 'recipes_food': 
                    case 'blogs_category':  
                    case 'blogs':     
                        GeneratorJson::updateTranslationsGeneric($table['TABLE_NAME'],  $columns);             
                }             
            }           
        }
    }

    public static function updateTranslationsGeneric($table,  $columns){
       
        $blogQuery = new Query;       

        $name = GeneratorJson::methodTitleSimple($table);

        $class = "common\models\\".ucfirst($name);        
    
        $blogArr = $blogQuery->select('*')
        ->from([$table])      
        ->all();
       
        $model = new $class();

        foreach($blogArr as $blog){
            foreach ($blog as $key => $value) {
                $model->$key = $blog[$key];      
            }    

            $method = 'update'.ucfirst($name);    
        
            $class::$method($table.'_text', $model);
        }     
 
    } 
    
    public static function populateTablesGeneric($table,  $columns){

        $connection = new Query;

        $arrTotal = GeneratorJson::getLastFileUploaded($table);  

        if(!empty($arrTotal)){
            foreach($arrTotal as $arrValues){
                $arrColumns = array();
                foreach ($arrValues as $key => $value) {
                    if($key != 'id'){
                        $arrColumns[$key] = $value;
                    }                   
                }
              
                switch($table){
                    case "blogs":
                    case "blogs_category":
                    case "countries":
                    case "texts":
                    case "translations":
                        //$connection->createCommand()->delete($table)->execute();
                        $connection->createCommand()->insert($table, $arrColumns)->execute();
        
                    
                    break;
                    case "comments":
                        break;
                    default:
                    print_r($table);
                    die();
                        break;
                }
              

            }       
        }  
    }  

    public function deploy(){
      
        /*
        git clone https://myrepo.com/git.git temp
        mv temp/ public_html/
        rm -rf temp
        */
        $session = ssh2_connect('lhcp3221.webapps.net', 25088, array('hostkey'=>'ssh-rsa'));

      
        $pubkeyfile = (Url::to('@backend/id_rsa.pub'));
        $pprivkeyfile = file_get_contents(Url::to('@backend/id_rsa.ppk'));


        if (ssh2_auth_pubkey_file(
                $session,
                'ob4pdc9t',
                $pubkeyfile,
                $pprivkeyfile,
                'Igredes-007'
            )) {
            echo "Public Key Authentication Successful\n";
        } else {
            die('Public Key Authentication Failed');
        }

        die('___');

        if (ssh2_auth_pubkey_file($connection, 'myspecialgym_key',
            '/home/ob4pdc9t/.ssh/myspecialgym_key',
            '/home/ob4pdc9t/.ssh/myspecialgym_key.pub', 'SHA256:8lrxMmkmqWjv+e6SI6DVLiAsZy+qvo/3yw55s8+tvtU')) {
            echo "Public Key Authentication Successful\n";
        } else {
            die('Public Key Authentication Failed');
        }

        ssh2_auth_password($connection, 'ob4pdc9t', 'W[F1+)c(w%dL');
        die('__');
        $stream = ssh2_exec($connection, '/usr/local/bin/php -i');
    }


}
