<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $username
 * @property string $full_name
 * @property string $image
 * @property string $location
 * @property string $title
 * @property string $text
 * @property string $title_pt
 * @property string $text_pt
 * @property string $title_es
 * @property string $text_es
 * @property string $title_en
 * @property string $text_en
 * @property string $title_it
 * @property string $text_it
 * @property string $title_fr
 * @property string $text_fr
 * @property string $title_de
 * @property string $text_de
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $pinterest
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $contact_number
 * @property int|null $active
 * @property string $created_date
 */
class Team extends \yii\db\ActiveRecord
{

    public $imageFile;
    
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
            [['username', 'full_name', 'image', 'location', 'title', 'text', 'title_pt', 'text_pt', 'title_es', 'text_es', 'title_en', 'text_en', 'title_it', 'text_it', 'title_fr', 'text_fr', 'title_de', 'text_de'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['username', 'full_name', 'image', 'location', 'title', 'text', 'title_pt', 'text_pt', 'title_es', 'text_es', 'title_en', 'text_en', 'title_it', 'text_it', 'title_fr', 'text_fr', 'title_de', 'text_de', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube', 'contact_number'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'full_name' => 'Full Name',
            'image' => 'Image',
            'location' => 'Location',
            'title' => 'Title',
            'text' => 'Text',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_es' => 'Title Es',
            'text_es' => 'Text Es',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'title_it' => 'Title It',
            'text_it' => 'Text It',
            'title_fr' => 'Title Fr',
            'text_fr' => 'Text Fr',
            'title_de' => 'Title De',
            'text_de' => 'Text De',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'pinterest' => 'Pinterest',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'contact_number' => 'Contact Number',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
