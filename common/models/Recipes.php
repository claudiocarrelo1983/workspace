<?php

namespace common\models;

use yii\db\Query;

use Yii;

/**
 * This is the model class for table "recipes".
 *
 * @property int $id
 * @property string|null $username
 * @property string $recipe_code_title
 * @property string $recipe_code_text
 * @property string $recipe_title
 * @property string $recipe_text
 * @property string $recipe_cat_code
 * @property int $cooking_time
 * @property int $number_of_people
 * @property string $recipe_title_pt
 * @property string $recipe_text_pt
 * @property string $recipe_title_es
 * @property string $recipe_text_es
 * @property string $recipe_title_en
 * @property string $recipe_text_en
 * @property string $recipe_title_it
 * @property string $recipe_text_it
 * @property string $recipe_title_fr
 * @property string $recipe_text_fr
 * @property string $recipe_title_de
 * @property string $recipe_text_de
 * @property int|null $active
 * @property string $created_date
 */
class Recipes extends \yii\db\ActiveRecord
{
     public $imageFile;

    public $tagsArr;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_cat_code','tagsArr','difficulty','recipe_code_title', 'recipe_code_text', 'recipe_title', 'recipe_text','cooking_time', 'number_of_people', 'recipe_title_pt', 'recipe_text_pt', 'recipe_title_es', 'recipe_text_es', 'recipe_title_en', 'recipe_text_en', 'recipe_title_it', 'recipe_text_it', 'recipe_title_fr', 'recipe_text_fr', 'recipe_title_de', 'recipe_text_de'], 'required'],
            [['recipe_cat_code','difficulty','recipe_text', 'recipe_text_pt', 'recipe_text_es', 'recipe_text_en', 'recipe_text_it', 'recipe_text_fr', 'recipe_text_de'], 'string'],
            [['cooking_time', 'number_of_people', 'active'], 'integer'],
            [['tagsArr','created_date','imageFile'], 'safe'],
            [['username', 'recipe_code_title', 'recipe_code_text', 'recipe_title', 'recipe_title_pt', 'recipe_title_es', 'recipe_title_en', 'recipe_title_it', 'recipe_title_fr', 'recipe_title_de'], 'string', 'max' => 255],
            [['recipe_code_title',], 'unique'],
            [['recipe_code_text'], 'unique'],
            [['recipe_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'recipe_code_title' => 'Recipe Code Title',
            'recipe_code_text' => 'Recipe Code Text',
            'recipe_title' => 'Recipe Title',
            'recipe_text' => 'Recipe Text',
            'recipe_cat_code' => 'Recipe Cat Code',
            'cooking_time' => 'Cooking Time',
            'number_of_people' => 'Number Of People',
            'recipe_title_pt' => 'Recipe Title Pt',
            'recipe_text_pt' => 'Recipe Text Pt',
            'recipe_title_es' => 'Recipe Title Es',
            'recipe_text_es' => 'Recipe Text Es',
            'recipe_title_en' => 'Recipe Title En',
            'recipe_text_en' => 'Recipe Text En',
            'recipe_title_it' => 'Recipe Title It',
            'recipe_text_it' => 'Recipe Text It',
            'recipe_title_fr' => 'Recipe Title Fr',
            'recipe_text_fr' => 'Recipe Text Fr',
            'recipe_title_de' => 'Recipe Title De',
            'recipe_text_de' => 'Recipe Text De',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RecipesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipesQuery(get_called_class());
    }

    
    public function saveRecipes($page, $modelRecipe){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $code = $this->saveSimple($page, $modelRecipe);     

        foreach($countries as $val){

            $title = 'recipe_title_' . $val['country_code'];   
            $text = 'recipe_text_' . $val['country_code'];   

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $modelRecipe->recipe_code_title,
                'text' => $modelRecipe->$title,
                'active' => '1',
            ])->execute();
            
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $modelRecipe->recipe_code_text,
                'text' => $modelRecipe->$text,
                'active' => '1',
            ])->execute();
        }

        return $code;   
    }

    public function saveSimple($page, $modelRecipe){

        $connection = new Query;

        $model = new Recipes();
        $code = 'recipe_code_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $code = 'recipe_code_'.bcadd($count->id, 1);
       }

        $value = $connection->createCommand()->insert('recipes', [   
            'username' => '',   
            'recipe_code' => $code, 
            'fatsecret_id' =>  $modelRecipe->fatsecret_id,    
            'recipe_code_title' => $modelRecipe->recipe_code_title,  
            'recipe_code_text' => $modelRecipe->recipe_code_text, 
            'recipe_cat_code' => $modelRecipe->recipe_cat_code, 
            'recipe_title' => $modelRecipe->recipe_title, 
            'cooking_time' => $modelRecipe->cooking_time, 
            'number_of_people' => $modelRecipe->number_of_people, 
            'difficulty' => $modelRecipe->difficulty, 
            'active' => $modelRecipe->active, 
            'image' => $modelRecipe->image, 
            'recipe_text' => $modelRecipe->recipe_text,
            'recipe_title_en' => $modelRecipe->recipe_title_en,
            'recipe_text_en' => $modelRecipe->recipe_text_en,
            'recipe_title_pt' => $modelRecipe->recipe_title_pt,
            'recipe_text_pt' => $modelRecipe->recipe_text_pt,
            'recipe_title_es' => $modelRecipe->recipe_title_es,
            'recipe_text_es' => $modelRecipe->recipe_text_es,
            'recipe_title_it' => $modelRecipe->recipe_title_it,
            'recipe_text_it' => $modelRecipe->recipe_text_it,
            'recipe_title_de' => $modelRecipe->recipe_title_de,
            'recipe_text_de' => $modelRecipe->recipe_text_de,
            'recipe_title_fr' => $modelRecipe->recipe_title_fr,
            'recipe_text_fr' => $modelRecipe->recipe_text_fr,
        ])->execute();

        return $code;
    }

    public function updateSimple($page, $modelRecipe){

        $connection = new Query;
     
       $connection->createCommand()->update('recipes', [   
            'username' => '',        
            'recipe_title' => $modelRecipe->recipe_title, 
            'cooking_time' => $modelRecipe->cooking_time, 
            'number_of_people' => $modelRecipe->number_of_people, 
            'difficulty' => $modelRecipe->difficulty, 
            'active' => $modelRecipe->active, 
            'image' => $modelRecipe->image, 
            'recipe_cat_code' => $modelRecipe->recipe_cat_code, 
            'recipe_text' => $modelRecipe->recipe_text,
            'recipe_title_en' => $modelRecipe->recipe_title_en,
            'recipe_text_en' => $modelRecipe->recipe_text_en,
            'recipe_title_pt' => $modelRecipe->recipe_title_pt,
            'recipe_text_pt' => $modelRecipe->recipe_text_pt,
            'recipe_title_es' => $modelRecipe->recipe_title_es,
            'recipe_text_es' => $modelRecipe->recipe_text_es,
            'recipe_title_it' => $modelRecipe->recipe_title_it,
            'recipe_text_it' => $modelRecipe->recipe_text_it,
            'recipe_title_de' => $modelRecipe->recipe_title_de,
            'recipe_text_de' => $modelRecipe->recipe_text_de,
            'recipe_title_fr' => $modelRecipe->recipe_title_fr,
            'recipe_text_fr' => $modelRecipe->recipe_text_fr,
        ],
        ['id' =>  $modelRecipe->id]
        )
        ->execute();

        return true;

    }


    public function updateRecipes($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $this->updateSimple($page, $model);       

        foreach($countries as $val){      

            $title = 'recipe_title_' . $val['country_code'];   
            $text = 'recipe_text_' . $val['country_code'];  
            
            $idRc = str_replace("recipe_code_","","$model->recipe_code");

            $connection->createCommand()->update('translations',
                [               
                    'text' => $model->$title         
                ],
                [
                    'page' => $page,
                    'page_code' => 'recipe_title_'. $idRc,
                    'country_code' => $val['country_code'],   
                ]
                )->execute();
            
                $connection->createCommand()->update('translations',
                [               
                    'text' => $model->$text         
                ],
                [
                    'page' => $page,
                    'page_code' => 'recipe_text_'. $idRc,
                    'country_code' => $val['country_code'],   
                ]
                )->execute();
        }

        return true;
    }   


    public function delete(){

        $connection = new Query;

        $arr = $connection->select([
            'id',
            'recipe_code',
            'image'
            ])
        ->from('recipes')   
        ->where(['id' => $this->id]) 
        ->one();

        if (file_exists(Yii::getAlias('@frontend') . '/web/' . $arr['image'])) {
            unlink(Yii::getAlias('@frontend') . '/web/' . $arr['image']);
        }

        $id = str_replace("recipe_code_", "",$arr['recipe_code']);
        $idSlash = $id . '_';     
       
        $connection->createCommand()
        ->delete('recipes', ['id' => $this->id])
        ->execute();  
    
        Yii::$app->db->createCommand("
            DELETE FROM recipes_food 
            WHERE recipe_code LIKE 'recipe_code_$id'
         ")->execute();

        Yii::$app->db->createCommand("
            DELETE FROM recipes_steps 
            WHERE recipe_code LIKE 'recipe_code_$id'
         ")->execute();
     
  
        Yii::$app->db->createCommand("
            DELETE FROM translations 
            WHERE page_code LIKE '%recibo_step_text_$idSlash%' 
            OR page_code LIKE '%recibo_food_name_$idSlash%'
            OR page_code LIKE '%recibo_step_text_$idSlash%'
            OR page_code = 'recipe_text_$id'
            OR page_code = 'recipe_title_$id'
         ")->execute();


        return true;
    }


    public static function recipeTags($arrTags){

        $arr =  array();

        foreach($arrTags as $values){

            if(empty($values['recipes_parent_id'])){    
                $values['submenu'] = Recipes::recipesTagsHelper($arrTags, $values);   
                $arr[] = $values;
            }         
        }
  
        return  $arr;

    }

    public static function recipesTagsHelper($arrTags, $values){

        $arr =  array();  
     
        foreach($arrTags as $tag){             
    
            if(!empty($tag['recipes_parent_id'])){
                if(trim($tag['recipes_parent_id']) == trim($values['recipe_cat_code'])){
                    $arr[] =  $tag;
                }      
            }
        }    
    
        return  $arr;
    }
}
