<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nutricion_food".
 *
 * @property int $id
 * @property string $name
 * @property string $nutricion_code
 * @property string $description
 * @property string $nutricion_pt
 * @property string $nutricion_es
 * @property string $nutricion_en
 * @property string $nutricion_it
 * @property string $nutricion_fr
 * @property string $nutricion_de
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
 * @property string|null $colesterol
 * @property string $created_date
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
            [['name', 'nutricion_code', 'description', 'nutricion_pt', 'nutricion_es', 'nutricion_en', 'nutricion_it', 'nutricion_fr', 'nutricion_de', 'group', 'calories'], 'required'],
            [['created_date'], 'safe'],
            [['name', 'nutricion_code', 'description', 'nutricion_pt', 'nutricion_es', 'nutricion_en', 'nutricion_it', 'nutricion_fr', 'nutricion_de', 'group', 'calories', 'energy', 'fat', 'protein', 'carbs', 'lipids_saturated', 'lipids_unsaturated', 'lipids_monoglycerides', 'sugars', 'fibers', 'sodium', 'calcium', 'iron', 'colesterol'], 'string', 'max' => 255],
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
            'nutricion_code' => 'Nutricion Code',
            'description' => 'Description',
            'nutricion_pt' => 'Nutricion Pt',
            'nutricion_es' => 'Nutricion Es',
            'nutricion_en' => 'Nutricion En',
            'nutricion_it' => 'Nutricion It',
            'nutricion_fr' => 'Nutricion Fr',
            'nutricion_de' => 'Nutricion De',
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
            'colesterol' => 'Colesterol',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NutricionFoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NutricionFoodQuery(get_called_class());
    }
}
