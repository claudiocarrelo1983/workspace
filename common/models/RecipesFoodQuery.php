<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[RecipesFood]].
 *
 * @see RecipesFood
 */
class RecipesFoodQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RecipesFood[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RecipesFood|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
