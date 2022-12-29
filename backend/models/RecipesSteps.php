<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipes_steps".
 *
 * @property int $id
 * @property string $recipe_code
 * @property string $recipe_step_text
 * @property string $recipe_step_text_pt
 * @property string $recipe_step_text_es
 * @property string $recipe_step_text_en
 * @property string $recipe_step_text_it
 * @property string $recipe_step_text_fr
 * @property string $recipe_step_text_de
 * @property int|null $order
 * @property string $created_date
 */
class RecipesSteps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_steps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_code', 'recipe_step_text', 'recipe_step_text_pt', 'recipe_step_text_es', 'recipe_step_text_en', 'recipe_step_text_it', 'recipe_step_text_fr', 'recipe_step_text_de'], 'required'],
            [['recipe_step_text', 'recipe_step_text_pt', 'recipe_step_text_es', 'recipe_step_text_en', 'recipe_step_text_it', 'recipe_step_text_fr', 'recipe_step_text_de'], 'string'],
            [['order'], 'integer'],
            [['created_date'], 'safe'],
            [['recipe_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipe_code' => 'Recipe Code',
            'recipe_step_text' => 'Recipe Step Text',
            'recipe_step_text_pt' => 'Recipe Step Text Pt',
            'recipe_step_text_es' => 'Recipe Step Text Es',
            'recipe_step_text_en' => 'Recipe Step Text En',
            'recipe_step_text_it' => 'Recipe Step Text It',
            'recipe_step_text_fr' => 'Recipe Step Text Fr',
            'recipe_step_text_de' => 'Recipe Step Text De',
            'order' => 'Order',
            'created_date' => 'Created Date',
        ];
    }
}
