<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team;

/**
 * TeamSearch represents the model behind the search form of `app\models\Team`.
 */
class TeamSearch extends Team
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['username', 'full_name', 'image', 'location', 'title', 'text', 'title_pt', 'text_pt', 'title_en', 'text_en', 'website', 'facebook', 'pinterest', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube', 'contact_number', 'created_date'], 'safe'],
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
        $query = Team::find();

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
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'title_pt', $this->title_pt])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'text_en', $this->text_en])                
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'pinterest', $this->pinterest])
            ->andFilterWhere(['like', 'instagram', $this->instagram])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'tiktok', $this->tiktok])
            ->andFilterWhere(['like', 'linkedin', $this->linkedin])
            ->andFilterWhere(['like', 'youtube', $this->youtube])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number]);

        return $dataProvider;
    }
}
