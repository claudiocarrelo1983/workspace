<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string|null $coin_name
 * @property string|null $coin_simbol
 * @property string|null $key
 * @property int|null $standard
 * @property int|null $professional
 * @property int|null $enterprise
 * @property string|null $country_code
 * @property string|null $small_title
 * @property string|null $full_title
 * @property string|null $img
 * @property int|null $active
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
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['small_title', 'country_code', 'full_title', 'active', 'img'],'required'],
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
            'coin_name' => 'Coin Name',
            'coin_simbol' => 'Coin Simbol',
            'key' => 'Key',
            'standard' => 'Standard',
            'professional' => 'Professional',
            'enterprise' => 'Enterprise',
            'country_code' => 'Country Code',
            'small_title' => 'Small Title',
            'full_title' => 'Full Title',
            'img' => 'Img',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountriesQuery(get_called_class());
    }
}
