<?php

namespace frontend\models;

use yii\db\Query;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    { 

        return  Yii::$app->mailer->compose()
            ->setFrom('info@myspecialgym.com')
            ->setTo('claudiocarrelo1983@gmail.com')
            ->setSubject($this->subject)
            ->setTextBody($this->message)
            ->send();

         /*
        return Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setTo($email)          
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->message)
            ->send();

       
        Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo('to@domain.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
            */

    }

    public function saveTicket($model){        

        $connection = new Query;
      
        $connection->createCommand()->insert('tickets', [      
            'full_name' => $model->name,
            'email' => $model->email,
            'subject' => $model->subject,
            'text' => $model->message        
        ])->execute();
    }
}
