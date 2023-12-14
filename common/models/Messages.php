<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $template_code
 * @property string|null $company_code_location_array
 * @property string|null $genders
 * @property string|null $title
 * @property string|null $title_pt
 * @property string|null $text_pt
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string|null $type
 * @property string|null $from_schedule_date
 * @property string|null $to_schedule_date
 * @property string|null $schedule_hour
 * @property int|null $reminder_number
 * @property string|null $reminder_hours_days
 * @property string|null $language
 * @property string|null $stage
 * @property int|null $send
 * @property string|null $error
 * @property int|null $active
 * @property string $created_date
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_pt', 'text_en'], 'string'],
            [['from_schedule_date', 'to_schedule_date', 'created_date'], 'safe'],
            [['reminder_number', 'send', 'active'], 'integer'],
            [['company_code', 'template_code', 'company_code_location_array', 'genders', 'type', 'schedule_hour', 'reminder_hours_days', 'language', 'stage', 'error'], 'string', 'max' => 255],
            [['title', 'title_pt', 'title_en'], 'string', 'max' => 30],
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
            'template_code' => 'Template Code',
            'company_code_location_array' => 'Company Code Location Array',
            'genders' => 'Genders',
            'title' => 'Title',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'type' => 'Type',
            'from_schedule_date' => 'From Schedule Date',
            'to_schedule_date' => 'To Schedule Date',
            'schedule_hour' => 'Schedule Hour',
            'reminder_number' => 'Reminder Number',
            'reminder_hours_days' => 'Reminder Hours Days',
            'language' => 'Language',
            'stage' => 'Stage',
            'send' => 'Send',
            'error' => 'Error',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
