<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pricing".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $coin
 * @property string|null $key
 * @property int|null $standard
 * @property int|null $professional
 * @property int|null $enterprise
 * @property string $created_date
 */
class Pricing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key','coin'], 'unique'],
            [['key','coin'], 'required'],
            [['standard', 'professional', 'enterprise'], 'integer'],
            [['created_date'], 'safe'],
            [['title', 'coin', 'key'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'coin' => 'Coin',
            'key' => 'Key',
            'standard' => 'Standard',
            'professional' => 'Professional',
            'enterprise' => 'Enterprise',
            'created_date' => 'Created Date',
        ];
    }
}
