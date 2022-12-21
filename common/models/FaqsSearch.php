<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Faqs;

/**
 * FaqsSearch represents the model behind the search form of `app\models\Faqs`.
 */
class FaqsSearch extends Faqs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['question', 'answer', 'question_pt', 'answer_pt', 'question_en', 'answer_en', 'question_es', 'answer_es', 'question_it', 'answer_it', 'question_de', 'answer_de', 'question_fr', 'answer_fr', 'created_date'], 'safe'],
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
        $query = Faqs::find();

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

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'question_pt', $this->question_pt])
            ->andFilterWhere(['like', 'answer_pt', $this->answer_pt])
            ->andFilterWhere(['like', 'question_en', $this->question_en])
            ->andFilterWhere(['like', 'answer_en', $this->answer_en])
            ->andFilterWhere(['like', 'question_es', $this->question_es])
            ->andFilterWhere(['like', 'answer_es', $this->answer_es])
            ->andFilterWhere(['like', 'question_it', $this->question_it])
            ->andFilterWhere(['like', 'answer_it', $this->answer_it])
            ->andFilterWhere(['like', 'question_de', $this->question_de])
            ->andFilterWhere(['like', 'answer_de', $this->answer_de])
            ->andFilterWhere(['like', 'question_fr', $this->question_fr])
            ->andFilterWhere(['like', 'answer_fr', $this->answer_fr]);

        return $dataProvider;
    }
}
