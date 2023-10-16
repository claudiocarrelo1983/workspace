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

        $arrRequired = ['company_code', 'category_code', 'page_code_title', 'title'];
        
        $activeLanguagesArr = Helpers::activeLanguages();

        $arrMerge = [];

        foreach($activeLanguagesArr as $lang => $value){
            if($value == 1){
                $arrMerge[] = 'title_'.$lang;
            }
        }

        $arrRequired = array_merge($arrRequired,$arrMerge);

        return [
            [$arrRequired, 'required'],
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
            'company_code' => Yii::t('app','company_code'),
            'category_code' => Yii::t('app','category_code'),
            'page_code_title' => Yii::t('app','page_code_title'),
            'title' => Yii::t('app','title'),
            'title_pt' => Yii::t('app','title_pt'),
            'title_en' => Yii::t('app','title_en'),
            'order' => Yii::t('app','order'),
            'active' => Yii::t('app','active'),
            'created_date' => Yii::t('app','created_date'),
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
