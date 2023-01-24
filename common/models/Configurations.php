<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configurations".
 *
 * @property int $id
 * @property string $field
 * @property string $type
 * @property string $value
 * @property int|null $active
 */
class Configurations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configurations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field'], 'required'],
            [['field'], 'unique'],
            [['active'], 'integer'],
            [['field'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field' => 'Field',         
            'active' => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ConfigurationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConfigurationsQuery(get_called_class());
    }
}
