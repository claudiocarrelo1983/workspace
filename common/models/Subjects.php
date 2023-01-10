<?php

namespace common\models;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $id
 * @property string|null $subject
 * @property string $text_pt
 * @property string $text_es
 * @property string $text_en
 * @property string $text_it
 * @property string $text_fr
 * @property string $text_de
 * @property int|null $order
 * @property string $created_date
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order','page_code','subject','text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de'], 'required'],
            [['order'], 'integer'],
            [['created_date'], 'safe'],
            [['subject', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'text_pt' => 'Text Pt',
            'text_es' => 'Text Es',
            'text_en' => 'Text En',
            'text_it' => 'Text It',
            'text_fr' => 'Text Fr',
            'text_de' => 'Text De',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SubjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectsQuery(get_called_class());
    }

    
    public function saveSubject($page, $model){
        

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
                'active' => '1',
            ])->execute();
        }

        return true;    
    }


    public function updateSubject($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $text = 'text_'.$val['country_code'];            
           
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page=:page,  
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
           
            ->bindValue(':text', $model->$text)
            ->bindValue(':page', $page)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->page_code)
            ->execute();         

        }
    } 
}
