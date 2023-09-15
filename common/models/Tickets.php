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

    public $verification_token;

    public $username;

    public $title;

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
            [['created_date','closed_ticket'], 'safe'],
            [['email'], 'email'],
            [['full_name','type', 'email', 'text', 'subject','contact_number','company_code','username_code','ticket_number','ticket_parent'], 'string', 'max' => 255],
            ['text', 'string'],
            ['read', 'integer']
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
            'contact_number' => 'Contact Number',
            'text' => 'Text',
            'created_date' => 'Created Date',
        ];
    }

    
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    public function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
    
}
