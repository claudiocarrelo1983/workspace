<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $opt_in
 * @property string $created_date
 */
class Subscribers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [    
            [['first_name', 'last_name', 'opt_in'], 'string'],
            // email has to be a valid email address
            ['email', 'unique'],
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'opt_in' => 'Opt In',
            'created_date' => 'Created Date',
        ];
    }

    public function saveSubscribers($model){
        
        $connection = new Query;
    
        $connection->createCommand()->insert('subscribers', [      
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'email' => $model->email,
            'opt_in' => $model->opt_in       
        ])->execute();    
   
    }    
}
