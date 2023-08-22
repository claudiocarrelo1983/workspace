<?php

namespace common\models;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $category_code
 * @property string $page_code_title
 * @property string $page_code_description
 * @property string|null $full_name
 * @property string|null $description
 * @property string|null $nif
 * @property string|null $cae
 * @property string|null $email_1
 * @property string|null $email_2
 * @property string|null $contact_number_1
 * @property string|null $contact_number_2
 * @property string|null $contact_number_3
 * @property string|null $address_line_1
 * @property string|null $address_line_2
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $pinterest
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $city
 * @property string|null $postcode
 * @property string|null $location
 * @property string|null $country
 * @property string|null $postal_code
 * @property int|null $active
 * @property string $created_date
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_code_text'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code',  'page_code_text', 'company_name', 'nif', 'cae', 'email_1', 'email_2', 'contact_number_1', 'contact_number_2', 'contact_number_3', 'address_line_1', 'address_line_2', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube', 'city', 'postcode', 'location', 'country', 'postal_code'], 'string', 'max' => 255],
            [['page_code_text'], 'unique'],       
            [['company_code'], 'unique'],
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
            'category_code' => 'Category Code',
            'page_code_text' => 'Page Code Text',         
            'full_name' => 'Full Name',
            'description' => 'Description',
            'nif' => 'Nif',
            'cae' => 'Cae',
            'email_1' => 'Email 1',
            'email_2' => 'Email 2',
            'contact_number_1' => 'Contact Number 1',
            'contact_number_2' => 'Contact Number 2',
            'contact_number_3' => 'Contact Number 3',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'pinterest' => 'Pinterest',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'city' => 'City',
            'postcode' => 'Postcode',
            'location' => 'Location',
            'country' => 'Country',
            'postal_code' => 'Postal Code',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    public function updateCompany($page, $model){
    
        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        //team_title_pt

        foreach ($countries as $val) {
   
            $text = 'text_'. $val['country_code'];   
            $teamTitle = 'team_title_'. $val['country_code'];
            $teamText = 'team_text_'. $val['country_code'];              

            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_text                       
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => 1,
            ])->execute();     
                       
            
            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_team_title                       
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_team_title,
                'text' => $model->$teamTitle,
                'active' => 1,
            ])->execute();  

            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_team_text                       
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_team_text,
                'text' => $model->$teamText,
                'active' => 1,
            ])->execute(); 

        }
    }   
}
