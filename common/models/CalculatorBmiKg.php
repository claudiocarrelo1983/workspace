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
}
