<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages_template".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $template_code
 * @property string|null $title
 * @property string|null $title_pt
 * @property string|null $text_pt
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string $created_date
 */
class MessagesTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_pt', 'text_en'], 'string'],
            [['created_date'], 'safe'],
            [['company_code', 'template_code'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 50],
            [['title_pt', 'title_en'], 'string', 'max' => 30],
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
            'title' => 'Title',
            'title_pt' => 'Title Pt',
            'text_pt' => 'Text Pt',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'created_date' => 'Created Date',
        ];
    }
}
