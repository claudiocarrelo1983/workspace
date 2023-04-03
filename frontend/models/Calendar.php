<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property int $id
 * @property string $username
 * @property string $start
 * @property string $end
 * @property int|null $allDay
 * @property string $className
 * @property string $created_date
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'start', 'end', 'className'], 'required'],
            [['start', 'end', 'created_date'], 'safe'],
            [['allDay'], 'integer'],
            [['username', 'className'], 'string', 'max' => 255],
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
            'start' => 'Start',
            'end' => 'End',
            'allDay' => 'All Day',
            'className' => 'Class Name',
            'created_date' => 'Created Date',
        ];
    }
}
