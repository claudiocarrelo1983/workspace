<?php

namespace common\models;

use Yii;
class RequestDynamicFormWidget extends  \yii\base\Model
{


    public $isNewRecord = '0';

    public $id = '0';
    public $calories;

    public $foodName;
    public $quantity;
    public $protein;
    public $fat;

    public $carbs;


    public static function tableName()
    {
        return 'request';
    }


    public function rules()
    {
        return [
            [['req_date', 'req_on', 'req_updated_on'], 'safe'],
            [['req_job', 'req_type', 'material_type', 'req_status'], 'required'],
            [['req_by'], 'integer'],
            [['isNewRecord','req_status'], 'string'],
            [['req_job', 'req_type'], 'string', 'max' => 100],
            [['material_type'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'req_id' => 'Req ID',
            'req_date' => 'Req Date',
            'req_job' => 'Job No',
            'req_type' => 'Type of Request',
            'req_on' => 'Required On',
            'material_type' => 'Material Type',
            'req_by' => 'Req By',
            'req_updated_on' => 'Req Updated On',
            'req_status' => 'Request Status',
        ];
    }
}  