<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $company_code_location_array
 * @property string|null $title
 * @property string|null $text
 * @property string $title_pt
 * @property string $text_pt
 * @property string $title_en
 * @property string $text_en
 * @property string|null $type
 * @property string|null $from_schedule_day
 * @property string|null $to_schedule_day
 * @property string|null $schedule_hour
 * @property string|null $language
 * @property string|null $stage
 * @property int|null $send
 * @property string|null $error
 * @property int|null $active
 * @property string $created_date
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_pt', 'text_pt', 'title_en', 'text_en'], 'required'],
            [['text_pt', 'text_en'], 'string'],
            [['from_schedule_day', 'to_schedule_day', 'created_date'], 'safe'],
            [['send', 'active'], 'integer'],
            [['company_code', 'company_code_location_array', 'title_pt', 'title_en', 'type', 'schedule_hour', 'language', 'stage', 'error'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30],
            [['text'], 'string', 'max' => 160],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_code' => 'Company Code',
            'company_code_location_array' => 'Company Code Location Array',
            'title' => 'Title',
            'text' => 'Text',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'type' => 'Type',
            'from_schedule_day' => 'From Schedule Day',
            'to_schedule_day' => 'To Schedule Day',
            'schedule_hour' => 'Schedule Hour',
            'language' => 'Language',
            'stage' => 'Stage',
            'send' => 'Send',
            'error' => 'Error',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
