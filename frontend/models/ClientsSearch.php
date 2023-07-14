<?php

namespace frontend\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Clients;

/**
 * ClientsSearch represents the model behind the search form of `app\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'terms_and_conditions', 'gdpr', 'privacy', 'newsletter', 'active', 'created_at', 'updated_at'], 'integer'],
            [['guid', 'username', 'contact_number', 'email', 'nif', 'first_name', 'last_name', 'full_name', 'gender', 'title', 'path', 'dob', 'image', 'company_code', 'starting_date', 'payment_month_fee', 'payment_year_fee', 'offer', 'language', 'address', 'postcode', 'location', 'country', 'voucher', 'auth_key', 'password_hash', 'password_reset_token', 'subscription', 'subscription_startingdate', 'created_date'], 'safe'],
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
        $query = Clients::find();

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
            'dob' => $this->dob,
            'starting_date' => $this->starting_date,
            'status' => $this->status,
            'terms_and_conditions' => $this->terms_and_conditions,
            'gdpr' => $this->gdpr,
            'privacy' => $this->privacy,
            'newsletter' => $this->newsletter,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'subscription_startingdate' => $this->subscription_startingdate,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'payment_month_fee', $this->payment_month_fee])
            ->andFilterWhere(['like', 'payment_year_fee', $this->payment_year_fee])
            ->andFilterWhere(['like', 'offer', $this->offer])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'voucher', $this->voucher])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'subscription', $this->subscription]);

        return $dataProvider;
    }
}
