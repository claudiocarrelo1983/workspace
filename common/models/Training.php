<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property int $id
 * @property string $username
 * @property int|null $week
 * @property string $code
 * @property string $title
 * @property string $maquina
 * @property string $image
 * @property string $type
 * @property string $order
 * @property string|null $created_date
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'code', 'title', 'maquina', 'image', 'type', 'order'], 'required'],
            [['week'], 'integer'],
            [['created_date'], 'safe'],
            [['username', 'title', 'maquina', 'image', 'type', 'order'], 'string', 'max' => 128],
            [['code'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'week' => 'Week',
            'code' => 'Code',
            'title' => 'Title',
            'maquina' => 'Maquina',
            'image' => 'Image',
            'type' => 'Type',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }
}
