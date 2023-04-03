<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $username
 * @property string $event_code
 * @property string $page_code
 * @property string $title
 * @property string $title_pt
 * @property string $title_en
 * @property string $color_code
 * @property string $frequency
 * @property string|null $start
 * @property string|null $end
 * @property int|null $allDay
 * @property string|null $url
 * @property string $className
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
            [['username', 'event_code', 'page_code', 'title',  'start',  'end', 'title_pt', 'title_en', 'color_code', 'frequency', 'className'], 'required'],
            [['start', 'end', 'created_date'], 'safe'],
            [['allDay'], 'integer'],
            [['username', 'event_code', 'page_code', 'title', 'title_pt', 'title_en', 'color_code', 'frequency', 'url', 'className'], 'string', 'max' => 255],
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
            'event_code' => 'Event Code',
            'page_code' => 'Page Code',
            'title' => 'Title',
            'title_pt' => 'Title Pt',
            'title_en' => 'Title En',
            'color_code' => 'Color Code',
            'frequency' => 'Frequency',
            'start' => 'Start',
            'end' => 'End',
            'allDay' => 'All Day',
            'url' => 'Url',
            'className' => 'Class Name',
            'created_date' => 'Created Date',
        ];
    }
}
