<?php

namespace common\models;
use common\Helpers\Helpers;

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

     public $type;
     public $datetime;
    
   

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
            [['service_code', 'team_username', 'full_name', 'contact_number'], 'required'],
            [['id','type','canceled','confirm', 'missed','price_advanced'], 'integer'],
            [['time', 'created_date','team_username'], 'safe'],
            [['datetime'], 'validateIfShedduleExist'],
            [['booking_code','service_code','date','location_code', 'client_username', 'company_code', 'service_code', 'service_name', 'full_name', 'contact_number', 'email', 'nif'], 'string', 'max' => 255],
        ];
    }

    public function validateIfShedduleExist($attribute, $params){

        $error = Helpers::checkIfBookingExists(
            $this->booking_code, 
            $this->date, 
            $this->time, 
            $this->team_username,
            $this->company_code
        );          
     
        if ($error == 0) {                       
            $this->addError('datetime');
        }
        //Helpers::checkIfBookingExists($modelSheddule);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_username' => Yii::t('app','team_username'),
            'client_username' => Yii::t('app','client_username'),
            'company_code' => Yii::t('app','company_code'),
            'service_code' => Yii::t('app','service_code'),
            'service_name' => Yii::t('app','service_name'),
            'canceled' => Yii::t('app','canceled'),
            'name' => Yii::t('app','name'),
            'contact_number' => Yii::t('app','contact_number'),
            'email' => Yii::t('app','email'),
            'nif' => Yii::t('app','nif'),
            'date' => Yii::t('app','date'),
            'time' => Yii::t('app','time'),
            'created_date' => Yii::t('app','created_date'),
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
