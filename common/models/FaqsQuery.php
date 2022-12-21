<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Faqs]].
 *
 * @see Faqs
 */
class FaqsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Faqs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Faqs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
