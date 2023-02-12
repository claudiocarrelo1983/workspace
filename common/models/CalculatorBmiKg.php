<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faqs".
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property int|null $order
 * @property string|null $created_date
 */
class CalculatorBmiKg extends \yii\base\Model
{

    public $height;

    public $age;

    public $sex;

    public $weight;

    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex'], 'string'],
            [['age'], 'integer'],
            [['height','weight'], 'number'],
            [['height','age','sex','weight'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'height' => Yii::t('app', "heighta"),
            'age' => Yii::t('app', "age"),
            'sex' => Yii::t('app', "sex"),
            'weight' => Yii::t('app', "weight"),
        ];
    }

    public static function conditionBmi($imc){
        
        $result = [
            'color' => '#5c9baa',
            'answer' => '',
        ];

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

        return $result;

    }
    
}
