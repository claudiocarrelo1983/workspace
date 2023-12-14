<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $username
 * @property string $company_code
 * @property string $event_code
 * @property string $company_code_location
 * @property string $template_code
 * @property string|null $path
 * @property string|null $image
 * @property string|null $title
 * @property string $page_code_title
 * @property string $page_code_text
 * @property string|null $title_pt
 * @property string|null $text_pt
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string $frequency
 * @property string $start_day
 * @property string $end_day
 * @property string $start_hour
 * @property string $end_hour
 * @property int|null $number_or_hours
 * @property int|null $cost
 * @property int|null $max_num_people
 * @property string|null $url
 * @property int|null $login_required
 * @property int|null $active
 * @property string $created_date
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'company_code', 'event_code', 'company_code_location', 'template_code', 'page_code_title', 'page_code_text', 'frequency', 'start_day', 'end_day', 'start_hour', 'end_hour'], 'required'],
            [['text_pt', 'text_en'], 'string'],
            [['start_day', 'end_day', 'start_hour', 'end_hour', 'created_date'], 'safe'],
            [['number_or_hours', 'cost', 'max_num_people', 'login_required', 'active'], 'integer'],
            [['username', 'company_code', 'event_code', 'company_code_location', 'template_code', 'path', 'image', 'title', 'page_code_title', 'page_code_text', 'title_pt', 'title_en', 'frequency', 'url'], 'string', 'max' => 255],
            [['page_code_title'], 'unique'],
            [['page_code_text'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'company_code' => 'Company Code',
            'event_code' => 'Event Code',
            'company_code_location' => 'Company Code Location',
            'template_code' => 'Template Code',
            'path' => 'Path',
            'image' => 'Image',
            'title' => 'Title',
            'page_code_title' => 'Page Code Title',
            'page_code_text' => 'Page Code Text',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'frequency' => 'Frequency',
            'start_day' => 'Start Day',
            'end_day' => 'End Day',
            'start_hour' => 'Start Hour',
            'end_hour' => 'End Hour',
            'number_or_hours' => 'Number Or Hours',
            'cost' => 'Cost',
            'max_num_people' => 'Max Num People',
            'url' => 'Url',
            'login_required' => 'Login Required',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
