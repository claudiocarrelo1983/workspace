<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Events;

/**
 * EventsSearch represents the model behind the search form of `app\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number_or_hours', 'cost', 'max_num_people', 'login_required', 'active'], 'integer'],
            [['username', 'company_code', 'event_code', 'company_code_location', 'template_code', 'path', 'image', 'title', 'page_code_title', 'page_code_text', 'title_pt', 'text_pt', 'title_en', 'text_en', 'frequency', 'start_day', 'end_day', 'start_hour', 'end_hour', 'url', 'created_date'], 'safe'],
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
        $query = Events::find();

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
            'start_day' => $this->start_day,
            'end_day' => $this->end_day,
            'start_hour' => $this->start_hour,
            'end_hour' => $this->end_hour,
            'number_or_hours' => $this->number_or_hours,
            'cost' => $this->cost,
            'max_num_people' => $this->max_num_people,
            'login_required' => $this->login_required,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'event_code', $this->event_code])
            ->andFilterWhere(['like', 'company_code_location', $this->company_code_location])
            ->andFilterWhere(['like', 'template_code', $this->template_code])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'page_code_title', $this->page_code_title])
            ->andFilterWhere(['like', 'page_code_text', $this->page_code_text])
            ->andFilterWhere(['like', 'title_pt', $this->title_pt])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'frequency', $this->frequency])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
