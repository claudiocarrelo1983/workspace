<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipes_plan".
 *
 * @property int $id
 * @property int|null $recipes_id
 * @property string $name
 * @property string|null $subtitle
 * @property string|null $text
 * @property int|null $active
 * @property string|null $created_date
 */
class RecipesPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipes_id', 'active'], 'integer'],
            [['name'], 'required'],
            [['created_date'], 'safe'],
            [['name', 'subtitle', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipes_id' => 'Recipes ID',
            'name' => 'Name',
            'subtitle' => 'Subtitle',
            'text' => 'Text',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
