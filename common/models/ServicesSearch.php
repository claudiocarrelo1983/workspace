<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Services;

/**
 * ServicesSearch represents the model behind the search form of `app\models\Services`.
 */
class ServicesSearch extends Services
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'order', 'active'], 'integer'],
            [['company_code'], 'string'],
            [['username', 'service_code', 'category_code', 'page_code_title', 'page_code_text', 'title', 'text','title_pt', 'text_pt', 'title_en', 'text_en', 'created_date'], 'safe'],
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
        $query = Services::find();

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
            'price' => $this->price,
            'order' => $this->order,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'service_code', $this->service_code])
            ->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'page_code_title', $this->page_code_title])
            ->andFilterWhere(['like', 'page_code_text', $this->page_code_text])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])      
            ->andFilterWhere(['like', 'title_pt', $this->title_pt])
            ->andFilterWhere(['like', 'text_pt', $this->text_pt])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'text_en', $this->text_en]);

        return $dataProvider;
    }
}
