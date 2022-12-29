<?php

namespace app\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecipesSteps;

/**
 * RecipesStep represents the model behind the search form of `app\models\RecipesSteps`.
 */
class RecipesStep extends RecipesSteps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['recipe_code', 'recipe_step_text', 'recipe_step_text_pt', 'recipe_step_text_es', 'recipe_step_text_en', 'recipe_step_text_it', 'recipe_step_text_fr', 'recipe_step_text_de', 'created_date'], 'safe'],
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

        $query->andFilterWhere(['like', 'recipe_code', $this->recipe_code])
            ->andFilterWhere(['like', 'recipe_step_text', $this->recipe_step_text])
            ->andFilterWhere(['like', 'recipe_step_text_pt', $this->recipe_step_text_pt])
            ->andFilterWhere(['like', 'recipe_step_text_es', $this->recipe_step_text_es])
            ->andFilterWhere(['like', 'recipe_step_text_en', $this->recipe_step_text_en])
            ->andFilterWhere(['like', 'recipe_step_text_it', $this->recipe_step_text_it])
            ->andFilterWhere(['like', 'recipe_step_text_fr', $this->recipe_step_text_fr])
            ->andFilterWhere(['like', 'recipe_step_text_de', $this->recipe_step_text_de]);

        return $dataProvider;
    }
}
