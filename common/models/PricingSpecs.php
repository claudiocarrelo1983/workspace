<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "pricing_specs".
 *
 * @property int $id
 * @property string $type
 * @property string $page_code
 * @property string $description
 * @property string $text_pt
 * @property string $text_es
 * @property int|null $active
 */
class PricingSpecs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricing_specs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order','type', 'page_code', 'description', 'text_pt', 'text_en'], 'required'],
            [['active','order'], 'integer'],
            [['type', 'page_code', 'description', 'text_pt', 'text_en'], 'string', 'max' => 255],
            [['page_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'page_code' => 'Page Code',
            'description' => 'Description',
            'text_pt' => 'Text Pt',    
            'text_en' => 'Text En',
            'active' => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PricingSpecsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PricingSpecsQuery(get_called_class());
    }


    public function savePricingSpecs($page, $model){
        

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


    public function updatePricingSpecs($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $text = 'text_' . $val['country_code'];            
           
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
