<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "translations".
 *
 * @property int $id
 * @property string|null $country_code
 * @property string|null $page_code
 * @property string|null $text
 * @property string $created_date
 * @property int|null $active
 */
class Translations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_date'], 'safe'],
            [['active'], 'integer'],
            [['country_code', 'page', 'page_code', 'text'], 'required'],
            [['country_code', 'page', 'page_code'], 'string', 'max' => 255],
            [['page_code', 'country_code'], 'unique', 'targetAttribute' => ['page_code', 'country_code']]
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
            'page_code' => 'Page Code',
            'text' => 'Text',
            'created_date' => 'Created Date',
            'active' => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TranslationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TranslationsQuery(get_called_class());
    }
}
