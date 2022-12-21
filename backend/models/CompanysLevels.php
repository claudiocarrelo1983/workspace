<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CompanysLevels]].
 *
 * @see CompanysLevels
 */
class CompanysLevels extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CompanysLevels[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CompanysLevels|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
