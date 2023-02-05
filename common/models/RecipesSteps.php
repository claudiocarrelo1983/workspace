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
 * @property string $recipe_step_title_en
 * @property string $recipe_step_text_en

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
            [['recipe_code_text','order', 'recipe_code', 'recipe_step_text',  'recipe_step_text_pt', 'recipe_step_text_en'], 'required'],
            [['recipe_code_text','recipe_step_text', 'recipe_step_text_pt', 'recipe_step_text_en'], 'string'],
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
            'recipe_step_text_en' => 'Recipe Step Text En',       
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }

    

    public function saveRecipesSteps($page, $arrValues = [], $recipesCode){        

        $connection = new Query;

        $idRecibes = str_replace("recipe_code_", "", $recipesCode);

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $i = 1;

        $connection->createCommand()
        ->delete('recipes_steps', ['recipe_code' => $recipesCode])
        ->execute();


        foreach($arrValues as $arrValue){

            $pageCode = 'recipe_step_text_'.$idRecibes.'_' . $i;

       

            $connection->createCommand()->insert('recipes_steps', [                
                'recipe_code' => $recipesCode,
                'page_code' => $pageCode,
                'recipe_step_text' => $arrValue['recipe_step_text'],       
                'recipe_step_text_en' => $arrValue['recipe_step_text_en'],         
                'recipe_step_text_pt' => $arrValue['recipe_step_text_pt'],        
                'order' => $i,
            ])->execute();

        
            foreach($countries as $val){
    
                $text = 'recipe_step_text_'. $val['country_code'];         
            
                $connection->createCommand()->insert('translations', [      
                    'country_code' => $val['country_code'],  
                    'page' => $page,
                    'page_code' => $pageCode,
                    'text' => $arrValue[$text],
                    'active' => '1',
                ])->execute();  
              
            }

            $i++;
       }
      
        return true;    
    }   

    public function updateRecipesSteps($page, $arrRecipeSteps, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        //$this->updateSimples($arrRecipeSteps, $model);   

        $pageId = str_replace('recipe_code_', '', $model->recipe_code);

        $i = 1;    

        $connection->createCommand()
        ->delete('recipes_steps', ['recipe_code' => $model->recipe_code])
        ->execute();  

        foreach($arrRecipeSteps as $arr){        
  
            $pageCode = 'recipe_step_text_'.$pageId.'_'.$i;      

            $connection->createCommand()->insert('recipes_steps', [                
                    'recipe_code' => $model->recipe_code,
                    'page_code' => $pageCode,
                    'recipe_step_text' => $arr['recipe_step_text'],       
                    'recipe_step_text_en' => $arr['recipe_step_text_en'],         
                    'recipe_step_text_pt' => $arr['recipe_step_text_pt'],        
                    'order' => $i,
                ])->execute();                  
         
                
                foreach($countries as $val){
        
                    $connection->createCommand()
                    ->delete('translations', [
                        'page_code' => $pageCode,
                        'country_code' => $val['country_code']
                    ])->execute();
            
                    $text = 'recipe_step_text_'. $val['country_code'];         
                
                    $connection->createCommand()->insert('translations', [      
                        'country_code' => $val['country_code'],  
                        'page' => $page,
                        'page_code' => $pageCode,
                        'text' => $arr[$text],
                        'active' => '1',
                    ])->execute();          
                          
                }

            $i++;
        }
        
      
        
    }   

}
