<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "recipes_food".
 *
 * @property int $id
 * @property string $recipe_code
 * @property string $name
 * @property string $measure
 * @property string $calories
 * @property string|null $lipids
 * @property string|null $colesterol
 * @property string|null $sodium
 * @property string|null $carbs
 * @property string|null $fibers
 * @property string|null $sugar
 * @property string|null $protein
 * @property string $nutricion_pt
 * @property string $nutricion_es
 * @property string $nutricion_en
 * @property string $nutricion_it
 * @property string $nutricion_fr
 * @property string $nutricion_de
 * @property int|null $active
 * @property string $created_date
 */
class RecipesFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_code_text','quantity','fat','recipe_code', 'recipe_food_name', 'protein','fat','carbs','measure', 'calories', 'recipe_food_pt', 'recipe_food_es', 'recipe_food_en', 'recipe_food_it', 'recipe_food_fr', 'recipe_food_de'], 'required'],
            [[ 'calories', 'lipids', 'colesterol', 'sodium', 'carbs', 'fibers', 'sugar', 'protein','quantity','active','protein','fat','carbs'], 'number'],
            [['created_date'], 'safe'],
            [['recipe_code_text','fat','recipe_code', 'recipe_food_name', 'measure', 'recipe_food_pt', 'recipe_food_es', 'recipe_food_en', 'recipe_food_it', 'recipe_food_fr', 'recipe_food_de'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'measure' => 'Measure',
            'calories' => 'Calories',
            'lipids' => 'Lipids',
            'colesterol' => 'Colesterol',
            'sodium' => 'Sodium',
            'carbs' => 'Carbs',
            'fibers' => 'Fibers',
            'sugar' => 'Sugar',
            'protein' => 'Protein',
            'nutricion_pt' => 'Nutricion Pt',
            'nutricion_es' => 'Nutricion Es',
            'nutricion_en' => 'Nutricion En',
            'nutricion_it' => 'Nutricion It',
            'nutricion_fr' => 'Nutricion Fr',
            'nutricion_de' => 'Nutricion De',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RecipesFoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipesFoodQuery(get_called_class());
    }

    
    public function saveRecipesFood($page, $arrValues, $recipesCode){
    
        $connection = new Query;
        $idRecibes = str_replace("recipe_code_", "", $recipesCode);

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $i = 1;   

       foreach($arrValues as $arrValue){

            $pageCode = 'recipe_food_name_'.$idRecibes.'_' . $i;
            
            $connection->createCommand()
                ->delete('recipes_food', ['page_code' => $pageCode])
                ->execute();
         
            $connection->createCommand()->insert('recipes_food', [                
                'recipe_code' => $recipesCode,
                'recipe_food_name' =>  $arrValue['recipe_food_name'],   
                'page_code' => $pageCode,   
                'measure' => $arrValue['measure'],         
                'quantity' => $arrValue['quantity'],         
                'calories' => bcdiv(bcmul($arrValue['quantity'], $arrValue['calories']), 100),           
                'fat' => bcdiv(bcmul($arrValue['quantity'], $arrValue['calories']), 100),         
                'carbs' => bcdiv(bcmul($arrValue['carbs'], $arrValue['calories']), 100),         
                'protein' => bcdiv(bcmul($arrValue['protein'], $arrValue['calories']), 100),    
                'active' => $arrValue['active'],
                'recipe_food_en' => $arrValue['recipe_food_en'],         
                'recipe_food_pt' => $arrValue['recipe_food_pt'],         
                'recipe_food_es' => $arrValue['recipe_food_es'],           
                'recipe_food_it' => $arrValue['recipe_food_it'],
                'recipe_food_de' => $arrValue['recipe_food_de'],          
                'recipe_food_fr' => $arrValue['recipe_food_fr'],  
            ])->execute();      
            
            foreach($countries as $val){
    
                $text = 'recipe_food_'. $val['country_code'];         
            
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


    public function updateRecipesFood($page, $modelsRecipeFood, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $i = 1;
        
        $pageId = str_replace('recipe_code_', '', $model->recipe_code);

        $connection->createCommand()
            ->delete('recipes_food', ['recipe_code' => $model->recipe_code])
            ->execute();         

             
        foreach($modelsRecipeFood as $arrValue){

            $pageCode = 'recipe_food_name_'.$pageId.'_' . $i;

            $connection->createCommand()->insert('recipes_food', [                
                'recipe_code' => $model->recipe_code,
                'recipe_food_name' =>  $arrValue['recipe_food_name'],   
                'page_code' => $pageCode,   
                'measure' => $arrValue['measure'],         
                'quantity' => $arrValue['quantity'],         
                'calories' => $arrValue['calories'],           
                'fat' => $arrValue['fat'],
                'carbs' => $arrValue['carbs'],          
                'protein' => $arrValue['protein'],  
                'active' => $arrValue['active'],
                'recipe_food_en' => $arrValue['recipe_food_en'],         
                'recipe_food_pt' => $arrValue['recipe_food_pt'],         
                'recipe_food_es' => $arrValue['recipe_food_es'],           
                'recipe_food_it' => $arrValue['recipe_food_it'],
                'recipe_food_de' => $arrValue['recipe_food_de'],          
                'recipe_food_fr' => $arrValue['recipe_food_fr'],  
            ])->execute();

                
            foreach($countries as $val){

                $text = 'recipe_food_'. $val['country_code']; 

                $connection->createCommand()
                    ->delete('translations', [
                        'page_code' => $pageCode,
                        'country_code' => $val['country_code']
                    ])->execute();
        
                $text = 'recipe_food_'. $val['country_code'];         
            
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
    }   
}
