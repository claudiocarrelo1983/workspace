<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "training_schedule".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $training_code
 * @property string $title
 * @property string|null $text
 * @property string|null $created_date
 */
class TrainingSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['created_date'], 'safe'],
            [['username', 'training_code'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 128],
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
            'training_code' => 'Training Code',
            'title' => 'Title',
            'text' => 'Text',
            'created_date' => 'Created Date',
        ];
    }
}
