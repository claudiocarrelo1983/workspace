<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "forms".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $company
 * @property string|null $type
 * @property string|null $title
 * @property string|null $description
 * @property string|null $text
 * @property string|null $image
 * @property string $created_date
 */
class Forms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'image'], 'string'],
            [['created_date'], 'safe'],
            [['username', 'company', 'type', 'title', 'description'], 'string', 'max' => 255],
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
            'company' => 'Company',
            'type' => 'Type',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'image' => 'Image',
            'created_date' => 'Created Date',
        ];
    }
}
