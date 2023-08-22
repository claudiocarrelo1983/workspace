<?php

namespace common\models;

use yii\db\Query;
use common\helpers\Helpers;

use Yii;

/**
 * This is the model class for table "services_category".
 *
 * @property int $id
 * @property string $company
 * @property string $category_code
 * @property string $page_code_title
 * @property string $title
 * @property string $title_pt
 * @property string $title_en
 * @property int|null $order
 * @property int|null $active
 * @property string $created_date
 */
class ServicesCategory extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_code', 'category_code', 'page_code_title', 'title', 'title_pt', 'title_en'], 'required'],
            [['order', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code', 'category_code', 'page_code_title', 'title', 'title_pt', 'title_en'], 'string', 'max' => 255],
            [['page_code_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_code' => 'Company',
            'category_code' => 'Category Code',
            'page_code_title' => 'Page Code Title',
            'title' => 'Title',
            'title_pt' => 'Title Pt',
            'title_en' => 'Title En',
            'order' => 'Order',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    public function updateServicesCategory($page, $model){
      
        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

      
        foreach ($countries as $val) {

            $title = 'title_' . $val['country_code'];  

            $connection->createCommand()->delete('translations',
            [   
                'page' => $page,
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
         
        }    
    }   
}
