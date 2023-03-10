<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pricing;

/**
 * PricingSearch represents the model behind the search form of `app\models\Pricing`.
 */
class PricingSearch extends Pricing
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'standard', 'professional', 'enterprise'], 'integer'],
            [['title', 'coin', 'key', 'created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pricing::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'standard' => $this->standard,
            'professional' => $this->professional,
            'enterprise' => $this->enterprise,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'coin', $this->coin])
            ->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}
