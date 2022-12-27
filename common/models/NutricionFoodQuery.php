<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NutricionFood]].
 *
 * @see NutricionFood
 */
class NutricionFoodQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NutricionFood[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NutricionFood|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
