<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecipesCategory;

/**
 * RecipesCategorySearch represents the model behind the search form of `app\models\RecipesCategory`.
 */
class RecipesCategorySearch extends RecipesCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['recipes_parent_id', 'page_code', 'recipe_cat_code', 'description', 'recipe_pt','recipe_en','created_date'], 'safe'],
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
        $query = RecipesCategory::find();

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

        $query->andFilterWhere(['like', 'recipes_parent_id', $this->recipes_parent_id])
            ->andFilterWhere(['like', 'page_code', $this->page_code])
            ->andFilterWhere(['like', 'recipe_cat_code', $this->recipe_cat_code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'recipe_pt', $this->recipe_pt])
            ->andFilterWhere(['like', 'recipe_en', $this->recipe_en]);

        return $dataProvider;
    }
}
