<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recipes;

/**
 * RecipesSearch represents the model behind the search form of `app\models\Recipes`.
 */
class RecipesSearch extends Recipes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['username', 'recipe_code', 'recipe_title', 'recipe_text', 'recipe_cat_code', 'cooking_time', 'number_of_people', 'recipe_pt', 'recipe_en', 'created_date'], 'safe'],
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
        $query = Recipes::find();

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

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'recipe_code_title', $this->recipe_code_title])
            ->andFilterWhere(['like', 'recipe_code_text', $this->recipe_code_text])
            ->andFilterWhere(['like', 'recipe_title', $this->recipe_title])
            ->andFilterWhere(['like', 'recipe_text', $this->recipe_text])
            ->andFilterWhere(['like', 'recipe_cat_code', $this->recipe_cat_code])
            ->andFilterWhere(['like', 'cooking_time', $this->cooking_time])
            ->andFilterWhere(['like', 'number_of_people', $this->number_of_people])
            ->andFilterWhere(['like', 'recipe_title_pt', $this->recipe_title_pt])
            ->andFilterWhere(['like', 'recipe_text_pt', $this->recipe_text_pt])    
            ->andFilterWhere(['like', 'recipe_title_en', $this->recipe_title_en])
            ->andFilterWhere(['like', 'recipe_text_en', $this->recipe_text_en]);
   

        return $dataProvider;
    }
}
