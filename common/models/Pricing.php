<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "pricing".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $coin
 * @property string|null $key
 * @property int|null $standard
 * @property int|null $professional
 * @property int|null $enterprise
 * @property string $created_date
 */
class Pricing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key','coin'], 'unique'],
            [['key','coin', 'page_code_title','title_pt', 'title_en', 'title_es',  'title_fr', 'title_de', 'title_it'], 'required'],
            [['standard', 'professional', 'enterprise'], 'integer'],
            [['created_date'], 'safe'],
            [['title', 'coin', 'key'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'coin' => 'Coin',
            'key' => 'Key',
            'standard' => 'Standard',
            'professional' => 'Professional',
            'enterprise' => 'Enterprise',
            'created_date' => 'Created Date',
        ];
    }


    public static function savePricing($page, $model){
        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){

            $title = 'title_'.$val['country_code'];        
   
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => $model->active,
            ])->execute();
        
        
        }

        return true;    
    }


    public static function updatePricing($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $title = 'title_'.$val['country_code'];
   
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page=:page,
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
            ->bindValue(':text', $model->$title)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->page_code_title)
            ->bindValue(':page', $page)
            ->execute();       

        }
    }  

}
