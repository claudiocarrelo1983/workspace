<?php

namespace common\models;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "faqs".
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property string $question_pt
 * @property string $answer_pt
 * @property string $question_en
 * @property string $answer_en
 * @property int $order
 * @property string $created_date
 */
class Faqs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faqs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position','page_code_question', 'page_code_answer', 'answer', 'answer_pt', 'answer_en'], 'string'],
            [['question','answer','position','order','question_pt', 'answer_pt', 'question_en', 'answer_en', 'order'], 'required'],
            [['order'], 'integer'],
            [['created_date'], 'safe'],
            [['question', 'question_pt', 'question_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'question' => 'Question',
            'answer' => 'Answer',
            'question_pt' => 'Question Pt',
            'answer_pt' => 'Answer Pt',
            'question_en' => 'Question En',
            'answer_en' => 'Answer En',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FaqsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FaqsQuery(get_called_class());
    }

    
    public function saveFaqs($page, $model){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){

            $question = 'question_' . $val['country_code'];   
            $answer = 'answer_' . $val['country_code'];   

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_question,
                'text' => $model->$question,
                'active' => '1',
            ])->execute();
            
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_answer,
                'text' => $model->$answer,
                'active' => '1',
            ])->execute();
        }

        return true;    
    }


    public function updateFaqs($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $question = 'question_' . $val['country_code'];   
            $answer = 'answer_' . $val['country_code'];            
           
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page=:page,
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
            ->bindValue(':page', $page)
            ->bindValue(':text', $model->$question)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->page_code_question)
            ->execute();   
            
            
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page=:page,
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
            ->bindValue(':page', $page)
            ->bindValue(':text', $model->$answer)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->page_code_answer)
            ->execute();  
        }
    }   
}
