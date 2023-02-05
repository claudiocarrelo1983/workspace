<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "texts".
 *
 * @property int $id
 * @property string|null $code_page
 * @property string|null $title
 * @property string|null $text
 * @property string $created_date
 */
class Texts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code','page_code_title','page_code_text','text','text_pt', 'text_en', 'text_es', 'text_fr', 'text_it', 'text_de'], 'string'],
            [['title','text','text_pt', 'text_en', 'text_es', 'text_fr', 'text_it', 'text_de'], 'required'],  
            [['created_date'], 'safe'],
            [['code'], 'unique'],
            [['title','title_pt', 'title_en', 'title_es', 'title_fr', 'title_it', 'title_de'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_code_title' => 'Code Page',
            'title' => 'Title',
            'text' => 'Text',
            'created_date' => 'Created Date',
        ];
    }

    

    public function saveTexts($page, $model){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){

            $title = 'title_' . $val['country_code'];   
            $text = 'text_' . $val['country_code'];   

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => '1',
            ])->execute();
            
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => '1',
            ])->execute();
        }

        return true;      
    }

   
    public function updateTexts($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $title = 'title_' . $val['country_code'];   
            $text = 'text_' . $val['country_code'];          
           

            $connection->createCommand()->delete('translations',
            [   
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
 
        }
    }   
}
