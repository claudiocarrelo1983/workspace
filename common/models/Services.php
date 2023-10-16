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

        $arrRequired = ['location_code','username','company_code','time','price','location_code','username', 'category_code', 'page_code_title', 'page_code_text', 'title'];
        
        $activeLanguagesArr = Helpers::activeLanguages();

        $arrMerge = [];

        foreach($activeLanguagesArr as $lang => $value){
            if($value == 1){
                $arrMerge[] = 'title_'.$lang;
                //$arrMerge[] = 'text_'.$lang;
            }
        }

        $arrRequired = array_merge($arrRequired,$arrMerge);

        return [
            [$arrRequired, 'required'],
            [['text',  'text_pt', 'text_en'], 'string'],
            [['price', 'price_range'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['order', 'active'], 'integer'],
            [['created_date','time'], 'safe'],
            [['username', 'company_code','category_code', 'page_code_title', 'page_code_text', 'title', 'title_pt', 'title_en'], 'string', 'max' => 255],
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
            'company_code' => Yii::t('app','company_code_location'),
            'location_code' => Yii::t('app','company_code_location'),
            'username' => Yii::t('app','team_members'),
            'service_code' => Yii::t('app','service_code'),
            'category_code' => Yii::t('app','service_cat'),
            'page_code_title' => Yii::t('app','page_code_title'),
            'page_code_text' => Yii::t('app','page_code_text'),
            'title' => Yii::t('app','description'),
            'text' => Yii::t('app','description_text'),
            'title_pt' => Yii::t('app','title_pt'),
            'text_pt' => Yii::t('app','text_pt'),
            'title_en' => Yii::t('app','title_en'),
            'text_en' => Yii::t('app','text_en'),
            'price' => Yii::t('app','price'),
            'order' => Yii::t('app','order'),
            'time' => Yii::t('app','duration'),
            'active' => Yii::t('app','active'),
            'created_date' => Yii::t('app','created_date'),
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
