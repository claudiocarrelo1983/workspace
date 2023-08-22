<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at','active'], 'integer'],
            [['company_code'], 'string'],
            [['contact_number','nif','type','username', 'voucher_parent', 'voucher', 'first_name', 'last_name', 'company', 'level', 'sublevel', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'safe'],
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
        $query = User::find();

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
            'company_code' => $this->company_code,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);    



        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])  
            ->andFilterWhere(['like', 'nif', $this->nif])  
            ->andFilterWhere(['like', 'voucher', $this->voucher])  
            ->andFilterWhere(['like', 'voucher_parent', $this->voucher_parent])  
            ->andFilterWhere(['like', 'last_name', $this->last_name])       
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['=', 'company_code', $this->company_code])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'sublevel', $this->sublevel])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        return $dataProvider;
    }

    public function searchQuery($params)

    {

        $query = Model::find();


        $this->load($params);


        // grid filtering conditions

        $query->andFilterWhere([

		// ...

        ]);


        return $dataProvider;

    }
}
