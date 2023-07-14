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

   public static function titleDropdownArr(){

        $titleList =    [
            'mr' => Yii::t('app', 'Mr'),
            'miss' => Yii::t('app', 'Miss'),
        ];
    
        $arrTitle = [];
        foreach($titleList as  $key => $value){
            $arrTitle[$key] = $value;
        }

        return $arrTitle;
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


}


?>