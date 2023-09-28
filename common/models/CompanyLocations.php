<?php

namespace common\models;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "company_locations".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $location_code
 * @property string $page_code_title
 * @property string $page_code_description
 * @property string|null $full_name
 * @property string|null $description
 * @property string|null $abbreviation
 * @property string|null $cae
 * @property string|null $contact_number
 * @property string|null $email
 * @property string|null $sheddule_array
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postcode
 * @property string|null $location
 * @property string|null $country
 * @property string|null $google_location
 * @property int|null $active
 * @property string $created_date
 */
class CompanyLocations extends \yii\db\ActiveRecord
{

    public $monday_open_checkbox;
    public $monday_starting_hour;
    public $monday_end_hour;
    public $monday_starting_break;
    public $monday_end_break;
    public $tuesday_open_checkbox;
    public $tuesday_starting_hour;
    public $tuesday_end_hour;
    public $tuesday_starting_break;
    public $tuesday_end_break;
    public $wednesday_open_checkbox;
    public $wednesday_starting_hour;
    public $wednesday_end_hour;
    public $wednesday_starting_break;
    public $wednesday_end_break;
    public $thursday_open_checkbox;
    public $thursday_starting_hour;
    public $thursday_end_hour;
    public $thursday_starting_break;
    public $thursday_end_break;
    public $friday_open_checkbox;
    public $friday_starting_hour;
    public $friday_end_hour;
    public $friday_starting_break;
    public $friday_end_break;
    public $saturday_open_checkbox;
    public $saturday_starting_hour;
    public $saturday_end_hour;
    public $saturday_starting_break;
    public $saturday_end_break;
    public $sunday_open_checkbox;
    public $sunday_starting_hour;
    public $sunday_end_hour;
    public $sunday_starting_break;
    public $sunday_end_break;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        /*
        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        $arrWeekDays = [];

        $strInt = '';
        $strVal= '';

        foreach($weekDays as $value){
            $strInt .= "'".$value."_open_checkbox',";
            $strVal .= "'".$value."_starting_hour',";
            $strVal .= "'".$value."_end_hour',";
            $strVal .= "'".$value."_starting_break',";
            $strVal .= "'".$value."_end_break',";
        }

        $arrWeekDays[] = [[$strInt], 'integer'];
        $arrWeekDays[] = [[$strVal], 'string'];
    

        print"<pre>";

        print_r($arrWeekDays);
        die();
        */

        return [
            [['monday_open_checkbox','tuesday_open_checkbox','wednesday_open_checkbox','thursday_open_checkbox','friday_open_checkbox','saturday_open_checkbox','sunday_open_checkbox'], 'integer'],
            [['monday_starting_hour','monday_end_hour','monday_starting_break','monday_end_break','tuesday_starting_hour','tuesday_end_hour','tuesday_starting_break','tuesday_end_break','wednesday_starting_hour','wednesday_end_hour','wednesday_starting_break','wednesday_end_break','thursday_starting_hour','thursday_end_hour','thursday_starting_break','thursday_end_break','friday_starting_hour','friday_end_hour','friday_starting_break','friday_end_break','saturday_starting_hour','saturday_end_hour','saturday_starting_break','saturday_end_break','sunday_starting_hour','sunday_end_hour','sunday_starting_break','sunday_end_break'],'string'],
            [['page_code_title', 'page_code_description'], 'required'],
            [['description', 'sheddule_array', 'google_location','title_pt','description_pt','title_en','description_en'], 'string'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code', 'location_code', 'page_code_title', 'page_code_description', 'full_name', 'cae', 'contact_number', 'email', 'address_line_1','address_line_2', 'city', 'postcode', 'location', 'country'], 'string', 'max' => 255],
            [['page_code_title'], 'unique'],
            [['page_code_description'], 'unique'],
            [['location_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_code' => 'Company Code',
            'location_code' => 'Location Code',
            'page_code_title' => 'Page Code Title',
            'page_code_description' => 'Page Code Description',
            'full_name' => 'Full Name',
            'description' => 'Description',        
            'cae' => 'Cae',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'sheddule_array' => 'Sheddule Array',
            'address' => 'Address',
            'city' => 'City',
            'postcode' => 'Postcode',
            'location' => 'Location',
            'country' => 'Country',
            'google_location' => 'Google Location',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    
    public function saveCompanyLocations($page, $model){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();
      
        foreach($countries as $val){

            $title = 'title_' . $val['country_code'];   
            $description = 'description_' . $val['country_code'];   

            $connection->createCommand()->delete('translations',
            [   
                'page' => $page,
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_title                        
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => '1',
            ])->execute();

            $connection->createCommand()->delete('translations',
            [   
                'page' => $page,
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_description                        
            ])->execute();
            
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_description,
                'text' => $model->$description,
                'active' => '1',
            ])->execute();
        }

        return true;    
    }


    
    public function updateCompanyLocations($page, $model){
      
        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();     
      
        foreach ($countries as $val) {    

            $title = 'title_' . $val['country_code'];   
            $description = 'description_' . $val['country_code'];  

            $connection->createCommand()->delete('translations',
            [   
                'page' => $page,
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_title                        
            ])->execute();
     
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => 1,
            ])->execute();    
            
        
            $connection->createCommand()->delete('translations',
            [   
                'page' => $page,
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_description                        
            ])->execute();
     
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_description,
                'text' => $model->$description,
                'active' => 1,
            ])->execute(); 
         
        }    
    }   
}
