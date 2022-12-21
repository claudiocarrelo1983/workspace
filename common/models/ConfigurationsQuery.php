<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Configurations]].
 *
 * @see Configurations
 */
class ConfigurationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Configurations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Configurations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
