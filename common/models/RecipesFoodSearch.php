<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecipesFood;

/**
 * RecipesFoodSearch represents the model behind the search form of `app\models\RecipesFood`.
 */
class RecipesFoodSearch extends RecipesFood
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['recipe_code', 'name', 'measure', 'calories', 'lipids', 'colesterol', 'sodium', 'carbs', 'fibers', 'sugar', 'protein', 'nutricion_pt', 'nutricion_es', 'nutricion_en', 'nutricion_it', 'nutricion_fr', 'nutricion_de', 'created_date'], 'safe'],
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
        $query = RecipesFood::find();

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
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'recipe_code', $this->recipe_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'measure', $this->measure])
            ->andFilterWhere(['like', 'calories', $this->calories])
            ->andFilterWhere(['like', 'lipids', $this->lipids])
            ->andFilterWhere(['like', 'colesterol', $this->colesterol])
            ->andFilterWhere(['like', 'sodium', $this->sodium])
            ->andFilterWhere(['like', 'carbs', $this->carbs])
            ->andFilterWhere(['like', 'fibers', $this->fibers])
            ->andFilterWhere(['like', 'sugar', $this->sugar])
            ->andFilterWhere(['like', 'protein', $this->protein])
            ->andFilterWhere(['like', 'nutricion_pt', $this->nutricion_pt])
            ->andFilterWhere(['like', 'nutricion_es', $this->nutricion_es])
            ->andFilterWhere(['like', 'nutricion_en', $this->nutricion_en])
            ->andFilterWhere(['like', 'nutricion_it', $this->nutricion_it])
            ->andFilterWhere(['like', 'nutricion_fr', $this->nutricion_fr])
            ->andFilterWhere(['like', 'nutricion_de', $this->nutricion_de]);

        return $dataProvider;
    }
}
