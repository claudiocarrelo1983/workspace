<?php

namespace common\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NutricionFood;

/**
 * NutricionFoodSearch represents the model behind the search form of `app\models\NutricionFood`.
 */
class NutricionFoodSearch extends NutricionFood
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'nutricion_code', 'description', 'nutricion_pt', 'nutricion_es', 'nutricion_en', 'nutricion_it', 'nutricion_fr', 'nutricion_de', 'group', 'calories', 'energy', 'fat', 'protein', 'carbs', 'lipids_saturated', 'lipids_unsaturated', 'lipids_monoglycerides', 'sugars', 'fibers', 'sodium', 'calcium', 'iron', 'colesterol', 'created_date'], 'safe'],
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
        $query = NutricionFood::find();

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
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nutricion_code', $this->nutricion_code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'nutricion_pt', $this->nutricion_pt])
            ->andFilterWhere(['like', 'nutricion_es', $this->nutricion_es])
            ->andFilterWhere(['like', 'nutricion_en', $this->nutricion_en])
            ->andFilterWhere(['like', 'nutricion_it', $this->nutricion_it])
            ->andFilterWhere(['like', 'nutricion_fr', $this->nutricion_fr])
            ->andFilterWhere(['like', 'nutricion_de', $this->nutricion_de])
            ->andFilterWhere(['like', 'group', $this->group])
            ->andFilterWhere(['like', 'calories', $this->calories])
            ->andFilterWhere(['like', 'energy', $this->energy])
            ->andFilterWhere(['like', 'fat', $this->fat])
            ->andFilterWhere(['like', 'protein', $this->protein])
            ->andFilterWhere(['like', 'carbs', $this->carbs])
            ->andFilterWhere(['like', 'lipids_saturated', $this->lipids_saturated])
            ->andFilterWhere(['like', 'lipids_unsaturated', $this->lipids_unsaturated])
            ->andFilterWhere(['like', 'lipids_monoglycerides', $this->lipids_monoglycerides])
            ->andFilterWhere(['like', 'sugars', $this->sugars])
            ->andFilterWhere(['like', 'fibers', $this->fibers])
            ->andFilterWhere(['like', 'sodium', $this->sodium])
            ->andFilterWhere(['like', 'calcium', $this->calcium])
            ->andFilterWhere(['like', 'iron', $this->iron])
            ->andFilterWhere(['like', 'colesterol', $this->colesterol]);

        return $dataProvider;
    }
}
