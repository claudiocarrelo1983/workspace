<?php

namespace backend\controllers;

use common\models\Recipes;
use common\models\RecipesFood;
use common\models\RecipesSteps;
use common\models\RecipesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\base\Model;
use common\models\RequestDynamicFormWidget;
use Yii;

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
        $searchModel = new RecipesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
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

       if(isset(Yii::$app->request->post()['Recipes'])){           
            $modelRecipe->saveRecipes('recipes', Yii::$app->request->post()['Recipes']);            
       }
       if(isset(Yii::$app->request->post()['RecipesSteps'])){       
            $RecipesSteps->saveRecipesSteps('recipes',Yii::$app->request->post()['RecipesSteps']);
        }

        if(isset(Yii::$app->request->post()['RecipesFood'])){  
            $RecipesFood->saveRecipesFood('recipes',Yii::$app->request->post()['RecipesFood']);
            die('___');    
           
        }
  

        if ($modelRecipe->load(Yii::$app->request->post()) && $modelRecipe->save()) {
   
            if ($RecipesSteps->load(Yii::$app->request->post())) {      
            
                $RecipesSteps->recipe_code ='recipe_step_text_'.bcadd($count->id, 1);
                print "<pre>";    
                print_r($RecipesSteps->recipe_step_text);
                die('___');   
                if($RecipesSteps->save()){
                    die();
                    $RecipesSteps->saveRecipesSteps('recipes',$RecipesSteps);
                }

            
            }
            $modelRecipe->image = 'empty';

            print "<pre>";    
  
            die('___');

            if($modelRecipe->save()){
                $modelRecipe->saveRecipes('recipes',$modelRecipe);
            }
           

            if($RecipesSteps->save()){
                die('___');
                $modelRecipe->saveRecipes('recipes',$modelRecipe);
            }
           
        

            //$RecipesSteps->saveRecipesSteps('recipes_steps',$RecipesSteps);
       
            $modelRecipe->saveRecipesStep('recipes',$modelRecipe);
            $modelRecipe->recipe_code = $code;
            $modelsRecipeFood = Model::createMultiple(RecipesFood::classname());
            Model::loadMultiple($modelsRecipeFood, Yii::$app->request->post());

            // validate all models
            $valid = $modelRecipe->validate();
            $valid = Model::validateMultiple($modelsRecipeFood) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $modelRecipe->save(false)) {
                        foreach ($modelsRecipeFood as $model) {
                            $model->recipe_code = $modelRecipe->recipe_code;
                            if (! ($flag = $model->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelRecipe->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->renderAjax('create', [           
            'model' => $modelRecipe,
            'recipeCodeTitle' => $recipeCodeTitle,
            'recipeCodeText' => $recipeCodeText,
            'recipeCodeIngredients' => $recipeCodeIngredients,
            'recipeCodeSteps' => $recipeCodeSteps,          
            'modelsRecipeSteps' => $modelsRecipeSteps,
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
        $model = $this->findModel($id);

        $count = $model ::find('id')->orderBy("id desc")->where(['id' => $id])->limit(1)->one();
        $countValue = str_replace("recipe_title_", "", $count->recipe_code_title);

        $title = 'recipe_title_'.$countValue;
        $text = 'recipe_text_'.$countValue;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model->updateRecipes($model);  
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'title' => $title,
            'text' => $text
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
}
