<?php

namespace backend\controllers;

use app\Models\RecipesStep;
use common\models\Recipes;
use common\models\RecipesFood;
use common\models\RecipesSteps;
use common\models\RecipesSearch;
use common\models\RecipesStepsSearch;
use common\models\RecipesFoodSearch;
use common\models\RecipesLoad;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Query;
use Yii;
use Adcuz\FatSecret\OAuthBase;
use Adcuz\FatSecret\FatSecretException;
use Adcuz\FatSecret\Client;

/**
 * RecipesController implements the CRUD actions for Recipes model.
 */
class RecipesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Recipes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new RecipesSearch();
        $modelRecipeId = new RecipesLoad();
        $modelRecipe = new Recipes;       

        $dataProvider = $searchModel->search($this->request->queryParams); 

        if ($this->request->isPost) {
           
            if ($modelRecipeId->load($this->request->post()) && $modelRecipeId->validate()) {

                $modelRecipeId->fatsecret_id = $modelRecipeId->recipe_id;
                
                $modelRecipeId->saveRecipes($modelRecipe, $modelRecipeId);
    
                $value = $modelRecipe::find('recipe_code')->orderBy("id desc")->limit(1)->one();
                    
                //return $this->redirect(['update', 'id' => $value->id]);   
             
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelRecipeId' => $modelRecipeId
        ]);
    }
   

    /**
     * Displays a single Recipes model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {        
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $connection = new Query;
        $result = $connection->select([
            'recipe_code' 
            ])
        ->from('recipes')   
        ->where(['id' => $id]) 
        ->one();

        $recipeCode = (isset($result['recipe_code']) ? $result['recipe_code'] : '');

        $searchModelSteps = new RecipesStepsSearch();
        $searchFoodModel = new RecipesFoodSearch();


        $searchModelSteps->recipe_code = $recipeCode;
        $dataProviderStep = $searchModelSteps->search($this->request->queryParams);
     
        $searchFoodModel->recipe_code = $recipeCode;
        $dataProviderFood =  $searchFoodModel->search($this->request->queryParams);
    
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
            'RecipesStepsModel' => $this->findModelSteps($recipeCode),
            'RecipesFoodModel' => $this->findModelFood($recipeCode),
            'dataProviderStep' => $dataProviderStep,
            'dataProviderFood' => $dataProviderFood
        ]);
    }


    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $modelRecipe = new Recipes;
        $RecipesSteps = new RecipesSteps;
        $RecipesFood = new RecipesFood;
        $modelsRecipeSteps = [new RecipesSteps];     
        $modelsRecipeFood = [new RecipesFood];    

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

        $modelRecipe->recipe_cat_code = '';
       
       if(!empty($_POST['Recipes']['tagsArr'])){
          
           $modelRecipe->recipe_cat_code = implode(',',$_POST['Recipes']['tagsArr']);
       }  
     
       if ($modelRecipe->load(Yii::$app->request->post())){          
          
            $modelRecipe->recipe_code_title = $recipeCodeTitle;
            $modelRecipe->recipe_code_text = $recipeCodeText;

            $modelRecipe->imageFile = 'empty';

            if(isset($modelRecipe->imageFile->name)){
                $modelRecipe->imageFile = UploadedFile::getInstance($modelRecipe, 'imageFile');
                $fileName = $modelRecipe->imageFile->baseName;
                $modelRecipe->image = '/images/recipes/' .$fileName.'.'.$modelRecipe->imageFile->extension;                 
                $modelRecipe->imageFile->saveAs('@frontend/web/images/recipes/'. $fileName . '.' . $modelRecipe->imageFile->extension, false);      
            }

       
            if($modelRecipe->validate()){      
                if(isset(Yii::$app->request->post()['Recipes'])){  
                    $recipesCode = $modelRecipe->saveRecipes('recipe_list', $modelRecipe);
                    if (isset(Yii::$app->request->post()['RecipesSteps'])) {
                        $RecipesSteps->saveRecipesSteps('recipes_text', Yii::$app->request->post()['RecipesSteps'], $recipesCode);                        
                    }
                    if (isset(Yii::$app->request->post()['RecipesFood'])) {
                        $RecipesFood->saveRecipesFood('recipes_text', Yii::$app->request->post()['RecipesFood'], $recipesCode);
                    }
                }     

                $model = new Recipes;

                $value = $model::find('recipe_code')->orderBy("id desc")->limit(1)->one();
                    
                return $this->redirect(['view', 'id' => $value->id]);                   
            }               
        }


        return $this->renderAjax('create', [           
            'model' => $modelRecipe,   
            'validationMessage' => '',
            'recipeCodeIngredients' => $recipeCodeIngredients,
            'recipeCodeSteps' => $recipeCodeSteps,          
            'modelsRecipeSteps' => (empty($modelsRecipeSteps)) ? [new RecipesSteps] : $modelsRecipeSteps,
            'modelIngredients' => (empty($modelsRecipeFood)) ? [new RecipesFood] : $modelsRecipeFood
        ]);
    }


    /**
     * Updates an existing Recipes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $modelRecipe = $this->findModel($id);
        $RecipesSteps = new RecipesSteps;
        $RecipesFood = new RecipesFood;        
        $connection = new Query;  

        $result = $connection->select([
            'recipe_code' 
            ])
        ->from('recipes')    
        ->where(['id' => $id]) 
        ->one();
        
        $recipeCode = (isset($result['recipe_code']) ? $result['recipe_code'] : '');

        $modelRecipeSteps = $this->findModelSteps($recipeCode);
        $modelsRecipeFood = $this->findModelFood($recipeCode);

    
        $recipeCodeTitle = 'recipe_title_1';
        $recipeCodeText = 'recipe_text_1';
        $recipeCodeSteps = 'recipe_steps_1';
        $recipeCodeIngredients = 'recipe_ingredients_1';    

        $count = $modelRecipe::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
            $recipeCodeTitle = 'recipe_title_'.$count->id;
            $recipeCodeText = 'recipe_text_'.$count->id;
            $recipeCodeSteps = 'recipe_steps_'.$count->id;
            $recipeCodeIngredients = 'recipe_ingredients_'.$count->id;
       }


        if ($this->request->isPost && $modelRecipe->load($this->request->post())) {
                    
            $modelRecipe->recipe_cat_code = '';
            
            if(!empty($_POST['Recipes']['tagsArr'])){
                
                $modelRecipe->recipe_cat_code = implode(',',$_POST['Recipes']['tagsArr']);
            }  
            

            $modelRecipe->recipe_code_title = $recipeCodeTitle;
            $modelRecipe->recipe_code_text = $recipeCodeText;

            $modelRecipe->imageFile = UploadedFile::getInstance($modelRecipe, 'imageFile');

            if(isset($modelRecipe->imageFile->name)){
                $fileName = $modelRecipe->imageFile->baseName;
                $modelRecipe->image = '/images/recipes/' .$fileName.'.'.$modelRecipe->imageFile->extension;                 
                $modelRecipe->imageFile->saveAs('@frontend/web/images/recipes/'. $fileName . '.' . $modelRecipe->imageFile->extension, false);      
            }
       
          
            if($recipeCode = $modelRecipe->updateRecipes('recipes_text',$modelRecipe)){
                if (isset(Yii::$app->request->post()['RecipesSteps'])) {                
                    $RecipesSteps->updateRecipesSteps('recipes_text', Yii::$app->request->post()['RecipesSteps'], $modelRecipe);
                }
                if(isset(Yii::$app->request->post()['RecipesFood'])){
                    $RecipesFood->updateRecipesFood('recipes_text', Yii::$app->request->post()['RecipesFood'], $modelRecipe);   
                }
                          
                return $this->redirect(['view', 'id' => $modelRecipe->id]);
            }
        }

        $modelRecipe->tagsArr = explode(',', $modelRecipe->recipe_cat_code); 

        return $this->renderAjax('update', [
            'model' => $modelRecipe,
            'recipeCodeIngredients' => $recipeCodeIngredients,
            'recipeCodeSteps' => $recipeCodeSteps,          
            'modelsRecipeSteps' => (isset($modelRecipeSteps[0])) ? $modelRecipeSteps: [$modelRecipeSteps],
            'modelIngredients' => (isset($modelsRecipeFood[0])) ? $modelsRecipeFood : [$modelsRecipeFood]
        ]);
    }

    /**
     * Deletes an existing Recipes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recipes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelSteps($code)
    {          
        $model = RecipesSteps::findAll(['recipe_code' => $code]);

        if(empty($model)){
            $model = new RecipesSteps;
        }

        return $model;
    }

    protected function findModelFood($code)
    {

        $model = RecipesFood::findAll(['recipe_code' => $code]);

        if(empty($model)){
            $model = new RecipesFood;
        }

        return $model;
    }
}
