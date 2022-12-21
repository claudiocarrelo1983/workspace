<?php

namespace frontend\controllers;
use common\models\CalculatorBmiLbs;
use common\models\CalculatorBmiKg;
use common\models\CalculatorCaloriesLbs;
use common\models\CalculatorCaloriesKg;


use common\models\GeneratorJson;
use yii\web\Response;

use Yii;


class CalculatorController extends \yii\web\Controller
{

    public function actionBmi()
    {

        $titleTable = '';
        $color = '';
        $answer = '';
        $imc = 0;
        $displayTable = 0;
        $displayText = 0;
        $titleTable = '';
        $subtitleTable = '';
        $bmiArr = array();
        $bmiArrHeight = array();
        $activeTabKg = 1;
        $activeTabLbs = 0;
        $type = 'kg';

        $request = Yii::$app->getRequest();

        $model1 = new CalculatorBmiKg();
        $model2 = new CalculatorBmiLbs();


        if ($request->isPost && $model1->load($request->post())) {

            $activeTabKg = 1;
            $activeTabLbs = 0;
            $displayTable = 0;
            $displayText = 1;
            $type = 'kg';

            $postValues = $request->bodyParams['CalculatorBmiKg'];

            $height = $postValues['height'];
            $weight = $postValues['weight'];

            //IMC = Peso ÷ (Altura × Altura)
            $imc = bcmul($height, $height, 5);
            $imc = bcdiv($weight, $imc, 5);

            $color = '#5c9baa';

            if ($imc <= '0.001850') {
                $color = '#5c9baa';
                $answer = Yii::t('app', "calculator_bmi_answer_underweight");
            }


            if ($imc >= '0.001850' && $imc <= '0.002490') {
                $color = '#91c058';
                $answer = Yii::t('app', "calculator_bmi_answer_normal");
            }

            if ($imc >= '0.002500' && $imc <= '0.002990') {
                $color = '#e4b345';
                $answer = Yii::t('app', "calculator_bmi_answer_overweight");
            }

            if ($imc >= '0.003000' && $imc <= '0.003490') {
                $color = '#d18b4b';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_1");
            }

            if ($imc >= '0.003500' && $imc <= '0.003990') {
                $color = '#c44b42';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_2");
            }

            if ($imc >= '0.004000') {
                $color = '#b33e36';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_3");
            }


            //displays tables if if less then 5
            if ($postValues['age'] < 5) {
                $modelGenerator = new GeneratorJson();
                $arrTable = $modelGenerator->getLastFileUploaded('bmi');
                $bmiArr = (isset($arrTable[$postValues['sex']])) ? $arrTable[$postValues['sex']] : array();
                $bmiArrHeight = (isset($arrTable[$postValues['sex'] . '_height'])) ? $arrTable[$postValues['sex'] . '_height'] : array();
                $displayTable = 1;
                $displayText = 0;
                $titleTable = Yii::t('app', "calculator_bmi_title_table_" . $postValues['sex']);
                $subtitleTable = Yii::t('app', "calculator_bmi_subtitle_table_" . $postValues['sex']);
                $answer = Yii::t('app', "calculator_bmi_answer_" . $postValues['sex'] . "_0");
            }

            $imc = bcmul(10000, $imc, 2);

        }



        if ($request->isPost && $model2->load($request->post())) {

            $activeTabKg = 0;
            $activeTabLbs = 1;
            $displayTable = 0;
            $displayText = 1;
            $type = 'lbs';

            $postValues = $request->bodyParams['CalculatorBmiLbs'];

            $height = bcmul($postValues['height'], 30.48, 2);
            $weight = bcdiv($postValues['weight'], 2.205, 2);


            //IMC = Peso ÷ (Altura × Altura)
            $imc = bcmul($height, $height, 5);
            $imc = bcdiv($weight, $imc, 5);

            $color = '#5c9baa';

            if ($imc <= '0.001850') {
                $color = '#5c9baa';
                $answer = Yii::t('app', "calculator_bmi_answer_underweight");
            }


            if ($imc >= '0.001850' && $imc <= '0.002490') {
                $color = '#91c058';
                $answer = Yii::t('app', "calculator_bmi_answer_normal");
            }

            if ($imc >= '0.002500' && $imc <= '0.002990') {
                $color = '#e4b345';
                $answer = Yii::t('app', "calculator_bmi_answer_overweight");
            }

            if ($imc >= '0.003000' && $imc <= '0.003490') {
                $color = '#d18b4b';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_1");
            }

            if ($imc >= '0.003500' && $imc <= '0.003990') {
                $color = '#c44b42';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_2");
            }

            if ($imc >= '0.004000') {
                $color = '#b33e36';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_3");
            }



            //displays tables if if less then 5
            if ($postValues['age'] < 5) {
                $modelGenerator = new GeneratorJson();
                $arrTable = $modelGenerator->getLastFileUploaded('bmi');
                $bmiArr = (isset($arrTable[$postValues['sex']])) ? $arrTable[$postValues['sex']] : array();
                $bmiArrHeight = (isset($arrTable[$postValues['sex'] . '_height'])) ? $arrTable[$postValues['sex'] . '_height'] : array();
                $displayTable = 1;
                $displayText = 0;
                $titleTable = Yii::t('app', "calculator_bmi_title_table_" . $postValues['sex']);
                $subtitleTable = Yii::t('app', "calculator_bmi_subtitle_table_" . $postValues['sex']);
                $answer = Yii::t('app', "calculator_bmi_answer_" . $postValues['sex'] . "_0");
            }

            $imc = bcmul(10000, $imc, 2);

        }
   
        return $this->renderAjax('@frontend/views/site/calculator/bmi', [
            'model1' => $model1,
            'model2' => $model2,
            'color' => $color,
            'type' => $type,
            'activeTabKg' => $activeTabKg,
            'activeTabLbs' => $activeTabLbs,
            'imc' => $imc,
            'answer' => $answer,
            'bmiArr' => $bmiArr,
            'titleTable' => $titleTable,
            'subtitleTable' => $subtitleTable,
            'displayTable' => $displayTable,
            'displayText' => $displayText,
            'bmiArrHeight' => $bmiArrHeight
        ]);

    }

    public function actionCalculators()
    {

        $this->layout = 'public';

        return $this->render('@frontend/views/site/calculator/index');
    }

    public function actionCalories()
    {


        $displayText = 0;
        $activeTabKg = 1;
        $activeTabLbs = 0;
        $calories = 0;
        $basal = 0;
        $caloriesChoice = 0;
        $slightlyActive = 0;
        $sedentary = 0;
        $active = 0;
        $veryActive = 0;
        $extraActive = 0;

        $request = Yii::$app->getRequest();

        $model1 = new CalculatorCaloriesKg();
        $model2 = new CalculatorCaloriesLbs();


        if ($request->isPost && $model1->load($request->post())) {

            $activeTabKg = 1;
            $activeTabLbs = 0;
            $displayTable = 0;
            $displayText = 1;
            $type = 'kg';

            $postValues = $request->bodyParams['CalculatorBmiKg'];

            $height = $postValues['height'];
            $weight = $postValues['weight'];

            //IMC = Peso ÷ (Altura × Altura)
            $imc = bcmul($height, $height, 5);
            $imc = bcdiv($weight, $imc, 5);

            $color = '#5c9baa';

            if ($imc <= '0.001850') {
                $color = '#5c9baa';
                $answer = Yii::t('app', "calculator_bmi_answer_underweight");
            }


            if ($imc >= '0.001850' && $imc <= '0.002490') {
                $color = '#91c058';
                $answer = Yii::t('app', "calculator_bmi_answer_normal");
            }

            if ($imc >= '0.002500' && $imc <= '0.002990') {
                $color = '#e4b345';
                $answer = Yii::t('app', "calculator_bmi_answer_overweight");
            }

            if ($imc >= '0.003000' && $imc <= '0.003490') {
                $color = '#d18b4b';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_1");
            }

            if ($imc >= '0.003500' && $imc <= '0.003990') {
                $color = '#c44b42';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_2");
            }

            if ($imc >= '0.004000') {
                $color = '#b33e36';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_3");
            }


            //displays tables if if less then 5
            if ($postValues['age'] < 5) {
                $modelGenerator = new GeneratorJson();
                $arrTable = $modelGenerator->getLastFileUploaded('other');
                $bmiArr = (isset($arrTable[$postValues['sex']])) ? $arrTable[$postValues['sex']] : array();
                $bmiArrHeight = (isset($arrTable[$postValues['sex'] . '_height'])) ? $arrTable[$postValues['sex'] . '_height'] : array();
                $displayTable = 1;
                $displayText = 0;
                $titleTable = Yii::t('app', "calculator_bmi_title_table_" . $postValues['sex']);
                $subtitleTable = Yii::t('app', "calculator_bmi_subtitle_table_" . $postValues['sex']);
                $answer = Yii::t('app', "calculator_bmi_answer_" . $postValues['sex'] . "_0");
            }

            $imc = bcmul(10000, $imc, 2);

        }



        if ($request->isPost && $model2->load($request->post())) {

            $activeTabKg = 0;
            $activeTabLbs = 1;
            $displayTable = 0;
            $displayText = 1;
            $type = 'lbs';

            $postValues = $request->bodyParams['CalculatorBmiLbs'];

            $height = bcmul($postValues['height'], 30.48, 2);
            $weight = bcdiv($postValues['weight'], 2.205, 2);


            //IMC = Peso ÷ (Altura × Altura)
            $imc = bcmul($height, $height, 5);
            $imc = bcdiv($weight, $imc, 5);

            $color = '#5c9baa';

            if ($imc <= '0.001850') {
                $color = '#5c9baa';
                $answer = Yii::t('app', "calculator_bmi_answer_underweight");
            }


            if ($imc >= '0.001850' && $imc <= '0.002490') {
                $color = '#91c058';
                $answer = Yii::t('app', "calculator_bmi_answer_normal");
            }

            if ($imc >= '0.002500' && $imc <= '0.002990') {
                $color = '#e4b345';
                $answer = Yii::t('app', "calculator_bmi_answer_overweight");
            }

            if ($imc >= '0.003000' && $imc <= '0.003490') {
                $color = '#d18b4b';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_1");
            }

            if ($imc >= '0.003500' && $imc <= '0.003990') {
                $color = '#c44b42';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_2");
            }

            if ($imc >= '0.004000') {
                $color = '#b33e36';
                $answer = Yii::t('app', "calculator_bmi_answer_obesity_3");
            }

            //displays tables if if less then 5
            if ($postValues['age'] < 5) {
                $modelGenerator = new GeneratorJson();
                $arrTable = $modelGenerator->getLastFileUploaded('other');
                $bmiArr = (isset($arrTable[$postValues['sex']])) ? $arrTable[$postValues['sex']] : array();
                $bmiArrHeight = (isset($arrTable[$postValues['sex'] . '_height'])) ? $arrTable[$postValues['sex'] . '_height'] : array();
                $displayTable = 1;
                $displayText = 0;
                $titleTable = Yii::t('app', "calculator_bmi_title_table_" . $postValues['sex']);
                $subtitleTable = Yii::t('app', "calculator_bmi_subtitle_table_" . $postValues['sex']);
                $answer = Yii::t('app', "calculator_bmi_answer_" . $postValues['sex'] . "_0");
            }

            $imc = bcmul(10000, $imc, 2);

        }


        return $this->renderAjax('@frontend/views/site/calculator/calories', [
            'model1' => $model1,
            'model2' => $model2,
            'displayText' => $displayText,
            'activeTabKg' => $activeTabKg,
            'activeTabLbs' => $activeTabLbs,
            'calories' => $calories,
            'basal' => $basal,
            'caloriesChoice' => $caloriesChoice,
            'sedentary' => $sedentary,
            'slightly_active' => $slightlyActive,
            'active' => $active,
            'very_active' => $veryActive,
            'extra_active' => $extraActive     
        ]);
    }
}
