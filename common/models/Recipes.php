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
            [['recipe_code_title', 'recipe_code_text', 'recipe_title', 'recipe_text','cooking_time', 'number_of_people', 'recipe_title_pt', 'recipe_text_pt', 'recipe_title_es', 'recipe_text_es', 'recipe_title_en', 'recipe_text_en', 'recipe_title_it', 'recipe_text_it', 'recipe_title_fr', 'recipe_text_fr', 'recipe_title_de', 'recipe_text_de'], 'required'],
            [['recipe_text', 'recipe_text_pt', 'recipe_text_es', 'recipe_text_en', 'recipe_text_it', 'recipe_text_fr', 'recipe_text_de'], 'string'],
            [['cooking_time', 'number_of_people', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['username', 'recipe_code_title', 'recipe_code_text', 'recipe_title', 'recipe_cat_code', 'recipe_title_pt', 'recipe_title_es', 'recipe_title_en', 'recipe_title_it', 'recipe_title_fr', 'recipe_title_de'], 'string', 'max' => 255],
            [['recipe_code_title'], 'unique'],
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

    
    public function saveRecipes($page, $arrValues = []){        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        $model = new Recipes();
        $code = 'recipe_code_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $code = 'recipe_code_'.bcadd($count->id, 1);
       }

        $connection->createCommand()->insert('recipes', [   
            'username' => '',   
            'recipe_code' => $code,     
            'recipe_code_title' => $arrValues['recipe_code_title'],  
            'recipe_code_text' => $arrValues['recipe_code_title'], 
            'recipe_title' => $arrValues['recipe_title'], 
            'cooking_time' => $arrValues['cooking_time'], 
            'number_of_people' => $arrValues['number_of_people'], 
            'active' => $arrValues['active'], 
            'image' => $arrValues['imageFile'], 
            'recipe_text' => $arrValues['recipe_text'],
            'recipe_title_en' => $arrValues['recipe_title_en'],
            'recipe_text_en' => $arrValues['recipe_text_en'],
            'recipe_title_pt' => $arrValues['recipe_title_pt'],
            'recipe_text_pt' => $arrValues['recipe_text_pt'],
            'recipe_title_es' => $arrValues['recipe_title_es'],
            'recipe_text_es' => $arrValues['recipe_text_es'],
            'recipe_title_it' => $arrValues['recipe_title_it'],
            'recipe_text_it' => $arrValues['recipe_text_it'],
            'recipe_title_de' => $arrValues['recipe_title_de'],
            'recipe_text_de' => $arrValues['recipe_text_de'],
            'recipe_title_fr' => $arrValues['recipe_title_fr'],
            'recipe_text_fr' => $arrValues['recipe_text_fr'],
        ])->execute();


        foreach($countries as $val){

            $title = 'recipe_title_' . $val['country_code'];   
            $text = 'recipe_text_' . $val['country_code'];   

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $arrValues['recipe_code_title'],
                'text' => $arrValues[$title],
                'active' => '1',
            ])->execute();
            
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $arrValues['recipe_code_text'],
                'text' => $arrValues[$text],
                'active' => '1',
            ])->execute();
        }

        return true;    
    }


    public function updateRecipes($model){

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
