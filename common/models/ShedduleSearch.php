<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sheddule;

/**
 * ShedduleSearch represents the model behind the search form of `app\models\Sheddule`.
 */
class ShedduleSearch extends Sheddule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['team_username', 'client_username', 'company_code', 'service_code', 'service_name', 'name', 'contact_number', 'email', 'nif', 'date', 'time', 'created_date'], 'safe'],
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
        $query = Sheddule::find();

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
            //'available' => $this->available,
            'date' => $this->date,
            'time' => $this->time,
            'created_date' => $this->created_date,
        ]);
      

        $query->andFilterWhere(['like', 'team_username', $this->team_username])
            ->andFilterWhere(['like', 'client_username', $this->client_username])
            ->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'service_code', $this->service_code])
            ->andFilterWhere(['like', 'service_name', $this->service_name])
            ->andFilterWhere(['like', 'team_username', $this->team_username])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nif', $this->nif]);

        return $dataProvider;
    }
}
