<?php

namespace frontend\models;

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
        return [
            [['page_code_title', 'page_code_description'], 'required'],
            [['description', 'sheddule_array', 'google_location','title_pt','description_pt','title_en','description_en'], 'string'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code', 'location_code', 'page_code_title', 'page_code_description', 'full_name', 'cae', 'contact_number', 'email', 'address', 'city', 'postcode', 'location', 'country'], 'string', 'max' => 255],
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
}
