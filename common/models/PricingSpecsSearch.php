<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PricingSpecs;

/**
 * PricingSpecsSearch represents the model behind the search form of `app\models\PricingSpecs`.
 */
class PricingSpecsSearch extends PricingSpecs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['type', 'page_code', 'description', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de'], 'safe'],
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
        $query = PricingSpecs::find();

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
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'page_code', $this->page_code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'text_es', $this->text_es])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'text_it', $this->text_it])
            ->andFilterWhere(['like', 'text_fr', $this->text_fr])
            ->andFilterWhere(['like', 'text_de', $this->text_de]);

        return $dataProvider;
    }
}
