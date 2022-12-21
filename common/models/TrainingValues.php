<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "training_values".
 *
 * @property int $id
 * @property string $username
 * @property int|null $id_treino
 * @property int|null $week
 * @property int|null $reps
 * @property string|null $type
 * @property int|null $value
 * @property string|null $created_date
 */
class TrainingValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['id_treino', 'week', 'reps', 'value'], 'integer'],
            [['created_date'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 40],
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
            'id_treino' => 'Id Treino',
            'week' => 'Week',
            'reps' => 'Reps',
            'type' => 'Type',
            'value' => 'Value',
            'created_date' => 'Created Date',
        ];
    }
}
