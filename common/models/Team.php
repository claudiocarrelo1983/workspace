<?php

namespace common\models;

use yii\db\Query;

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
 * @property string $title_en
 * @property string $text_en
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
            [['page_code_title','page_code_text', 'username', 'full_name', 'image', 'location', 'title', 'text', 'title_pt', 'text_pt','title_en', 'text_en'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['username', 'full_name', 'image', 'location', 'title', 'text', 'title_pt', 'text_pt', 'title_en', 'text_en', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube', 'contact_number'], 'string'],
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
            'contact_number' => 'Contact Number',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    public function imgUrl(){
        return '/images/team/';
    }

    public static function saveTeam($page, $model){
        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){

            $title = 'title_'.$val['country_code'];   
            $text = 'text_'.$val['country_code'];

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => $model->active,
            ])->execute();
       
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => $model->active,
            ])->execute();
        }

        return true;    
    }


    public static function updateTeam($page, $model)
    {

        $connection = new Query;

        $countries = $connection->select([
            'country_code'
        ])
            ->from('countries')
            ->all();

        foreach ($countries as $val) {

            $title = 'title_' . $val['country_code'];
            $subtitle = 'subtitle_' . $val['country_code'];
            $text = 'text_' . $val['country_code'];

            $connection->createCommand()->delete(
                'translations',
                [
                    'country_code' => $val['country_code'],
                    'page_code' => $model->page_code_title
                ]
            )->execute();

            $connection->createCommand()->insert('translations', [
                'country_code' => $val['country_code'],
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => 1,
            ])->execute();      

            $connection->createCommand()->delete(
                'translations',
                [
                    'country_code' => $val['country_code'],
                    'page_code' => $model->page_code_text
                ]
            )->execute();

            $connection->createCommand()->insert('translations', [
                'country_code' => $val['country_code'],
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => 1,
            ])->execute();


        }
    }
}
