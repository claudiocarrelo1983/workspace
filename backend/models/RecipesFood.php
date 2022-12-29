<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipes_food".
 *
 * @property int $id
 * @property string $recipe_code
 * @property string $recipe_food_name
 * @property string $measure
 * @property string $quantity
 * @property int $calories
 * @property int|null $lipids
 * @property int|null $colesterol
 * @property int|null $sodium
 * @property int|null $fibers
 * @property int|null $sugar
 * @property int $fat
 * @property int $carbs
 * @property int $protein
 * @property string $recipe_food_pt
 * @property string $recipe_food_es
 * @property string $recipe_food_en
 * @property string $recipe_food_it
 * @property string $recipe_food_fr
 * @property string $recipe_food_de
 * @property int|null $active
 * @property string $created_date
 */
class RecipesFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_code', 'recipe_food_name', 'measure', 'quantity', 'calories', 'fat', 'carbs', 'protein', 'recipe_food_pt', 'recipe_food_es', 'recipe_food_en', 'recipe_food_it', 'recipe_food_fr', 'recipe_food_de'], 'required'],
            [['calories', 'lipids', 'colesterol', 'sodium', 'fibers', 'sugar', 'fat', 'carbs', 'protein', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['recipe_code', 'recipe_food_name', 'measure', 'quantity', 'recipe_food_pt', 'recipe_food_es', 'recipe_food_en', 'recipe_food_it', 'recipe_food_fr', 'recipe_food_de'], 'string', 'max' => 255],
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
            'recipe_food_name' => 'Recipe Food Name',
            'measure' => 'Measure',
            'quantity' => 'Quantity',
            'calories' => 'Calories',
            'lipids' => 'Lipids',
            'colesterol' => 'Colesterol',
            'sodium' => 'Sodium',
            'fibers' => 'Fibers',
            'sugar' => 'Sugar',
            'fat' => 'Fat',
            'carbs' => 'Carbs',
            'protein' => 'Protein',
            'recipe_food_pt' => 'Recipe Food Pt',
            'recipe_food_es' => 'Recipe Food Es',
            'recipe_food_en' => 'Recipe Food En',
            'recipe_food_it' => 'Recipe Food It',
            'recipe_food_fr' => 'Recipe Food Fr',
            'recipe_food_de' => 'Recipe Food De',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
