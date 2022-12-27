<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "recipes_steps".
 *
 * @property int $id
 * @property string $username
 * @property string $recipe_code
 * @property string $recipe_step_title
 * @property string $recipe_step_text
 * @property string $recipe_step_title_pt
 * @property string $recipe_step_text_pt
 * @property string $recipe_step_title_es
 * @property string $recipe_step_text_es
 * @property string $recipe_step_title_en
 * @property string $recipe_step_text_en
 * @property string $recipe_step_title_it
 * @property string $recipe_step_text_it
 * @property string $recipe_step_title_fr
 * @property string $recipe_step_text_fr
 * @property string $recipe_step_title_de
 * @property string $recipe_step_text_de
 * @property int|null $order
 * @property string $created_date
 */
class RecipesSteps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_steps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'recipe_code', 'recipe_step_text',  'recipe_step_text_pt', 'recipe_step_text_es', 'recipe_step_text_en', 'recipe_step_text_it', 'recipe_step_text_fr','recipe_step_text_de'], 'required'],
            [['recipe_step_text', 'recipe_step_text_pt', 'recipe_step_text_es', 'recipe_step_text_en', 'recipe_step_text_it', 'recipe_step_text_fr', 'recipe_step_text_de'], 'string'],
            [['order'], 'integer'],
            [['created_date'], 'safe'],
            [['recipe_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipe_code' => 'Recipe Code',
            'recipe_step_text' => 'Recipe Step Text',   
            'recipe_step_text_pt' => 'Recipe Step Text Pt',
            'recipe_step_text_es' => 'Recipe Step Text Es',  
            'recipe_step_text_en' => 'Recipe Step Text En',
            'recipe_step_text_it' => 'Recipe Step Text It',
            'recipe_step_text_fr' => 'Recipe Step Text Fr',
            'recipe_step_text_de' => 'Recipe Step Text De',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }

    

    public function saveRecipesSteps($page, $arrValues = []){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $model = new Recipes;

        $value = $model::find('recipe_code')->orderBy("id desc")->limit(1)->one();

       foreach($arrValues as $arrValue){
            $connection->createCommand()->insert('recipes_steps', [                
                'recipe_code' => $value->recipe_code,
                'recipe_step_text' => $arrValue['recipe_step_text'],       
                'recipe_step_text_en' => $arrValue['recipe_step_text_en'],         
                'recipe_step_text_pt' => $arrValue['recipe_step_text_pt'],         
                'recipe_step_text_es' => $arrValue['recipe_step_text_es'],           
                'recipe_step_text_it' => $arrValue['recipe_step_text_it'],
                'recipe_step_text_de' => $arrValue['recipe_step_text_de'],          
                'recipe_step_text_fr' => $arrValue['recipe_step_text_fr'],  
                'order' => $arrValue['order'],
            ])->execute();

            $i = 1;

            foreach($countries as $val){
    
                $text = 'recipe_step_text_' . $val['country_code'];         
            
                $connection->createCommand()->insert('translations', [      
                    'country_code' => $val['country_code'],  
                    'page' => $page,
                    'page_code' => 'recibo_step_text_'. $value->id.'_'.$i,
                    'text' => $arrValue[$text],
                    'active' => '1',
                ])->execute();  

                $i++;
            }
       }

        return true;    
    }
    


    public function updateRecipesSteps($model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $title = 'recipe_title_' . $val['country_code'];   
            $text = 'recipe_text_' . $val['country_code'];            
           
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
           
            ->bindValue(':text', $model->$title)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->recipe_code_title)
            ->execute();   
            
            
            Yii::$app->db->createCommand("UPDATE translations SET             
                text=:text,
                page_code=:page_code            
                WHERE  page_code=:page_code 
                AND country_code=:country_code"
            )          
        
            ->bindValue(':text', $model->$text)
            ->bindValue(':country_code', $val['country_code'])
            ->bindValue(':page_code', $model->recipe_code_text)
            ->execute();  
        }
    }   
}
