<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "translations".
 *
 * @property int $id
 * @property string|null $country_code
 * @property string|null $page_code
 * @property string|null $text
 * @property string $created_date
 * @property int|null $active
 */
class Translations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'text_pt','text_en'], 'string'],
            [['created_date'], 'safe'],
            [['active'], 'integer'],
            [['page', 'page_code', 'text', 'text_pt', 'text_en'], 'required'],
            [['page', 'page_code'], 'string', 'max' => 255]        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'page_code' => 'Page Code',
            'text' => 'Text',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TranslationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TranslationsQuery(get_called_class());
    }


    public function saveTranslations($page, $model){
        
        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){
            $text = 'text_'.$val['country_code'];
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code,
                'text' => $model->$text,
                'active' => $model->active,
            ])->execute();
        }

        return true;    
    }


    public function updateTranslations($name, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();    

        foreach ($countries as $val) {          

            $connection->createCommand()->delete(
                'translations',
                [
                    'country_code' => $val['country_code'],
                    'page_code' => $model->page_code,
                    'page' => $model->page
                ]
            )->execute();

            $connection->createCommand()->insert('translations', [
                'country_code' => $val['country_code'],
                'page_code' => $model->page_code,
                'page' => $model->page,
                'text' => $model->text,
                'active' => 1,
            ])->execute();  
       
        }
    }   

}
