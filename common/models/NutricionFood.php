<?php

namespace common\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "nutricion_food".
 *
 * @property int $id
 * @property string $name
 * @property string $group
 * @property string $calories
 * @property string|null $energy
 * @property string|null $fat
 * @property string|null $protein
 * @property string|null $carbs
 * @property string|null $lipids_saturated
 * @property string|null $lipids_unsaturated
 * @property string|null $lipids_monoglycerides
 * @property string|null $sugars
 * @property string|null $fibers
 * @property string|null $sodium
 * @property string|null $calcium
 * @property string|null $iron
 * @property string|null $cholesterol
 * @property string|null $created_date
 */
class NutricionFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nutricion_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'group', 'calories'], 'required'],
            [['created_date'], 'safe'],
            [['name', 'group', 'calories', 'energy', 'fat', 'protein', 'carbs', 'lipids_saturated', 'lipids_unsaturated', 'lipids_monoglycerides', 'sugars', 'fibers', 'sodium', 'calcium', 'iron', 'cholesterol'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'group' => 'Group',
            'calories' => 'Calories',
            'energy' => 'Energy',
            'fat' => 'Fat',
            'protein' => 'Protein',
            'carbs' => 'Carbs',
            'lipids_saturated' => 'Lipids Saturated',
            'lipids_unsaturated' => 'Lipids Unsaturated',
            'lipids_monoglycerides' => 'Lipids Monoglycerides',
            'sugars' => 'Sugars',
            'fibers' => 'Fibers',
            'sodium' => 'Sodium',
            'calcium' => 'Calcium',
            'iron' => 'Iron',
            'cholesterol' => 'Cholesterol',
            'created_date' => 'Created Date',
        ];
    }
}
