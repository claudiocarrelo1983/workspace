<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $company_code
 * @property string $username
 * @property string $page_code_title
 * @property string $page_code_text
 * @property string $title
 * @property string $first_name
 * @property string $surname
 * @property string|null $contact_number
 * @property string|null $email
 * @property string|null $path
 * @property string|null $image
 * @property string $location
 * @property string $job_title
 * @property string|null $text
 * @property string|null $title_pt
 * @property string|null $text_pt
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $pinterest
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $color
 * @property int|null $order
 * @property int|null $active
 * @property string $created_date
 */
class Team extends \yii\db\ActiveRecord
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
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_code', 'username', 'page_code_title', 'page_code_text', 'title', 'first_name', 'surname', 'location', 'job_title'], 'required'],
            [['text', 'text_pt', 'text_en', 'sheddule_array'], 'string'],
            [['order', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code', 'username', 'username_code', 'page_code_title', 'page_code_text', 'title', 'first_name', 'surname', 'contact_number', 'email', 'path', 'image', 'location', 'job_title', 'title_pt', 'title_en', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube', 'color'], 'string', 'max' => 255],
            [['username','username_code'], 'unique'],
            [['page_code_title'], 'unique'],
            [['page_code_text'], 'unique'],
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
            'username' => 'Username',
            'page_code_title' => 'Page Code Title',
            'page_code_text' => 'Page Code Text',
            'title' => 'Title',
            'first_name' => 'First Name',
            'surname' => 'Surname',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'path' => 'Path',
            'image' => 'Image',
            'location' => 'Location',
            'job_title' => 'Job Title',
            'text' => 'Text',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'pinterest' => 'Pinterest',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'color' => 'Color',
            'order' => 'Order',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
