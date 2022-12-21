<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $text
 * @property string $created_date
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_date'], 'safe'],
            [['email'], 'email'],
            [['full_name', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'text' => 'Text',
            'created_date' => 'Created Date',
        ];
    }
}
