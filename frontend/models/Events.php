<?php

namespace frontend\models;

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
            [['username','frequency', 'event_code', 'page_code', 'title', 'title_pt', 'title_en', 'color_code'], 'required'],
            [['created_date'], 'safe'],
            [['username', 'frequency','event_code', 'page_code', 'title', 'title_pt', 'title_en', 'color_code'], 'string', 'max' => 255],
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
            'created_date' => 'Created Date',
        ];
    }
}
