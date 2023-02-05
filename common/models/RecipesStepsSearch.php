<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecipesSteps;

/**
 * RecipesStepsSearch represents the model behind the search form of `app\models\RecipesSteps`.
 */
class RecipesStepsSearch extends RecipesSteps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['username', 'recipe_code', 'recipe_step_title', 'recipe_step_text', 'recipe_step_title_pt', 'recipe_step_text_pt', 'recipe_step_title_en', 'recipe_step_text_en', 'created_date'], 'safe'],
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
        $query = RecipesSteps::find();

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
            'order' => $this->order,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['=', 'recipe_code', $this->recipe_code])
            ->andFilterWhere(['like', 'recipe_step_text', $this->recipe_step_text])
            ->andFilterWhere(['like', 'recipe_step_text_pt', $this->recipe_step_text_pt])
            ->andFilterWhere(['like', 'recipe_step_text_en', $this->recipe_step_text_en]);

        return $dataProvider;
    }
}
