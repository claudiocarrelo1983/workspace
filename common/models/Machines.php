<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "machines".
 *
 * @property int $id
 * @property string $code
 * @property string $designacao
 * @property string $peso
 * @property string $url
 */
class Machines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'machines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'designacao', 'peso', 'url'], 'required'],
            [['code'], 'string', 'max' => 255],
            [['designacao', 'url'], 'string', 'max' => 128],
            [['peso'], 'string', 'max' => 2],
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
            'code' => 'Code',
            'designacao' => 'Designacao',
            'peso' => 'Peso',
            'url' => 'Url',
        ];
    }
}
