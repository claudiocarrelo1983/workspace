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
class RecipesLoad extends \yii\db\ActiveRecord
{
     public $recipe_id;
     public $fiber;
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
            [['recipe_id'], 'required'],
            [['recipe_id'], 'integer'],
            [['recipe_id'], 'checkUniqueCode'],
           // [['recipe_id'], 'existCode'],
        ];
    }

    public function checkUniqueCode($attribute, $params)
    {

        $count = Recipes::find('recipe_code')->where(['fatsecret_id' => $this->$attribute])->count();

        if($count > 0){
            // no real check at the moment to be sure that the error is triggered
            $this->addError($attribute, 'Fat Secret ID was allready used');
        }
    

        $tokenArr = $this->getToken();
    
        $errorApi =$this->getRecipeArr($this->recipe_id, 'recipe.get', $tokenArr->access_token);

        if(isset($errorApi->error)){
               // no real check at the moment to be sure that the error is triggered
               $this->addError($attribute, $errorApi->error->message);
        }

        
        if($count > 0){
            // no real check at the moment to be sure that the error is triggered
            $this->addError($attribute, 'Fat Secret ID was allready used');
        }  
     
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

    
    public function getFatSecretObj(){

        $tokenArr = $this->getToken();
    
        $objRecipeFatSecret = $this->getRecipeArr($this->recipe_id, 'recipe.get', $tokenArr->access_token);
   
        return $objRecipeFatSecret;   
    }

    public function saveRecipes($modelRecipe, $modelRecipeId){

        $modelRecipe = new Recipes;
        $modelRecipeCategory = new RecipesCategory;

        $objFatSecret = $modelRecipeId->getFatSecretObj();
        $recipeFatSecret = $objFatSecret->recipe;

               
        $recipeCodeTitle = 'recipe_title_1';
        $recipeCodeText = 'recipe_text_1';
        $recipeCodeSteps = 'recipe_steps_1';
        $recipeCodeIngredients = 'recipe_ingredients_1';    

        $count = $modelRecipe::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $recipeCodeTitle = 'recipe_title_'.bcadd($count->id, 1);
         $recipeCodeText = 'recipe_text_'.bcadd($count->id, 1);
         $recipeCodeSteps = 'recipe_steps_'.bcadd($count->id, 1);
         $recipeCodeIngredients = 'recipe_ingredients_'.bcadd($count->id, 1);
       }

        $recipeCat = $this->saveRecipesCategory($recipeFatSecret);
  
        $modelRecipe->recipe_code_title = $recipeCodeTitle;
        $modelRecipe->recipe_code_text = $recipeCodeText;
        $modelRecipe->recipe_cat_code = $recipeCat;
        $modelRecipe->recipe_title = $recipeFatSecret->recipe_name;
        $modelRecipe->cooking_time = $recipeFatSecret->preparation_time_min;
        $modelRecipe->number_of_people = $recipeFatSecret->number_of_servings;
        $modelRecipe->difficulty = 'easy';
        $modelRecipe->active = '1';
        $modelRecipe->fatsecret_id = $modelRecipeId->recipe_id;       
        $modelRecipe->image = $recipeFatSecret->recipe_images->recipe_image;
        $modelRecipe->recipe_text = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_en = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_en = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_pt = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_pt  = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_es = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_es = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_it = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_it = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_de = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_de = $recipeFatSecret->recipe_description;
        $modelRecipe->recipe_title_fr = $recipeFatSecret->recipe_name;
        $modelRecipe->recipe_text_fr = $recipeFatSecret->recipe_description;    
       

        $recipesCode = $modelRecipe->saveRecipes('recipes', $modelRecipe);

        $this->saveRecipesSteps($modelRecipe, $recipeFatSecret, $modelRecipeId, $recipesCode, $recipeCodeSteps);

        $this->saveRecipesIngredients($modelRecipe, $recipeFatSecret, $modelRecipeId, $recipesCode, $recipeCodeIngredients);

        return $recipesCode;
        
    }

    public function saveRecipesCategory($recipeFatSecret){

        $modelRecipeCategory = new RecipesCategory();
        
   
    
        $arrTags = [];

        foreach ($recipeFatSecret->recipe_types->recipe_type as $type) {

            $code = 'recipes_category_1';

            $count = $modelRecipeCategory::find('id')->orderBy("id desc")->limit(1)->one();
    
           if(!empty($count->id)){
             $code = 'recipes_category_'.bcadd($count->id, 1);
           }

            $connection = new Query;

            $tagCode = strtolower(str_replace(" ", "_", $type));

            $modelRecipeCategory->page_code = $code;
            $modelRecipeCategory->recipe_cat_code = $tagCode;
            $modelRecipeCategory->recipes_parent_id = '';
            $modelRecipeCategory->description = $type;
            $modelRecipeCategory->recipe_pt  = $type;
            $modelRecipeCategory->recipe_en = $type;
            $modelRecipeCategory->recipe_es  = $type;
            $modelRecipeCategory->recipe_it  = $type; 
            $modelRecipeCategory->recipe_fr  = $type;
            $modelRecipeCategory->recipe_de  = $type;
            $modelRecipeCategory->active  = 1;

            $count = $modelRecipeCategory::find('id')->where(['recipe_cat_code' => $tagCode])->limit(1)->one();

            if(empty($count)){ 
                //$modelRecipeCategory->save();  
                $connection->createCommand()->insert('recipes_category', [      
                    'page_code' => $modelRecipeCategory->page_code,  
                    'recipe_cat_code' => $modelRecipeCategory->recipe_cat_code,  
                    'recipes_parent_id' => $modelRecipeCategory->recipes_parent_id,  
                    'description' => $modelRecipeCategory->description,  
                    'recipe_pt' => $modelRecipeCategory->recipe_pt,  
                    'recipe_en' => $modelRecipeCategory->recipe_en, 
                    'recipe_es' => $modelRecipeCategory->recipe_es,  
                    'recipe_it' => $modelRecipeCategory->recipe_it,                    
                    'recipe_fr' => $modelRecipeCategory->recipe_fr,  
                    'recipe_de' => $modelRecipeCategory->recipe_de, 
                    'active' => $modelRecipeCategory->active,
                ])->execute();

                $modelRecipeCategory->saveRecipesCategory('recipes_category', $modelRecipeCategory);    
            }

            $arrTags[] = $tagCode;
        }

        $tagString = implode(',', $arrTags);

        return $tagString;
    }

    public function saveRecipesSteps($modelRecipe, $recipeFatSecret, $modelRecipeId, $recipesCode , $recipeCodeSteps)
    {
        $RecipesSteps = new RecipesSteps;

        $arrSteps = [];

        $i = 1;

        foreach($recipeFatSecret->directions->direction as $ingredient){
            $arrSteps[] = [
                'order' => $i++,
                'recipe_step_text' => $ingredient->direction_description,
                'recipe_step_text_en' => $ingredient->direction_description,
                'recipe_step_text_pt' => $ingredient->direction_description,
                'recipe_step_text_es' => $ingredient->direction_description,
                'recipe_step_text_it' => $ingredient->direction_description,
                'recipe_step_text_de' => $ingredient->direction_description,
                'recipe_step_text_fr' => $ingredient->direction_description,

            ];
        }        

        $RecipesSteps->saveRecipesSteps('recipes', $arrSteps, $recipesCode); 

    }


    
    public function saveRecipesIngredients($modelRecipe, $recipeFatSecret, $modelRecipeId, $recipesCode, $recipeCodeIngredients)
    {
        $RecipesFood = new RecipesFood;

        $arrIngredients = [];

        $tokenArr = $this->getToken();        
       
        foreach($recipeFatSecret->ingredients->ingredient as $ingredient){    

            $objFood = $this->getRecipeArr($ingredient->food_id, 'food.get.v2', $tokenArr->access_token);          
           
            if(is_array($objFood->food->servings->serving)){

                foreach($objFood->food->servings->serving as $serving){
                  
                    if($serving->serving_id == $ingredient->serving_id){                     
                        $ingredient->calories = $serving->calories;   
                        $ingredient->fat =  $serving->fat;  
                        $ingredient->colesterol = $serving->cholesterol;  
                        $ingredient->carbs = $serving->carbohydrate; 
                        $ingredient->protein = $serving->protein;    
                        $ingredient->fiber = $serving->fiber;
                        $ingredient->sodium = $serving->sodium;     
                        $ingredient->sugar = (isset($serving->sugar) ? $serving->sugar : 0);                  
                    }                   
                }
                
            }else{
 
                $ingredient->calories = (isset($objFood->food->servings->serving->calories) ? $objFood->food->servings->serving->calories : 0);
                $ingredient->fat = (isset($objFood->food->servings->serving->fat) ? $objFood->food->servings->serving->fat : 0);        
                $ingredient->carbs = (isset($objFood->food->servings->serving->carbohydrate) ? $objFood->food->servings->serving->carbohydrate : 0);
                $ingredient->colesterol = (isset($objFood->food->servings->serving->cholesterol) ? $objFood->food->servings->serving->cholesterol : 0);
                $ingredient->protein = (isset($objFood->food->servings->serving->protein) ? $objFood->food->servings->serving->protein : 0);
                $ingredient->fibers = (isset($objFood->food->servings->serving->fiber) ? $objFood->food->servings->serving->fiber : 0);  
                $ingredient->sodium = (isset($objFood->food->servings->serving->sodium) ? $objFood->food->servings->serving->sodium : 0);  
                $ingredient->sugar = (isset($objFood->food->servings->serving->sugar) ? $objFood->food->servings->serving->sugar : 0); 
        
            }
       
            $arrIngredients[] = [
                'recipe_food_name' => $ingredient->food_name,
                'quantity' =>  floatval($ingredient->number_of_units),
                'recipe_food_pt' => $ingredient->food_name,
                'recipe_food_es' => $ingredient->food_name,
                'recipe_food_en' => $ingredient->food_name,
                'recipe_food_it' => $ingredient->food_name,
                'recipe_food_de' => $ingredient->food_name,
                'recipe_food_fr' => $ingredient->food_name,
                'measure' => $ingredient->measurement_description,
                'calories' => floatval($ingredient->calories),
                'fat' => floatval($ingredient->fat),              
                'colesterol' => (isset($ingredient->cholesterol) ? floatval($ingredient->cholesterol) : 0),
                'fibers' => (isset($ingredient->fiber) ? floatval($ingredient->fiber) : 0),
                'sodium' => floatval($ingredient->sodium),
                'sugar' => floatval($ingredient->sugar),
                'carbs' => floatval($ingredient->carbs),
                'protein' => floatval($ingredient->protein),
                'active' => 0,


            ];
        }
     
        $RecipesFood->saveRecipesFood('recipes',  $arrIngredients, $recipesCode);

    }

    private function getToken(){

        $url = "https://oauth.fatsecret.com/connect/token";
        $username = '841a1e2885854dfdab58d93e8ad8aef9';
        $password = '09aadb8def624eda9da40ff362488f06';

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic '. base64_encode($username.':'.$password) 
        );

        $body = array( 
            'grant_type' => 'client_credentials',
            'scope' => 'basic'
        );

        $curl = curl_init();           
        curl_setopt($curl, CURLOPT_URL,$url);   
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl,CURLOPT_POSTFIELDS, http_build_query($body));        
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);   
        $content = curl_exec($curl); 
        $err = curl_error($curl);        
        curl_close($curl); 
        $arrRecipes = json_decode($content);

        if(empty($err)){
            echo  ($err);          
        }

        return $arrRecipes;     
    }

    function getStringBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    

    public function getRecipeArr($recipeId, $method, $token){
        

        $params = $this->getParams($method, $recipeId);

        $str = '?';
        $i = 0;
        foreach($params  as $key => $value){

            if($i == 0){
                $str .= $key . '=' . $value;
            }else{
                $str .= '&'.$key . '=' . $value;
            }     
            $i++;
        }

              
        $url = "https://platform.fatsecret.com/rest/server.api".$str;

 
        $curl = curl_init($url);     
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Authorization: Bearer '.$token));
        curl_setopt($curl, CURLOPT_POST, 1); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $content = curl_exec($curl); 
        $err = curl_error($curl);        
        curl_close($curl);
        $arrRecipes = json_decode($content);
        /*
        foreach($arrRecipes as $key => $recipe){
            if($method == 'recipe.get3'){

                foreach($recipe->ingredients->ingredient as $key => $food){
                    $foodId = $food->food_id;
                    $objFood = $this->getRecipeArr($foodId, 'food.get.v2', $token);

                     if(is_array($objFood->food->servings->serving)){

                        foreach($objFood->food->servings->serving as $serving){

                            if($serving->serving_id == $food->serving_id){
                                $food->servings = $serving;
                                break;
                            }                   
                        }
                      
                     }else{
                        $food->servings = $objFood->food->servings->serving;
                     }                 
                }       
            }        
        }
        */

       return  $arrRecipes;
    }

    public function getFoodInfo($id)
    {

    }
    public function getParams($method, $recipeId)
    {

        $params = [
            'method' => $method,
            'format' => 'json'
        ];
        switch($method){
            case 'recipe.get':
                $params = array_merge($params, ['recipe_id' => $recipeId,]);
                break;
            case 'food.get.v2':
            case 'food.get':
                $params = array_merge($params, ['food_id' => $recipeId,]);
                break;
        }

        return $params;
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
