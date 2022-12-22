<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "blogs_category".
 *
 * @property int $id
 * @property string $tag
 * @property string|null $url
 * @property string $description
 * @property string|null $created_date
 */
class BlogsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag', 'page_code', 'description', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de'], 'required'],
            [['created_date'], 'safe'],
            [['tag_parent_id','tag', 'page_code', 'description', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de'], 'string', 'max' => 255],
            [['tag'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag', 
            'tag_parent_id' => 'Tag Parent Id',        
            'page_code' => 'Page Code',
            'description' => 'Description',
            'text_pt' => 'Text Pt',
            'text_es' => 'Text Es',
            'text_en' => 'Text En',
            'text_it' => 'Text It',
            'text_fr' => 'Text Fr',
            'text_de' => 'Text De',
            'created_date' => 'Created Date',
        ];
    }

    public function saveBlogCategory($page, $model){
        
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


    public function updateBlogCategory($model){

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
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
           
            ->bindValue(':text', $model->$text)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->page_code)
            ->execute();         

        }
    }   
}
