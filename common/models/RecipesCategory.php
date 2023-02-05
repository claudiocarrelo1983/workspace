<?php

namespace common\models;
use common\models\RecipesCategory;
use common\models\GeneratorJson;

use yii\db\Query;
use Yii;

/**
 * This is the model class for table "recipes_category".
 *
 * @property int $id
 * @property string|null $recipes_parent_id
 * @property string $page_code
 * @property string $recipe_cat_code
 * @property string $description
 * @property string $recipe_pt
 * @property string $recipe_es
 * @property string $recipe_en
 * @property string $recipe_it
 * @property string $recipe_fr
 * @property string $recipe_de
 * @property int|null $active
 * @property string $created_date
 */
class RecipesCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_code', 'recipe_cat_code', 'description', 'recipe_pt','recipe_en'], 'required'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['recipes_parent_id', 'page_code', 'recipe_cat_code', 'description', 'recipe_pt','recipe_en'], 'string', 'max' => 255],
            [['page_code'], 'unique'],
            [['recipe_cat_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipes_parent_id' => 'Recipes Parent ID',
            'page_code' => 'Recipe Code',
            'recipe_cat_code' => 'Recipe Cat Code',
            'description' => 'Description',
            'recipe_pt' => 'Recipe Pt',           
            'recipe_en' => 'Recipe En',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    
    public function saveRecipesCategory($page, $model){
        
        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $connection->createCommand()
        ->delete('translations', ['page_code' => $model->page_code])
        ->execute();  

        foreach($countries as $val){
            $text = 'recipe_'.$val['country_code'];
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


    public function updateRecipesCategory($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();  

        $connection->createCommand()
        ->delete('translations', ['page_code' => $model->page_code])
        ->execute();  

        foreach($countries as $val){
            $text = 'recipe_'.$val['country_code'];
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code,
                'text' => $model->$text,
                'active' => $model->active,
            ])->execute();
        }
    }   

    public static function organizeRecipesCategories()
    {       

        $model = new GeneratorJson(); 
        $structure = $model->getLastFileUploaded('recipes_category');
        $structure  = Recipes::recipeTags($structure);  

        $recipes = $model->getLastFileUploaded('recipes');      
                
        $recipeCat = [];
        $arrResult = [];

        //helper for categories

        foreach ($structure as $key => $submenu) {
            foreach ($recipes as $recipe) {          
                $arrRecipesTags = explode(',', $recipe['recipe_cat_code']);    
                foreach($arrRecipesTags as $valueRecipeTag){             
                    if(empty($submenu['submenu'])){   
                        
                        $subcategories = ['submenu' => []];
                        if($submenu['recipe_cat_code'] == $valueRecipeTag){      
                            $arrResult[$key] = array_merge($submenu, $subcategories);                  
                        }           

                    }else{

                        foreach($submenu['submenu'] as $value){                     
                            if(trim($valueRecipeTag) == trim($value['recipe_cat_code'])){
                                $recipeCat[$valueRecipeTag] = $value;
                            }
                        }      
                        
                        $subcategories = ['submenu' => []];
                        foreach ($recipeCat as $subcategory) {
                            if($submenu['recipe_cat_code'] == $subcategory['recipes_parent_id']){      
                                $subcategories['submenu'][] = $subcategory;          
                            }    
                        }
            
                        if(!empty($subcategories['submenu'])){
                            $arrResult[$key] = array_merge($submenu, $subcategories);
                       }  
                    }             
                }        
            }   
        }


        return $arrResult;

    }
}
