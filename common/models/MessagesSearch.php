<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Messages;

/**
 * MessagesSearch represents the model behind the search form of `app\models\Messages`.
 */
class MessagesSearch extends Messages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reminder_number', 'send', 'active'], 'integer'],
            [['company_code', 'template_code', 'company_code_location_array', 'genders', 'title', 'title_pt', 'text_pt', 'title_en', 'text_en', 'type', 'from_schedule_date', 'to_schedule_date', 'schedule_hour', 'reminder_hours_days', 'language', 'stage', 'error', 'created_date'], 'safe'],
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
        $query = Messages::find();

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
            'reminder_number' => $this->reminder_number,
            'send' => $this->send,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'template_code', $this->template_code])
            ->andFilterWhere(['like', 'company_code_location_array', $this->company_code_location_array])
            ->andFilterWhere(['like', 'genders', $this->genders])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_pt', $this->title_pt])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'schedule_hour', $this->schedule_hour])
            ->andFilterWhere(['like', 'reminder_hours_days', $this->reminder_hours_days])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'error', $this->error]);

        return $dataProvider;
    }
}
