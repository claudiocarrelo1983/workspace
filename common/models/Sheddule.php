<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sheddule".
 *
 * @property int $id
 * @property string|null $team_username
 * @property string|null $client_username
 * @property string|null $company_code
 * @property string $service_code
 * @property string $service_name
 * @property int|null $available
 * @property string $name
 * @property string $contact_number
 * @property string|null $email
 * @property string|null $nif
 * @property string|null $date
 * @property string|null $time
 * @property string $created_date
 */
class Sheddule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

 
    public static function tableName()
    {
        return 'sheddule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_code', 'service_name', 'full_name', 'contact_number'], 'required'],
            [['canceled','confirm'], 'integer'],
            [['date','time', 'created_date','team_username'], 'safe'],
            [['id','location_code', 'client_username', 'company_code', 'service_code', 'service_name', 'full_name', 'contact_number', 'email', 'nif'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_username' => 'Team Username',
            'client_username' => 'Client Username',
            'company_code' => 'Company Code',
            'service_code' => 'Service Cat',
            'service_name' => 'Service Name',
            'canceled' => 'Available',
            'name' => 'Name',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'nif' => 'Nif',
            'date' => 'Date',
            'time' => 'Time',
            'created_date' => 'Created Date',
        ];
    }

    public  function findModel($id)
    {
        if (($model = Sheddule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
