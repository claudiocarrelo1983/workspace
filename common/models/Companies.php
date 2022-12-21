<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $title
 * @property string|null $foto
 * @property string|null $nif
 * @property string|null $email
 * @property string|null $contact_number
 * @property string|null $dob
 * @property string|null $logo
 * @property string|null $team_code
 * @property string|null $team_name
 * @property string|null $summary
 * @property string|null $description
 * @property string|null $role
 * @property string|null $level
 * @property string|null $sublevel
 * @property string|null $address
 * @property string|null $postcode
 * @property string|null $location
 * @property string|null $country
 * @property string|null $language
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $pinterest
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property int|null $gdpr
 * @property int|null $terms_and_conditions
 * @property int|null $newsletter
 * @property int|null $active
 * @property int|null $order
 * @property string $created_date
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dob', 'created_date'], 'safe'],
            [['description'], 'string'],
            [['gdpr', 'terms_and_conditions', 'newsletter', 'active', 'order'], 'integer'],
            [['first_name', 'last_name', 'full_name', 'title', 'foto', 'nif', 'email', 'contact_number', 'logo', 'team_code', 'team_name', 'role', 'level', 'sublevel', 'address', 'postcode', 'location', 'country', 'language', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['summary'], 'string', 'max' => 100],
            [['team_code'], 'unique'],
            [['team_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'title' => 'Title',
            'foto' => 'Foto',
            'nif' => 'Nif',
            'email' => 'Email',
            'contact_number' => 'Contact Number',
            'dob' => 'Dob',
            'logo' => 'Logo',
            'team_code' => 'Team Code',
            'team_name' => 'Team Name',
            'summary' => 'Summary',
            'description' => 'Description',
            'role' => 'Role',
            'level' => 'Level',
            'sublevel' => 'Sublevel',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'location' => 'Location',
            'country' => 'Country',
            'language' => 'Language',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'pinterest' => 'Pinterest',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'gdpr' => 'Gdpr',
            'terms_and_conditions' => 'Terms And Conditions',
            'newsletter' => 'Newsletter',
            'active' => 'Active',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CompaniesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompaniesQuery(get_called_class());
    }
}
