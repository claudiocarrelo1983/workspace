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
class Publish extends \yii\base\Model
{


    public $type;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'string'],         
            [['type'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => Yii::t('app', "type")
        ];
    }
}
