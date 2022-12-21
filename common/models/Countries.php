<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string|null $country_code
 * @property string|null $small_title
 * @property string|null $full_title
 * @property string|null $img
 * @property string $created_date
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date'], 'safe'],
            [['country_code', 'small_title', 'full_title', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'small_title' => 'Small Title',
            'full_title' => 'Full Title',
            'img' => 'Img',
            'created_date' => 'Created Date',
        ];
    }
}
