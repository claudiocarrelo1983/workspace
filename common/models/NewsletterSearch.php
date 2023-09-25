<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Newsletter;

/**
 * EmailSearch represents the model behind the search form of `common\models\Email`.
 */
class NewsletterSearch extends Newsletter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'send', 'active'], 'integer'],
            [['company_code', 'company_code_location_array', 'title', 'text', 'title_pt', 'text_pt', 'title_en', 'text_en', 'type', 'from_schedule_date', 'to_schedule_date', 'schedule_hour', 'language', 'stage', 'error', 'created_date'], 'safe'],
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
        $query = Newsletter::find();

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
            'from_schedule_date' => $this->from_schedule_date,
            'to_schedule_date' => $this->to_schedule_date,
            'send' => $this->send,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'company_code_location_array', $this->company_code_location_array])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'title_pt', $this->title_pt])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'schedule_hour', $this->schedule_hour])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'error', $this->error]);

        return $dataProvider;
    }
}
