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
            'calories' => $this->calories,
            'lipids' => $this->lipids,
            'colesterol' => $this->colesterol,
            'sodium' => $this->sodium,
            'fibers' => $this->fibers,
            'sugar' => $this->sugar,
            'fat' => $this->fat,
            'carbs' => $this->carbs,
            'protein' => $this->protein,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['=', 'recipe_code', $this->recipe_code])
            ->andFilterWhere(['like', 'recipe_food_name', $this->recipe_food_name])
            ->andFilterWhere(['like', 'measure', $this->measure])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'recipe_food_pt', $this->recipe_food_pt])
            ->andFilterWhere(['like', 'recipe_food_es', $this->recipe_food_es])
            ->andFilterWhere(['like', 'recipe_food_en', $this->recipe_food_en])
            ->andFilterWhere(['like', 'recipe_food_it', $this->recipe_food_it])
            ->andFilterWhere(['like', 'recipe_food_fr', $this->recipe_food_fr])
            ->andFilterWhere(['like', 'recipe_food_de', $this->recipe_food_de]);

        return $dataProvider;
    }
}
