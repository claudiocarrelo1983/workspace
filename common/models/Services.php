<?php

namespace common\models;

use yii\db\Query;
use common\helpers\Helpers;

use Yii;
/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $company
 * @property string $username
 * @property string|null $service_code
 * @property string $category_code
 * @property string $page_code_title
 * @property string $page_code_text
 * @property string $title
 * @property string $text
 * @property string $subtitle
 * @property string $title_pt
 * @property string $text_pt
 * @property string $title_en
 * @property string $text_en
 * @property int|null $price
 * @property int|null $order
 * @property int|null $active
 * @property string $created_date
 */
class Services extends \yii\db\ActiveRecord
{

    public $usernameArr;

    public $locationCodeArr;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company','location_code','username', 'category_code', 'page_code_title', 'page_code_text', 'title', 'text', 'title_pt', 'text_pt', 'title_en', 'text_en'], 'required'],
            [['text',  'text_pt', 'text_en'], 'string'],
            [['price', 'order', 'active'], 'integer'],
            [['created_date','time'], 'safe'],
            [['company', 'username', 'category_code', 'page_code_title', 'page_code_text', 'title', 'title_pt', 'title_en'], 'string', 'max' => 255],
            [['service_code'], 'string', 'max' => 50],
            [['page_code_title'], 'unique'],
            [['page_code_text'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company' => 'Company',
            'username' => 'Username',
            'service_code' => 'Service Code',
            'category_code' => 'Category Code',
            'page_code_title' => 'Page Code Title',
            'page_code_text' => 'Page Code Text',
            'title' => 'Title',
            'text' => 'Text',      
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'price' => 'Price',
            'order' => 'Order',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }


    public function updateServices($page, $model){
    
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
