<?php
namespace common\Helpers;
use common\models\LoginForm;
use yii\bootstrap4\Html;
use yiier\chartjs\ChartJs;
use Yii;
use frontend\assets\PublicAsset;
use yii\helpers\Url;
use common\models\User;
use common\models\CompanyLocations;

//use frontend\assets\CalendarAsset;


use yii\db\Query;

class Helpers{   
    
    
    
    public static function myCompanyArr(){

        $query = new Query;         

        $companyArr = $query->select([
            'color', 
            'path',     
            'coin',    
            'company_code',
            'company_name',
            'image_logo',
            'image_banner',
            'page_code_text',
            'cancelation_time',
            'subtitle_pt',
            'subtitle_en',
            'pinterest',
            'facebook',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube',
            'website',
            'page_code_team_title',
            'page_code_subtitle',
            'page_code_team_text',
            'page_code_manteinance',
            'page_code_banner',
            'sheddule_array',
            'manteinance',
        ])
        ->from(['company'])
        ->where(
            [
                'company_code_url' => Yii::$app->request->get('code')         
            ])
        ->one(); 

        $arrResult = [
            'color' => (empty($companyArr['color']) ? '#0088CC' : $companyArr['color']),            
            'path' => (empty($companyArr['path']) ? '/images/company/' : $companyArr['path']),
            'coin' => (empty($companyArr['coin']) ? '' : $companyArr['coin']),
            'company_code' => (empty($companyArr['company_code']) ? '' : $companyArr['company_code']),
            'company_name' => (empty($companyArr['company_name']) ? '' : $companyArr['company_name']),
            'cancelation_time' => (empty($companyArr['cancelation_time']) ? '' : $companyArr['cancelation_time']),
            'page_code_text' => (empty($companyArr['page_code_text']) ? '' : $companyArr['page_code_text']),
            'page_code_team_title' => (empty($companyArr['page_code_team_title']) ? '' : $companyArr['page_code_team_title']),
            'page_code_team_text' => (empty($companyArr['page_code_team_text']) ? '' : $companyArr['page_code_team_text']),
            'page_code_subtitle' => (empty($companyArr['page_code_subtitle']) ? '' : $companyArr['page_code_subtitle']),
            'image_logo' => (empty($companyArr['image_logo']) ? 'generic-logo.jpg' : $companyArr['image_logo']),
            'image_banner' => (empty($companyArr['image_banner']) ? 'generic-background.jpg' : $companyArr['image_banner']),
            'page_code_manteinance' => (empty($companyArr['page_code_manteinance']) ? 'menu_admin_campaign_manteinance_text' : $companyArr['page_code_manteinance']),
            'sheddule_array' =>  (empty($companyArr['sheddule_array']) ? Helpers::getJsonDefaulthShedule() : $companyArr['sheddule_array']),
            'subtitle_pt' =>  (empty($companyArr['subtitle_pt']) ? '' : $companyArr['subtitle_pt']),
            'subtitle_en' =>  (empty($companyArr['subtitle_en']) ? '' : $companyArr['subtitle_en']),
            'pinterest' =>  (empty($companyArr['pinterest']) ? '' : $companyArr['pinterest']),
            'instagram' =>  (empty($companyArr['instagram']) ? '' : $companyArr['instagram']),
            'twitter' =>  (empty($companyArr['twitter']) ? '' : $companyArr['twitter']),
            'tiktok' =>  (empty($companyArr['tiktok']) ? '' : $companyArr['tiktok']),
            'linkedin' =>  (empty($companyArr['linkedin']) ? '' : $companyArr['linkedin']),
            'website' =>  (empty($companyArr['website']) ? '' : $companyArr['website']),
            'facebook' =>  (empty($companyArr['facebook']) ? '' : $companyArr['facebook']),
            'youtube' => (empty($companyArr['youtube']) ? '' : $companyArr['youtube']),
            'manteinance' => (empty($companyArr['manteinance']) ? 0 : $companyArr['manteinance']),
        ];
      

        return  $arrResult;
    }

    public static function validationScheduleTimespan($hourKey, $companyCode){

        $arrCompany = Helpers::arrayCompany(['company_code' => $companyCode], 'one');

        $minusTime = (isset($arrCompany['timespan']) ? $arrCompany['timespan'] : 0);
    
        $timespanTime =  date('Y-m-d H:i', strtotime(date('Y-m-d H:i',$hourKey). '-'.$minusTime.' minutes'));

        $str = false;

        if(date('Y-m-d H:i') < $timespanTime){
       
            $str = true;
        }
       

        return $str;
    }

    public static function sendSms($model, $type){

        $str = true;

        return $str;
    }

    public static function sendEmail($model, $type){

        $str = true;

        return $str;
    }



    public static function getJsonDefaulthShedule(){

        $str = '{"monday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"tuesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"wednesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"thursday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"friday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"saturday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"sunday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"true"}}';

        return $str;
    }


    public static function myCompanyDetailsArr(){

        $query = new Query;     
        $companyArr = $query->select([
            'c.page_code_team_title',
            'c.page_code_team_text',
            'c.subtitle_pt',
            'c.subtitle_en',
            'c.text_pt',
            'c.text_en',
            'c.page_code_team_text',
            'c.color',
            'c.path' ,
            'c.image_logo' ,  
            'c.image_banner' ,
            'c.coin' ,         
            'c.company_code' ,
            'c.company_code_url' ,
            'c.company_name' ,
            'c.page_code_text',
            'l.address_line_1',
            'l.address_line_2',
            'l.city',
            'l.postcode',
            'l.country',
            'c.website',
            'c.facebook',
            'c.pinterest',
            'c.instagram',
            'c.twitter',
            'c.tiktok',   
            'c.linkedin',
            'c.youtube',
            'l.google_location',
            'l.contact_number',   
            'l.email',   
            'l.location_code',
            'l.location',
            'l.sheddule_array'
        ])
        ->from(['c' => 'company'])
        ->leftJoin(['l' => 'company_locations'], 'c.company_code = l.company_code')
        ->where(
            [
            'c.company_code_url' => Yii::$app->request->get('code')           
            ])
        ->all();   

        return  $companyArr;
    }
    
    public static function accessAccountAdmin($model){

        $error = 0;

        if(isset($model->subscription_startingdate)){          

            $dateNow = time(); //current timestamp
            $dateSubscription = strtotime($model->subscription_startingdate); 
        
            $dateDiference = $dateNow - $dateSubscription;
            $days =  round($dateDiference / (60 * 60 * 24));   
           
          
            if ($days >= 30  && $model->subscription == 'trial') {                
                Yii::$app->user->logout();              
                $error = 2;
            }  
        }       
    

        if(isset($model->level)){      
            if ($model->level != 'admin') {  
                Yii::$app->user->logout();      
                $error = 1;
            }  
        }      
       
        return $error;
 
    }


    public static function accessAccountSuperAdmin($model){        
        
        $active = 1;       

        if(isset($model->level)){      
            if ($model->level != 'superadmin') {  
                Yii::$app->user->logout();      
                $active = 0;
            }  
        }   

        return $active;
 
    }

    public static function accessAccountClient($model){
              
        $active = 0;

        /*
        print_r(Helpers::checkClientManteinance());
        die();

        */
        if(isset($model->level)){      
            if ($model->level != 'client' || $model->level != 'team' ) {  
                Yii::$app->user->logout();      
                $active = 0;
            }  
        }   

        return $active; 
 
    }

    public static function checkClientManteinance(){

        $query = new Query;
     
        $valueCompany = $query->select('manteinance')
            ->from('company')
            ->where(['company_code_url' => Yii::$app->request->get('code')])
            ->one();        
  

        return $valueCompany;

    }


    public static function accessAccountTeam($model){

        $dateNow = time(); //current timestamp
        $dateSubscription = strtotime(Yii::$app->user->identity->subscription_startingdate); 
    
        $dateDiference = $dateNow - $dateSubscription;
        $days =  round($dateDiference / (60 * 60 * 24));

        if ($days >= 30) {     
            return $model->goHome();
        }  
      
        switch (Yii::$app->user->identity->level){
            case 'admin':

                if (Yii::$app->user->isGuest) {
                    return $model->goHome();
                }        

                break;
            case 'superadmin':
                    
                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  

                break;
            case 'client':

                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  

                break;
            case 'team':

                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  
                    
                break;
            default:
                    return $model->goHome();
                break;
        }    
 
    }

    public static function accessAccountResseller($model){

        $dateNow = time(); //current timestamp
        $dateSubscription = strtotime(Yii::$app->user->identity->subscription_startingdate); 
    
        $dateDiference = $dateNow - $dateSubscription;
        $days =  round($dateDiference / (60 * 60 * 24));

        if ($days >= 30) {     
            return $model->goHome();
        }  
      
        switch (Yii::$app->user->identity->level){
            case 'admin':

                if (Yii::$app->user->isGuest) {
                    return $model->goHome();
                }        

                break;
            case 'superadmin':
                    
                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  

                break;
            case 'client':

                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  

                break;
            case 'team':

                    if (Yii::$app->user->identity->level != 'admin') {
                        return $model->goHome();
                    }  
                    
                break;
            default:
                    return $model->goHome();
                break;
        }    
 
    }


    
    public static function tableName()
    {
        return 'blogs';
    }

    public static function getBegginningOfString($text, $nChars = 50)
    {
        $result = substr($text, 0, $nChars);

        $dots = (strlen($text) >= $nChars) ? '...' : '';
        return $result.$dots;
    }
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

    public static function methodTitleSimple($table, $str = ''){

        $method = '';       
      
        $table = explode("_",$table);            
    
        if(is_array($table)){
            foreach($table as $name){
                $method .= ucfirst($name);
            
            }              
        }else{
            $method = ucfirst($table);
        }                 
          
        return $str.$method;
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

    
    public static function saveJson($valuesArr, $table){       
     
        $directory = Yii::getAlias('@frontend/web/json/'.$table.'/');
     
        if (!file_exists($directory)) {      
            mkdir($directory, 0777, true);
        }else{
            GeneratorJson::deleteOldJson($table); 
        }

        $fileName = $table.'_'.date('YmdHis');       

        file_put_contents($directory.$fileName.'.json', json_encode($valuesArr));  

    }

    public static function deleteOldImages($dir, $rejectArr = []){

        $directory = Yii::getAlias('@frontend/web/'.$dir.'/');
        $rrFiles = scandir( $directory, 1);

     
        foreach($rrFiles as $key => $doc){  

            $found = 0;

            foreach($rejectArr as $file){             
                if (str_contains($doc, $file)) {              
                    $found = 1;
                    break;
                }
            }   

            if(!$found){         
                if($doc != '..' && $doc != '.'){
                    unlink($directory.$doc);
                }             
            }               
        }       
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

    public static function getPathUrl(){

        $url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";     
        //$url = parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST); 
        $baseUrl = trim($url, '/');  
        $baseUrl = explode('/', $baseUrl);
        $baseUrl =  $baseUrl['0'];
        $baseUrl = str_replace('http://','', $baseUrl);
        $baseUrl = str_replace('https://','', $baseUrl);   
        $baseUrl = str_replace($baseUrl, '', $url) ;

        return $baseUrl;
    }

    public static function languageTranslations(){
  
        $base_url = Helpers::getBaseUrl();

        $tag = '';
        
        switch($base_url){
            case 'localhost':
            case 'specialcalendar.com':
                $tag =  '_calendar';                  
                break;
          
            case 'localhost:100':
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
            case 'localhost':
            case 'specialcalendar.com':
                $logo =  '<div class="header-row">
                                <div class="header-logo">							
                                    <span class="text-color-light font-weight-normal text-'.$size.' mb-2 mt-2">Special</span>
                                    <span class="font-weight-extra-bold blue-lettering text-'.$size.' mb-2 mt-2">Calendar</span>						
                                </div>
                            </div>';                  
                break;
          
            case 'localhost:100':
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
            $logo =  '<div class="header-row">
                        <div class="header-logo">							
                            <span class="text-color-light font-weight-normal text-'.$size.' mb-2 mt-2">Special</span>
                            <span class="font-weight-extra-bold blue-lettering text-'.$size.' mb-2 mt-2">Calendar</span>						
                        </div>
                      </div>'; 
            break;
        } 

        return $logo;
    }

    public static function companyUrl($val){     

        $base_url = Helpers::getBaseUrl();

        switch($base_url){
            case 'localhost':
            case 'specialcalendar.com':
                \frontend\assets\CalendarAsset::register($val);                    
                 break;
          
            case 'localhost:100':
            case 'myspecialgym.com':
                \frontend\assets\PublicAsset::register($val);
                break;
            default:
                \frontend\assets\PublicAsset::register($val);
            break;
        }              
    }



    public static function getCurrencyName($currencyCode){

        $currencyList = Helpers::currencyArr();

        foreach($currencyList as  $key => $value){
            if(strtolower($currencyCode) == strtolower($key)){          
                return strtolower($key);
            }         
        }

        return '';
    }

    public static function getCountryName($countryCode){

        $countryList = Helpers::countryArr();

        foreach($countryList as  $key => $value){
            if(strtolower($countryCode) == strtolower($key)){
                return $value;
            }         
        }

        return '';
    }
    public static function countriesDropdownArr(){

            $countryList = Helpers::countryArr();
        
            $arrCountry = [];
            foreach($countryList as  $key => $value){
                $arrCountry[$key] = $value;
            }

            return $arrCountry;
    }

    public static function currencyDropdownArr(){

        $currencyList = Helpers::currencyArr();
    
        $arrCurrency = [];        
        foreach($currencyList as  $key => $value){
            $arrCurrency[$key] = $value;
        }

        return $arrCurrency;
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

    public static function generateRandowHumber($keyLength = 3)
    {
        // Set a blank variable to store the key in
        $key = date('YmdHis');

        for ($x = 1; $x <= $keyLength; $x++) {
            // Set each digit
            $key .= random_int(0, 9);
        }

        return $key;
    }

    public static function bookingRandowUsername($userArr, $time, $date, $company){

        $query = new Query();

        $explodTeamArr = explode('|', $userArr);

        foreach($explodTeamArr as $username){

            if(!empty($username)){

                $resultArr = $query->select(['*'])
                    ->from(['sheddule'])
                    ->where(
                    [            
                        'date' => $date,
                        'time' => $time,              
                        'company_code' => $company, 
                        'team_username' => $username                                             
                    ])           
                    ->one(); 

                if(empty($resultArr)){                
                    return $username;
                }
            }
        }

        return '';
      
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

    public static function timeSheddulleArr(){   

        $timeArr = array(
            "15" => "15",
            "30" => "30",
            "45" => "45",
            "60" => "60",      
            "90" => "90",  
            "120" => "120"  
        );

        return $timeArr;
    }

    public static function currencyArr(){   


        $currencyArr = array(
            "EUR" => "Euro",
            "USD" => "US Dollar",
            "GBP" => "British Pound Sterling",       
        );

        return $currencyArr;

        $currencyArr = array(
            "AFA" => "Afghan Afghani",
            "ALL" => "Albanian Lek",
            "DZD" => "Algerian Dinar",
            "AOA" => "Angolan Kwanza",
            "ARS" => "Argentine Peso",
            "AMD" => "Armenian Dram",
            "AWG" => "Aruban Florin",
            "AUD" => "Australian Dollar",
            "AZN" => "Azerbaijani Manat",
            "BSD" => "Bahamian Dollar",
            "BHD" => "Bahraini Dinar",
            "BDT" => "Bangladeshi Taka",
            "BBD" => "Barbadian Dollar",
            "BYR" => "Belarusian Ruble",
            "BEF" => "Belgian Franc",
            "BZD" => "Belize Dollar",
            "BMD" => "Bermudan Dollar",
            "BTN" => "Bhutanese Ngultrum",
            "BTC" => "Bitcoin",
            "BOB" => "Bolivian Boliviano",
            "BAM" => "Bosnia-Herzegovina Convertible Mark",
            "BWP" => "Botswanan Pula",
            "BRL" => "Brazilian Real",
            "GBP" => "British Pound Sterling",
            "BND" => "Brunei Dollar",
            "BGN" => "Bulgarian Lev",
            "BIF" => "Burundian Franc",
            "KHR" => "Cambodian Riel",
            "CAD" => "Canadian Dollar",
            "CVE" => "Cape Verdean Escudo",
            "KYD" => "Cayman Islands Dollar",
            "XOF" => "CFA Franc BCEAO",
            "XAF" => "CFA Franc BEAC",
            "XPF" => "CFP Franc",
            "CLP" => "Chilean Peso",
            "CLF" => "Chilean Unit of Account",
            "CNY" => "Chinese Yuan",
            "COP" => "Colombian Peso",
            "KMF" => "Comorian Franc",
            "CDF" => "Congolese Franc",
            "CRC" => "Costa Rican Colón",
            "HRK" => "Croatian Kuna",
            "CUC" => "Cuban Convertible Peso",
            "CZK" => "Czech Republic Koruna",
            "DKK" => "Danish Krone",
            "DJF" => "Djiboutian Franc",
            "DOP" => "Dominican Peso",
            "XCD" => "East Caribbean Dollar",
            "EGP" => "Egyptian Pound",
            "ERN" => "Eritrean Nakfa",
            "EEK" => "Estonian Kroon",
            "ETB" => "Ethiopian Birr",
            "EUR" => "Euro",
            "FKP" => "Falkland Islands Pound",
            "FJD" => "Fijian Dollar",
            "GMD" => "Gambian Dalasi",
            "GEL" => "Georgian Lari",
            "DEM" => "German Mark",
            "GHS" => "Ghanaian Cedi",
            "GIP" => "Gibraltar Pound",
            "GRD" => "Greek Drachma",
            "GTQ" => "Guatemalan Quetzal",
            "GNF" => "Guinean Franc",
            "GYD" => "Guyanaese Dollar",
            "HTG" => "Haitian Gourde",
            "HNL" => "Honduran Lempira",
            "HKD" => "Hong Kong Dollar",
            "HUF" => "Hungarian Forint",
            "ISK" => "Icelandic Króna",
            "INR" => "Indian Rupee",
            "IDR" => "Indonesian Rupiah",
            "IRR" => "Iranian Rial",
            "IQD" => "Iraqi Dinar",
            "ILS" => "Israeli New Sheqel",
            "ITL" => "Italian Lira",
            "JMD" => "Jamaican Dollar",
            "JPY" => "Japanese Yen",
            "JOD" => "Jordanian Dinar",
            "KZT" => "Kazakhstani Tenge",
            "KES" => "Kenyan Shilling",
            "KWD" => "Kuwaiti Dinar",
            "KGS" => "Kyrgystani Som",
            "LAK" => "Laotian Kip",
            "LVL" => "Latvian Lats",
            "LBP" => "Lebanese Pound",
            "LSL" => "Lesotho Loti",
            "LRD" => "Liberian Dollar",
            "LYD" => "Libyan Dinar",
            "LTC" => "Litecoin",
            "LTL" => "Lithuanian Litas",
            "MOP" => "Macanese Pataca",
            "MKD" => "Macedonian Denar",
            "MGA" => "Malagasy Ariary",
            "MWK" => "Malawian Kwacha",
            "MYR" => "Malaysian Ringgit",
            "MVR" => "Maldivian Rufiyaa",
            "MRO" => "Mauritanian Ouguiya",
            "MUR" => "Mauritian Rupee",
            "MXN" => "Mexican Peso",
            "MDL" => "Moldovan Leu",
            "MNT" => "Mongolian Tugrik",
            "MAD" => "Moroccan Dirham",
            "MZM" => "Mozambican Metical",
            "MMK" => "Myanmar Kyat",
            "NAD" => "Namibian Dollar",
            "NPR" => "Nepalese Rupee",
            "ANG" => "Netherlands Antillean Guilder",
            "TWD" => "New Taiwan Dollar",
            "NZD" => "New Zealand Dollar",
            "NIO" => "Nicaraguan Córdoba",
            "NGN" => "Nigerian Naira",
            "KPW" => "North Korean Won",
            "NOK" => "Norwegian Krone",
            "OMR" => "Omani Rial",
            "PKR" => "Pakistani Rupee",
            "PAB" => "Panamanian Balboa",
            "PGK" => "Papua New Guinean Kina",
            "PYG" => "Paraguayan Guarani",
            "PEN" => "Peruvian Nuevo Sol",
            "PHP" => "Philippine Peso",
            "PLN" => "Polish Zloty",
            "QAR" => "Qatari Rial",
            "RON" => "Romanian Leu",
            "RUB" => "Russian Ruble",
            "RWF" => "Rwandan Franc",
            "SVC" => "Salvadoran Colón",
            "WST" => "Samoan Tala",
            "STD" => "São Tomé and Príncipe Dobra",
            "SAR" => "Saudi Riyal",
            "RSD" => "Serbian Dinar",
            "SCR" => "Seychellois Rupee",
            "SLL" => "Sierra Leonean Leone",
            "SGD" => "Singapore Dollar",
            "SKK" => "Slovak Koruna",
            "SBD" => "Solomon Islands Dollar",
            "SOS" => "Somali Shilling",
            "ZAR" => "South African Rand",
            "KRW" => "South Korean Won",
            "SSP" => "South Sudanese Pound",
            "XDR" => "Special Drawing Rights",
            "LKR" => "Sri Lankan Rupee",
            "SHP" => "St. Helena Pound",
            "SDG" => "Sudanese Pound",
            "SRD" => "Surinamese Dollar",
            "SZL" => "Swazi Lilangeni",
            "SEK" => "Swedish Krona",
            "CHF" => "Swiss Franc",
            "SYP" => "Syrian Pound",
            "TJS" => "Tajikistani Somoni",
            "TZS" => "Tanzanian Shilling",
            "THB" => "Thai Baht",
            "TOP" => "Tongan Pa'anga",
            "TTD" => "Trinidad & Tobago Dollar",
            "TND" => "Tunisian Dinar",
            "TRY" => "Turkish Lira",
            "TMT" => "Turkmenistani Manat",
            "UGX" => "Ugandan Shilling",
            "UAH" => "Ukrainian Hryvnia",
            "AED" => "United Arab Emirates Dirham",
            "UYU" => "Uruguayan Peso",
            "USD" => "US Dollar",
            "UZS" => "Uzbekistan Som",
            "VUV" => "Vanuatu Vatu",
            "VEF" => "Venezuelan BolÃvar",
            "VND" => "Vietnamese Dong",
            "YER" => "Yemeni Rial",
            "ZMK" => "Zambian Kwacha",
            "ZWL" => "Zimbabwean dollar"
        );

        return $currencyArr;        

    }

    public static function countryArr(){

        $countryList = array(
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "BQ" => "British Antarctic Territory",
            "IO" => "British Indian Ocean Territory",
            "VG" => "British Virgin Islands",
            "BN" => "Brunei",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CT" => "Canton and Enderbury Islands",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos [Keeling] Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo - Brazzaville",
            "CD" => "Congo - Kinshasa",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "CI" => "Côte d’Ivoire",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "NQ" => "Dronning Maud Land",
            "DD" => "East Germany",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "FQ" => "French Southern and Antarctic Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and McDonald Islands",
            "HN" => "Honduras",
            "HK" => "Hong Kong SAR China",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JT" => "Johnston Island",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Laos",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau SAR China",
            "MK" => "Macedonia",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "FX" => "Metropolitan France",
            "MX" => "Mexico",
            "FM" => "Micronesia",
            "MI" => "Midway Islands",
            "MD" => "Moldova",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar [Burma]",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NT" => "Neutral Zone",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "KP" => "North Korea",
            "VD" => "North Vietnam",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PC" => "Pacific Islands Trust Territory",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territories",
            "PA" => "Panama",
            "PZ" => "Panama Canal Zone",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "YD" => "People's Democratic Republic of Yemen",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn Islands",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RO" => "Romania",
            "RU" => "Russia",
            "RW" => "Rwanda",
            "RE" => "Réunion",
            "BL" => "Saint Barthélemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "KR" => "South Korea",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syria",
            "ST" => "São Tomé and Príncipe",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UM" => "U.S. Minor Outlying Islands",
            "PU" => "U.S. Miscellaneous Pacific Islands",
            "VI" => "U.S. Virgin Islands",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "SU" => "Union of Soviet Socialist Republics",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "ZZ" => "Unknown or Invalid Region",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "WK" => "Wake Island",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
            "AX" => "Åland Islands",
        );

        return $countryList;
    }

    public static function encrypt($data, $key) {
   
        $plaintext = $data;
        $ivlen = openssl_cipher_iv_length($cipher = 'AES-128-CBC');
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $ciphertext;
    }

    public static function decrypt($data, $key) {    
        
        if(empty($data)){
            return null;
        }
   
        $c = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($cipher = 'AES-128-CBC');
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac))
        {
            return $original_plaintext;
        }
    }

    public static function autoCompleteUsername(){

        $arrayUsername = Helpers::arrayUsername();

        $resultArr = [];

       foreach($arrayUsername as $key => $value){
            $resultArr[] = $value['username'];
       }  

        return $resultArr;
    }

    public static function arrayUsername(){

        $query = new Query;
     
        $arrayUsername = $query->select([
            'guid',
            'username',         
        ])
        ->from('user')    
        ->where(
            [
                //'level' => 'client',
                //'status' => 10,
                //'company_code' => Yii::$app->user->identity->company_code
            ])
        ->all();        
      

        return $arrayUsername;
    }

    public static function arrayCompanyLocations($arrSearch = [] , $type ='all'){

        $query = new Query;    
    

        $search = [
            'company_code' => Helpers::findCompanyCode(),
            'active' => 1
        ];
        $search = array_merge($search, $arrSearch);
        $locationArr = $query->select('*')
        ->from('company_locations')    
        ->where($search) 

        ->$type();       
      

        return $locationArr;
    }

    public static function arraySheddule($filter = [], $type = 'all'){

        $query = new Query;    

        $search = [
            'company_code' => Helpers::findCompanyCode()            
        ];

        
        $search = array_merge($search, $filter);
        
        if(isset($filter['team_username'])){
            $explod = explode('|', $filter['team_username']);

     
            $shedduleArr = $query->select('*')
            ->from(['sheddule'])
            ->where($search)
            ->orWhere(['in', 'team_username', $explod])
            ->orderBy(['time' => SORT_ASC])
            ->$type();  
    
        }else{

            $shedduleArr = $query->select('*')
            ->from(['sheddule'])
            ->where($search)        
            ->orderBy(['time' => SORT_ASC])
            ->$type();  
    
        }
  

        $resultArr = [];
      
        if($type == 'all'){
            foreach($shedduleArr as $value){
                //$str = date('Y-m-d H:i',strtotime(date('Y-m-d',$value['date']).' '.date('H:i',$value['time'])));      
                $dayHour = $value['date'].' '.$value['time'];
                $resultArr[strtotime($dayHour).'-'.$value['team_username']] = $value;        
            }
        }else{
            $resultArr = $shedduleArr;
        }


        return $resultArr;
    }

    public static function arrayServiceCategory(){

        $query = new Query;

        $servicesCatArr = $query->from(['sc' => 'services_category'])
            ->select(
                        [
                        'sc.category_code',
                        'page_code_sc_title'  => 'sc.page_code_title',
                        'services_category_title' => 'sc.page_code_title',
                        ]
                    )
            ->where(['sc.company_code' => Helpers::findCompanyCode()])
            ->orderBy(['sc.order'=>SORT_ASC])
            ->all();

        return  $servicesCatArr;
    }

    public static function arrayServices($filter = [], $type = 'all'){

        $query = new Query;

        $arrFilter = [];

        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }   

        $search = [       
            'active' => 1,           
            'company_code' => Helpers::findCompanyCode()          
        ];

        $search = array_merge($search, $arrFilter);

        $servicesArr = $query->from(['s' => 'services'])
        ->select('*')
        ->where($search)
        ->orderBy(['s.order'=>SORT_ASC])->$type(); 

        return  $servicesArr;
    }

    public static function arrayTeam($filter = [], $type = 'all'){

        $query = new Query;      
        
        $companyCode = Helpers::findCompanyCode();
 
        $arrFilter = [
            'level' => 'team',
            'company_code' => $companyCode,
            'active' => 1,           
            'status' => '10',  
        ];


        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }

        if(isset($arrFilter['guid'])){

            $explod = explode('|', $arrFilter['guid']);

            $search = [       
                'active' => 1,            
                'level' => 'team',
                'status' => '10',
                       
            ];
    
            $search = array_merge($search, $arrFilter);

            $userArr = $query->select('*')
            ->from('user')    
            ->where($search)
            ->orWhere(['in', 'guid', $explod])
            //->orWhere('guid LIKE CONCAT("%'.$search['guid'].'%")')      
            ->$type();
   
        

        }else{       
    
            $search = $arrFilter;

            $userArr = $query->select('*')
            ->from('user')    
            ->where($search)      
            ->$type();
        }

     

        return $userArr;
    }

    public static function arrayCompany($filter = [], $type = 'all'){

        $query = new Query;

        $companyCode = Helpers::findCompanyCode();
        
        $arrFilter = [];

        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }

        $search = [      
            'company_code' => $companyCode          
        ];

        $search = array_merge($search, $arrFilter);

        $userArr = $query->select('*')
        ->from('company')    
        ->where($search)      
        ->$type();

        return $userArr;
    }

    public static function arrayCompanyImages($filter = [], $type = 'all'){

        $query = new Query;

        $companyCode = Helpers::findCompanyCode();
        
        $arrFilter = [];

        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }

        $search = [      
            'company_code' => $companyCode          
        ];

        $search = array_merge($search, $arrFilter);

        $userArr = $query->select('*')
        ->from('company_images')    
        ->where($search)      
        ->$type();

        return $userArr;
    }

    public static function findCompanyCodeAdmin(){

        /*
        $query = new Query;     
     
        
        if(isset(Yii::$app->user->identity->company_code)){

            $companyCode = Yii::$app->user->identity->company_code;

        }else{
     
            $resultArr = $query->select('company_code')
                ->from(['company'])
                ->where(
                [
                    'company_code_url' => Yii::$app->request->get('code'),                                               
                ]
                
                )->one();
                
            $companyCode = ((isset($resultArr['company_code'])) ? $resultArr['company_code'] : '');
        }
        */

        $companyCode = Yii::$app->user->identity->company_code;

   
        return  $companyCode;
    }

    public static function findCompanyCode(){

        $query = new Query;    
        
        $explod = explode('/', Helpers::getPathUrl());
        
        $resultArr = $query->select('company_code')
        ->from(['company'])
        ->where(
        [
            'company_code_url' => $explod['1']                                              
        ]
        
        )->one(); 
        
         $companyCode = ((isset($resultArr['company_code'])) ? $resultArr['company_code'] : '');

         return  $companyCode;

     
        if(isset(Yii::$app->user->identity->company_code)){
        
            if(empty(Yii::$app->request->get('code'))){
                $companyCode = $filter['company_code'] = Yii::$app->user->identity->company_code;
            }else{
                $filter['company_code_url'] = Yii::$app->request->get('code');

                $resultArr = $query->select('company_code')
                ->from(['company'])
                ->where($filter)->one();              
                
                $companyCode = ((isset($resultArr['company_code'])) ? $resultArr['company_code'] : '');

            }


        }else{
     
            $resultArr = $query->select('company_code')
                ->from(['company'])
                ->where(
                [
                    'company_code_url' => Yii::$app->request->get('code'),                                               
                ]
                
                )->one(); 
                
            $companyCode = ((isset($resultArr['company_code'])) ? $resultArr['company_code'] : '');
        }

        return  $companyCode;
    }

    
    public static function findCompanyCodeByUrl(){

        $query = new Query;    

        /*
        print"<pre>";
        print_r(Yii::$app->request->get());
        die();
     */
        $resultArr = $query->select('company_code')
            ->from(['company'])
            ->where(
            [
                'company_code_url' => (isset(Yii::$app->request->get()['code']) ? Yii::$app->request->get()['code'] : ''),                                               
            ])->one(); 

        $companyCode = ((isset($resultArr['company_code'])) ? $resultArr['company_code'] : '');

        return  $companyCode;
    }

    
    public static function findServiceName($service_code){

        $query = new Query;     
     
        $resultArr = $query->select('page_code_title')
        ->from(['services'])
        ->where(
        [
            'service_code' => $service_code,                                               
        ])->one();

        return ((isset($resultArr['page_code_title'])) ? $resultArr['page_code_title'] : '');
 
    }

    public static function findCompanyLocationCode($companyCode){
       
        if(!empty(Yii::$app->request->get('location')) && Yii::$app->request->get('location') != '*'){            
            return Yii::$app->request->get('location');
        }

        $resultModel = CompanyLocations::findOne(['company_code' => $companyCode]);

        $result = ((empty($resultModel->location_code)) ? '' : $resultModel->location_code);

        return  $result;
    }
    
    public static function dropdownLevel(){

        $titleList =    [
            'team' => Yii::t('app', 'team'),
            'client' => Yii::t('app', 'client'),
        ];

        $arrLevel = [];

        foreach($titleList as  $key => $value){
            $arrLevel[$key] = $value;
        }

        return $arrLevel;
    }

    public static function checkIfBookingExists($bookingCode, $date, $time, $team, $company, $type = 0){

        $query = new Query;     
     
        if($type){
            $resultArr = $query->select(['*'])
            ->from(['sheddule'])
            ->where(
            [            
                'date' => $date,
                'time' => $time,
                'team_username' => $team,
                'company_code' => $company,                                               
            ])
            ->andWhere(['!=', 'booking_code', $bookingCode])
            ->one();  
        }else{

            
            $explod = Helpers::bookingRandowUsername($team, $time, $date, $company);


            
            print"<pre>";
            print_r($explod);
            die();
        
                 
            
        }     

        /*
           
        if(empty($resultArr)){
            print_r($resultArr);
            die();
    
        }else{
            die('0');
        }
        */
    
    
        return  ((empty($resultArr)) ? 0 : 1);
    }

    public static function dropdownSubjects($position){
        $query = new Query;

        $language = null;

        $activeLanguagesArr = Helpers::activeLanguages();

        if(count($activeLanguagesArr) > 1){
            foreach($activeLanguagesArr as $lang => $value){
                if($value == 1){
                    $language = $lang;
                }
            }          
        }
        
        $serviceArr = $query->select([        
            'page_code',     
        ])
        ->from('subjects')    
        ->where(
            [
                //'type' => $type,
                'position' => $position,
                //'company_code' => $company, 
            ]
            )
        ->orderBy('order')
        ->all();
        
        $arrServices = [];
        
        foreach($serviceArr as $value){
            $arrServices[Yii::t('app',$value['page_code'])] = Yii::t('app',$value['page_code'], [], $language);
        }

        return $arrServices;
    }



    
   public static function dropdownTitle(){

        $titleList =    [
            'mr' => Yii::t('app', 'mr'),
            'miss' => Yii::t('app', 'miss'),
        ];

        $arrTitle = [];

        foreach($titleList as  $key => $value){
            $arrTitle[$key] = $value;
        }

        return $arrTitle;
    }


    public static function dropdownTimeWindow(){

        $titleList =    [
            '15' => 15,
            '20' => 20,
            '30' => 30,
            '45' => 45,
            '60' => 60,
            '75' => 75,
            '90' => 90,
            '120' => 120,
        ];
    
        $arrTimeWindow = [];

        foreach($titleList as  $key => $value){
            $arrTimeWindow[$key] = $value;
        }

        return $arrTimeWindow;
    }


    public static function dropdownGender(){

        $titleList =    [
            'men' => Yii::t('app', 'men'),
            'women' => Yii::t('app', 'women'),
        ];
    
        $arrGender = [];

        foreach($titleList as  $key => $value){
            $arrGender[$key] = $value;
        }

        return $arrGender;
    }

    
    public static function dropdownActive(){

        $titleList =    [
            '1' => Yii::t('app', 'yes'),
            '0' => Yii::t('app', 'no'),
        ];
    
        $arrActive = [];

        foreach($titleList as  $key => $value){
            $arrActive[$key] = $value;
        }

        return $arrActive;
    }

    public static function dropdownDaysHours(){

        $daysHoursList =    [
            'days' => Yii::t('app', 'days'),
            'hours' => Yii::t('app', 'hours'),
        ];
    
        $arrDaysHours = [];

        foreach($daysHoursList as  $key => $value){
            $arrDaysHours[$key] = $value;
        }

        return $arrDaysHours;
    }

    
    public static function dropdownCampaignTypes(){

        $typesList =    [
            'onetime_campaign' => Yii::t('app', 'onetime_campaign'),
            'birthday_campaign' => Yii::t('app', 'birthday_campaign'),
            'reminder_campaign' => Yii::t('app', 'reminder_campaign'),
            'every_day_campaign' => Yii::t('app', 'every_day_campaign'),
            'every_week_campaign' => Yii::t('app', 'every_week_campaign'),
            'every_month_campaign' => Yii::t('app', 'every_month_campaign'),
            'every_year_campaign' => Yii::t('app', 'every_year_campaign'),
                 
        ];
    
        $arrTypes= [];

        foreach($typesList as  $key => $value){
            $arrTypes[$key] = $value;
        }

        return $arrTypes;
    }

    public static function dropdownTicketStatus(){

        $titleList =    [
            '1' => Yii::t('app', 'open'),
            '0' => Yii::t('app', 'closed'),     
        ];
    
        $arrTicket = [];

        foreach($titleList as  $key => $value){
            $arrTicket[$key] = $value;
        }

        return $arrTicket;
    }

    public static function dropdownMessageTemplates(){

        $query = new Query;
     
        $locationArr = $query->select([
            'title', 
            'template_code',  
        ])
        ->from('messages_template')
        ->where(['company_code' => Yii::$app->user->identity->company_code])
        ->all();
        
        $arrLocations =  [];
        
        foreach($locationArr as $value){
            $arrLocations[$value['template_code']] = $value['title'];
        }
        

        return $arrLocations;
    }

    public static function dropdownLanguage(){

        $query = new Query;
     
        $locationArr = $query->select([
            'country_code', 
            'full_title',  
        ])
        ->from('countries')
        ->all();
        
        $arrLocations =  [];
        
        foreach($locationArr as $value){
            $arrLocations[$value['country_code']] = Yii::t('app', $value['country_code']);
        }
        

        return $arrLocations;
    }


    public static function dropdownCompanyLocations(){        

        $locationArr =  Helpers::arrayCompanyLocations();
        
        $arrLocations =  [];
        
        foreach($locationArr as $value){
            $arrLocations[$value['location_code']] = $value['full_name'] . ' ('.$value['city'].')';
        }
        

        return $arrLocations;
    }

    public static function dropdownSheddulleHours($serviceTimeMin = '60'){

        $start = strtotime('00:00'); //9:00
        $end = strtotime('24:00'); //18:00   

        while ($start < $end) {
        
            $hour = $start;         

            $sum = (60*$serviceTimeMin);

            $arrServices[date('H:i',$hour)][] = date('H:i',$hour);

            $start += $sum;

        }

        $arrHourDropdown =  [];

        foreach($arrServices as $key => $value){   
            $arrHourDropdown[strtotime($key)] = $key; 
        }

        return $arrHourDropdown;

    }

    
    public static function dropdownSheddulleSortArrHours($userHourArr){
    
        $arrHour = [];
        $arrHour = ['' => Yii::t('app', 'select_time')];
        

        foreach($userHourArr as $key => $value){
            $arrHour[date('H:i:s', $key)] = date('H:i', $key);
        } 

        return $arrHour;

    }
    

    public static function dropdownTeam($filter = [], $defaultValue = 'select_team'){      

        $teamArr = Helpers::arrayTeam($filter);

        $arrTeam = [];

        foreach($teamArr as $value){
            $arrTeam[$value['guid']] = $value['first_name'].' '.$value['last_name'];
        }
        
        $defaultKey = '|';

        foreach($arrTeam as $key => $value){
            $defaultKey .= $key.'|';
        }

        $arrTeam = array_merge([$defaultKey => Yii::t('app', $defaultValue)],  $arrTeam);

        return $arrTeam;
    }


    public static function booleanExistCompanyLocations(){        

        $locationArr =  Helpers::arrayCompanyLocations();
    
        $result = (count($locationArr) == 1) ? false : true;
    
        return $result;
    }

    public static function booleanExistTeam(){        

        $teamArr =  Helpers::arrayTeam();      

        $result = (count($teamArr) >= 1) ? true : false;

        return $result;
    }

    public static function booleanDisplayExistTeam(){        

        $teamArr =  Helpers::arrayTeam();      

        $result = (count($teamArr) == 1) ? false : true;

        return $result;
    }

    public static function booleanRequestLogin(){        

        $companyArr =  Helpers::arrayCompany([],'one');  
        
        $result = (isset($companyArr['login_required'])) ? $companyArr['login_required'] : false;

        return $result;

    }

    


    public static function getServiceArrValues($serviceCode){

        $filter['service_code'] = $serviceCode;
        $arrServices = Helpers::arrayServices($filter, 'one');

        $name = '';

        if(isset($arrServices['page_code_title'])){
            $name = Yii::t('app', $arrServices['page_code_title']);
        }

        return  $arrServices;
    }
    
    public static function getJustServicesArr($filter = [], $type = 'all'){


        $query = new Query;

        $search = [
            'company_code' => Helpers::findCompanyCode()
        ];

        $arrFilter = [];

        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }        
        
        $search = array_merge($search, $arrFilter);  

        $searchTeam['location_code'] = $search['location_code'];
        $arrTeam = Helpers::arrayTeam($searchTeam);

        $serviceArr = $query->select([
            'username',
            'service_code', 
            'page_code_title',           
            'title_pt',  
            'title_en',  
        ])
        ->from('services')    
        ->where([
            'company_code' => $search['company_code'],         
            'service_code' => $search['service_code']
        ]
         
        )
        //->andWhere(['in', 'username', $resultTeam])
        ->andWhere('location_code LIKE CONCAT("%|'.$search['location_code'].'|%")')
  
        ->$type();

        $resultTeam = [];

        //28148B26-280C-44A3-AAB9-4844BD21B6E3
        //BF6A24AC-A22F-46A3-B881-5330F05FBBEA

        foreach($arrTeam as $team){
            if (str_contains($serviceArr['username'], $team['guid'])) { 
                $resultTeam[] = $team['guid'];
            }
        }
        
    
        $serviceArr['username'] = '|'.implode('|',$resultTeam).'|';       


        return $serviceArr;

    }
    public static function getServicesArr($filter = [], $filterCat = []){

        $arrServices = [];     
        $arrFilterCat = [];
        $arrFilter = [];  

        $query = new Query;

        $companyCodeResult =  Helpers::findCompanyCode();
              

        //filter for Service Cat
        $searchDefault = [
            'company_code' => $companyCodeResult
        ];

        foreach($filterCat as $key => $value){
            if($value != '*'){
                $arrFilterCat[$key] = $value;
            }
        }
        
        $searchCat = array_merge($searchDefault, $arrFilterCat);  


        //filter for Services
        foreach($filter as $key => $value){
            if($value != '*'){
                $arrFilter[$key] = $value;
            }
        }

        $search = array_merge($searchDefault, $arrFilter);       

        $servicesCatArr = Helpers::getServicesCatArr($searchCat);


        foreach($servicesCatArr as $serviceCat){    


            $search = array_merge($search, ['category_code' => $serviceCat['category_code']]);  

            if(isset($search['username'])){

                $servicesArr = $query->from(['services'])
                ->select([     
                    'service_code', 
                    'location_code',               
                    'category_code',
                    'username',
                    'price',    
                    'text_pt', 
                    'time',
                    'text_en', 
                    'price_range',       
                    'services_title'  => 'page_code_title',        
                    'services_text'  => 'page_code_text',
                    ])
                ->where($search) 
                ->orWhere('username LIKE CONCAT("%'.$search['username'].'%")')
                //->where($arrLocationResult)  
                //->where($arrUsernameResult)               
                //->where('or', $arrLocation, $arrUsername)           
                //->where($arrUsername)
                ->orderBy(['order'=>SORT_ASC])->all();  

            }else{

                $servicesArr = $query->from(['services'])
                ->select([     
                    'service_code', 
                    'location_code',               
                    'category_code',
                    'username',
                    'price',    
                    'text_pt', 
                    'time',
                    'text_en', 
                    'price_range',       
                    'services_title'  => 'page_code_title',        
                    'services_text'  => 'page_code_text',
                    ])
                ->where($search) 
                //->orWhere('username LIKE CONCAT("%'.$search['username'].'%")')
                //->where($arrLocationResult)  
                //->where($arrUsernameResult)               
                //->where('or', $arrLocation, $arrUsername)           
                //->where($arrUsername)
                ->orderBy(['order'=>SORT_ASC])->all();   

            }
          

         
            if(!empty($servicesArr)){
                $arrServices[$serviceCat['page_code_sc_title']] = $servicesArr;
            }
    
        }  

        return $arrServices;

    }

    public static function activeLanguages(){

        $languagesArr = [
                'en' => '0',
                'pt' => '0',
            ];

        if(isset(Yii::$app->user->identity->language)){
            $arrValuesLang = explode(',', Yii::$app->user->identity->language);
        }
    
        if(empty($arrValuesLang[0])){
            $arrValuesLang = ['en', 'pt'];
        }

        foreach($arrValuesLang as $languages){
            $valueMerge[$languages] = 1;        
        }

        $languagesArr = array_merge($languagesArr,  $valueMerge);

        return $languagesArr;
    }

    public static function getServicesCatArr($search = []){
        
        $companyResult = (empty($company)) ? Helpers::findCompanyCode() : $company;
        $query = new Query;

        $servicesCatArr = $query->from(['sc' => 'services_category'])
            ->select([
                'sc.category_code',
                'page_code_sc_title'  => 'sc.page_code_title',
                'services_category_title' => 'sc.page_code_title',
                ])
            ->where($search)
            ->orderBy(['order'=>SORT_ASC])
            ->all();

        return $servicesCatArr;
    }

    public static function dropdownServiceCategory(){

        $query = new Query;
        $language = null;

        $activeLanguagesArr = Helpers::activeLanguages();

        $count = 0;

        foreach($activeLanguagesArr as $lang => $value){
            if($value == 1){
                $count++;    
                           
            }
        }  

        if($count == 1){
            foreach($activeLanguagesArr as $lang => $value){
                if($count == 1){
                    if($value == 1){
                        $language = $lang;            
                    }
                }
            }  
        }

    
        $serviceArr = $query->select([
            'category_code', 
            'page_code_title',   
            'title_pt',
            'title_en'  
        ])
        ->from('services_category')    
        ->where(['company_code' => Yii::$app->user->identity->company_code])
        ->all();
        
        $arrServiceCat =  [];
        
        foreach($serviceArr as $value){
            $arrServiceCat[$value['category_code']] = $value['title_'.Yii::$app->language];
        }

        return $arrServiceCat;
    }
    

    public static function dropdownServices($filter = [], $coin = '€'){

        $query = new Query;

        $serviceArr =[];  

        $arrFilter = Helpers::filterHelper($filter, ['username','location_code']);   


        $usernameWhere = ((isset($filter['username']) && !empty($filter['username'])) ? 'username LIKE CONCAT("%'.$filter['username'].'%")' : '1=1');

        if(isset($filter['location_code']) && empty($filter['location_code'])){

            $arrLocationCode = explode('|', $filter['location_code']); 

            foreach($arrLocationCode as $key => $value){
 
                $serviceResult = $query->select([
                    'service_code', 
                    'page_code_title',    
                    'title_pt',
                    'title_en',
                    'text_pt',
                    'text_en',
                    'title',   
                    'price'
                ])
                ->from('services')    
                ->where($arrFilter)           
                ->andWhere($usernameWhere)
                ->andWhere('location_code LIKE CONCAT("%|'.$value.'|%")')  
                ->one();

                $serviceArr[] = $serviceResult;
            }

        }else{

            $serviceArr = $query->select([
                'service_code', 
                'page_code_title',    
                'title_pt',
                'title_en',
                'text_pt',
                'text_en',
                'title',   
                'price'
            ])
            ->from('services')    
            ->where($arrFilter)            
            ->andWhere($usernameWhere)           
            ->all();

        }
        
        $arrServices = [];
        
        foreach($serviceArr as $value){
            $arrServices[$value['service_code']] = $value['title_'.Yii::$app->language].' ('.$coin.$value['price'].')';
        }

        $arrServices = array_merge(['' => Yii::t('app', 'select_services')],  $arrServices);

        return $arrServices;



        /*





        
       
  
        $arrLocationCode = [];

        if(empty($filter['location_code'])){
            $arrLocationCode = explode('|', $filter['location_code']); 


            foreach($arrLocationCode as $key => $value){

                if(isset($search['username'])){
                   
                    $serviceResult = $query->select([
                        'service_code', 
                        'page_code_title',    
                        'title_pt',
                        'title_en',
                        'text_pt',
                        'text_en',
                        'title',   
                        'price'
                    ])
                    ->from('services')    
                    ->where($search)           
                    ->andWhere('username LIKE CONCAT("%'.$search['username'].'%")')
                    ->andWhere('location_code LIKE CONCAT("%|'.$value.'|%")')
                    ->one();
        
                }else{
        
             
                    if(empty($search['location_code'])){
                            
                        $serviceResult = $query->select([
                            'service_code', 
                            'page_code_title',    
                            'page_code_text',
                            'title_pt',
                            'title_en',
                            'text_pt',
                            'text_en',
                            'title', 
                            'price'
                        ])
                        ->from('services')      
                        ->where($search)
                        //->andWhere('location_code LIKE CONCAT("%|'.$value.'|%")')   
                        ->one(); 
                        
                    }else{

                        $serviceResult = $query->select([
                            'service_code', 
                            'page_code_title',    
                            'page_code_text',
                            'title_pt',
                            'title_en',
                            'text_pt',
                            'text_en',
                            'title', 
                            'price'
                        ])
                        ->from('services')      
                        ->where($search)
                        ->andWhere('location_code LIKE CONCAT("%|'.$value.'|%")')   
                        ->one(); 
                    }
                 
                }

                $serviceArr[] = $serviceResult;

            }

        }else{
         
            if(isset($search['username'])){

                $serviceArr = $query->select([
                    'service_code', 
                    'page_code_title',    
                    'title_pt',
                    'title_en',
                    'text_pt',
                    'text_en',
                    'title',   
                    'price'
                ])
                ->from('services')    
                ->where($search)           
                ->orWhere('username LIKE CONCAT("%'.$search['username'].'%")')
                ->all();
    
            }else{
           
                $serviceArr = $query->select([
                    'service_code', 
                    'page_code_title',    
                    'page_code_text',
                    'title_pt',
                    'title_en',
                    'text_pt',
                    'text_en',
                    'title', 
                    'price'
                ])
                ->from('services')      
                ->where($search)                          
                ->andWhere('location_code LIKE CONCAT("%|'.$value.'|%")')  
                ->all();  
    
            }
        }
   
        $arrServices = [];
        
        foreach($serviceArr as $value){
            $arrServices[$value['service_code']] = $value['title_'.Yii::$app->language].' ('.$coin.$value['price'].')';
        }

        $arrServices = array_merge(['' => Yii::t('app', 'select_services')],  $arrServices);

        return $arrServices;

        */
    }

    public static function filterHelper($filter, $ignoreArr = [], $search = []){

        $filter = array_merge($search, $filter);

        $arrFilter = [];   
      
     
        foreach($filter as $key => $value){

            $generate = true;

            foreach($ignoreArr as $value2){
                if($value2 == $key){                  
                    $generate = false;
                    break;
                }
            }

      
            if($generate == true){
                if($value != '*'){
                    $arrFilter[$key] = $value;
                }  
            }                
        }   

        return $arrFilter;
    }
 /*
    public static function dropdownServices(){

        $query = new Query;

        $language = null;

        $activeLanguagesArr = Helpers::activeLanguages();

        if(count($activeLanguagesArr) > 1){
            foreach($activeLanguagesArr as $lang => $value){
                if($value == 1){
                    $language = $lang;
                }
            }          
        }

        $serviceArr = $query->select([
            'service_code', 
            'page_code_title',     
        ])
        ->from('services')    
        ->where(
            [
                'company_code' => Yii::$app->user->identity->company_code,
                'location_code' => Yii::$app->user->identity->location_code
            ]
            )
        ->all();
        
        $arrServices = [];
        
        foreach($serviceArr as $value){
            $arrServices[$value['service_code']] = Yii::t('app',$value['page_code_title'], [], $language);
        }

        return $arrServices;
    }

   
    public static function dropdownClientContactsUsSubject($type, $company){

        $query = new Query;

        $language = null;

        $activeLanguagesArr = Helpers::activeLanguages();

        if(count($activeLanguagesArr) > 1){
            foreach($activeLanguagesArr as $lang => $value){
                if($value == 1){
                    $language = $lang;
                }
            }          
        }
        
        $serviceArr = $query->select([        
            'page_code',     
        ])
        ->from('subjects')    
        ->where(
            [
                'type' => $type,
                'position' => 'contact_us',
                //'company_code' => $company, 
            ]
            )
        ->orderBy('order')
        ->all();
        
        $arrServices = [];
        
        foreach($serviceArr as $value){
            $arrServices[Yii::t('app',$value['page_code'])] = Yii::t('app',$value['page_code'], [], $language);
        }

        return $arrServices;
    }

    */

    public static function checkDate($strDate) {
       
        $date = date("m-d-Y", $strDate);

        $tempDate = explode('-', $date);
        // checkdate(month, day, year)
        
        /*
        print_r(checkdate(11, 03, 2023));
        print"<pre>";
        print_r(checkdate($tempDate[0],$tempDate[1],$tempDate[2]));
        print_r($tempDate);
        die();
        */
        //  print_r(checkdate($tempDate[1], $tempDate[2], $tempDate[0]));
        //checkdate(12, 31, 2000)

        return checkdate($tempDate[0], $tempDate[1], $tempDate[2]);
      }

    public static function checkPublish($code, $model){

        $query = new Query();

        $user = $query->select('*')
            ->from(['company'])
            ->where(['company_code_url' => $code]) 
            ->one();  

        $publish = 0;

        if(isset($user['publish'])){
            $publish = $user['publish'];
       
        }

        if (Yii::$app->user->isGuest && $publish ==  '0') {        
            //return $this->refresh();
        }

        return $publish;
    }

    public static function countTickets(){
  
        $query = new Query;

        $notifications = $query->select('*')
            ->from('tickets')    
            ->where(
                [
                    'company_code' => Yii::$app->user->identity->company_code,
                    'type' => 'client_message',
                    'read' => '0'
                ]
                )
            ->all();       

        return $notifications;
    }



    public static function defaultSheddulle($model)
    {

        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        foreach($weekDays as $dayWeek){

            $sh = $dayWeek.'_starting_hour';
            $eh = $dayWeek.'_end_hour';
            $bs = $dayWeek.'_starting_break';
            $be = $dayWeek.'_end_break';                

            $model->$sh = strtotime('9:00');
            $model->$eh = strtotime('18:00');
            $model->$bs = strtotime('12:00');
            $model->$be = strtotime('13:00');          
   
        }

    }

    public static function displaySaveButtonsView($model){

        $str = '';
        $str .= '<p class="mt-5">';
        $str .= Html::submitButton(Yii::t('app', 'save_button'), ['class' => 'btn btn-success']);
        $str .= '<span class="mr-1"></span>';

        $str .= Html::a(Yii::t('app', 'edit_button'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
        $str .= '<span class="mr-1"></span>';

        $str .= Html::a(Yii::t('app', 'delete_button'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'are_you_sure_delete'),
                'method' => 'post',
            ],
        ]);
        $str .= '<span class="mr-1"></span>';

        $str .= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']);
        $str .= '</p>';

        return $str;
    }

    public static function displayButtonsView($model){
        
        $str = '';
        $str .= '<p>';
        $str .= Html::a(Yii::t('app', 'create_button'), ['create'], ['class' => 'btn btn-success']);
        $str .= '<span class="mr-1"></span>';

        $str .= Html::a(Yii::t('app', 'edit_button'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
        $str .= '<span class="mr-1"></span>';

        $str .= Html::a(Yii::t('app', 'delete_button'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'are_you_sure_delete'),
                'method' => 'post',
            ],
        ]);
        $str .= '<span class="mr-1"></span>';
        $str .= Html::a(Yii::t('app', 'back_button'), ['index'], ['class' => 'btn btn-primary']);
        $str .= '</p>';

        return $str;
    }


    public static function displayAminBreadcrumbs($labelFrom, $labelTo, $sourcePath, $type = '', $value = ''){        
     

        $path = str_replace('-','_',$sourcePath);  
        $from = str_replace('-','_',$labelFrom);    
        $to = str_replace('-','_',$labelTo);  
    
        $str = '<div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18 pb-4 pt-4">
                                '.Html::encode(Yii::t('app', $type).' '.Yii::t('app', $to)).' '.(empty($value) ? '' : ': '.$value).'
                            </h4>  
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                        <a href="'.Url::toRoute('/'.$sourcePath).'">
                                            '.Html::encode(Yii::t('app', $from)).'                                    
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        '.Html::encode(Yii::t('app', $type).' '.Yii::t('app', $to)).' '.(empty($value) ? '' : ':'.$value).'
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>';

        return $str;
    }


    public static function createCompanyFolders($generatedCode){

        $directory = Yii::getAlias('@frontend/web/images/media/'.'c'.$generatedCode.'/');
     
        if (!file_exists($directory)) {      
            mkdir($directory, 0777, true);
        }

        $arrFoldersToCreate = ['images','files'];
        
        foreach($arrFoldersToCreate as $dir){
            if (!file_exists($directory.'/'.$dir)) {      
                mkdir($directory.'/'.$dir, 0777, true);
            }
        }
    }


    public static function getUsersFullName($usernameStr){


        $query = new Query();

        $explod = explode('|', $usernameStr);
        
        $userArr = $query->from(['user'])
            ->select('full_name')
            ->where(['in', 'guid', $explod])
            ->all();

        $user = [];

        foreach($userArr as $value){
            $user[] = $value['full_name'];            
        }

    
        
        return implode(', ',$user);
    }

    public static function getServiceCatName($serviceCatCode){

        //$test = ServicesCategory::find('page_code_title')->orderBy("id desc")->where(['category_code' => $model->category_code])->limit(1)->one();

        $query = new Query();

        $explod = explode(',', $serviceCatCode);
        
        $userArr = $query->from(['services_category'])
            ->select('page_code_title')
            ->where(['in', 'category_code', $explod])
            ->all();

        $user = [];

        foreach($userArr as $value){
            $user[] = Yii::t('app', $value['page_code_title']);
        }

        return implode(', ',$user);
    }

    public static function getServicesName($serviceCode){

        $query = new Query();

        $explod = explode(',', $serviceCode);
        
        $userArr = $query->from(['services'])
            ->select('page_code_title')
            ->where(['in', 'category_code', $explod])
            ->all();

        $user = [];

        foreach($userArr as $value){
            $user[] = Yii::t('app', $value['page_code_title']);
        }

        return implode(', ',$user);
    }

    public static function getCompanyLocationName($companyLocationCode){

        $query = new Query();

        $explod = explode('|', $companyLocationCode);
     
        $userArr = $query->from(['company_locations'])
            ->select(['location', 'address_line_1', 'address_line_2'])
            ->where(['in', 'location_code', $explod])
            ->all();            
    
        $user = [];

        foreach($userArr as $value){
            $user[] = $value['location'];
            //$user[] = $value['address_line_1'].'<br>'.$value['address_line_2'].'<br>'.$value['location'];
        }

        return implode(', ',$user);
    }

    
    public static function dropdownUserTimeWindow($day = '',$userGuid = ''){


        $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

        $member = Helpers::arrayTeam(['guid' => $userGuid],'one');        

        $arrWeek = ((is_array(json_decode($member['sheddule_array'],true))) ? json_decode($member['sheddule_array'], true) : []);

        $resultWeekDays = $arrWeek[$days[date('w', strtotime($day))]];

        $start = strtotime($resultWeekDays['start']); //9:00
        $end = strtotime($resultWeekDays['end']); //18:00
        $lunchFrom = $resultWeekDays['break_start']; //13:00
        $lunchTo = $resultWeekDays['break_end']; //14:00

        $serviceTimeMin = (empty($member['time_window']) ? '60' : $member['time_window']);

        $i = 0;
        $arrSheddule = [];

        while ($start < $end) {
         
            $hour = $start;
    
            if($hour >= strtotime($lunchTo)){
                if($i == 0){
                    $start = strtotime($lunchTo);
                    $hour = $start;
                    $i++;
                }        
            }        
    
            $sum = (60*$serviceTimeMin);
        
            if ($hour < strtotime($lunchFrom) || $hour >= strtotime($lunchTo)){  
               
                $dayHour = date('Y-m-d H:i',strtotime(date('Y-m-d',strtotime($day)).' '.date('H:i',$hour)));

                $arrSheddule[date('H:i:s', strtotime($dayHour))] = date('H:i', strtotime($dayHour));
        
            }     
        
            $start += $sum;
            //$start += date('H:i', strtotime($sum));
        
        }

      return $arrSheddule;
    }


    public static function dropdownUserTimeWindowAvailable($day = '',$userGuid = ''){

        $days = array('sunday', 'monday', 'tuesday', 'wednesday','thursday','friday', 'saturday');

        $member = Helpers::arrayTeam(['guid' => $userGuid],'one');        

        $arrWeek = ((is_array(json_decode($member['sheddule_array'],true))) ? json_decode($member['sheddule_array'], true) : []);

        $resultWeekDays = $arrWeek[$days[date('w', strtotime($day))]];

        $start = strtotime($resultWeekDays['start']); //9:00
        $end = strtotime($resultWeekDays['end']); //18:00
        $lunchFrom = $resultWeekDays['break_start']; //13:00
        $lunchTo = $resultWeekDays['break_end']; //14:00

        $serviceTimeMin = (empty($member['time_window']) ? '60' : $member['time_window']);

        $i = 0;
        $arrSheddule = [];

        while ($start < $end) {
         
            $hour = $start;
    
            if($hour >= strtotime($lunchTo)){
                if($i == 0){
                    $start = strtotime($lunchTo);
                    $hour = $start;
                    $i++;
                }        
            }        
    
            $sum = (60*$serviceTimeMin);
        
            if ($hour < strtotime($lunchFrom) || $hour >= strtotime($lunchTo)){  
               
                $dayHour = date('Y-m-d H:i',strtotime(date('Y-m-d',strtotime($day)).' '.date('H:i',$hour)));

                if(Helpers::checkIfBookingExists(date('Y-m-d',strtotime($day)), date('H:i',$hour),$member['guid'], $member['company_code']) ==  0){
                    $arrSheddule[date('H:i:s', strtotime($dayHour))] = date('H:i', strtotime($dayHour));
                }               

            }     
        
            $start += $sum;
            //$start += date('H:i', strtotime($sum));
        
        }

      return $arrSheddule;

    }

    public static function validationTimeFrameCancelation($companyArr, $model){

        $timeFrame = $companyArr['cancelation_time'];
      
        $paymentDate = date('Y-m-d H:i:s');
        $contractDateBegin = date('Y-m-d H:i:s', strtotime($model->date.' '.$model->time.' -'. $timeFrame.' minutes'));
        $contractDateEnd = $model->date.' '.$model->time; 

            
        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
            $resultStatusFrame = 2;
        }elseif($paymentDate >= $contractDateEnd){
            $resultStatusFrame = 3;
        }else{
            $resultStatusFrame = 1;
        }

        return $resultStatusFrame;

    }
    

}


?>