<?php

namespace frontend\models;

use common\Helpers\Helpers;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\Query;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $password;

    public $company_code_url;

    public $level;

    public $first_name;

    public $last_name;

    public $company;

    public $terms_and_conditions;

    public $newsletter;

    public $privacy;

    public $auth_key;

    public $created_at;

    public $status;

    public $active;

    public $name;

    public $sublevel;

    public $password_reset_token;

    public $verification_token;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],


            [['terms_and_conditions','newsletter','first_name','last_name','company','privacy'], 'required'],


            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $code = Helpers::generateCompanyCode();

        $user = new User();
        
        $user->level = 'subscriber';
        $user->id = Helpers::GUID();
        $user->company_code = $code;
        $user->company_code_url = $code;
        $user->username = $this->username;      
        $user->email = $this->email;
        $user->company = $this->company;
        $user->terms_and_conditions = $this->terms_and_conditions;
        $user->newsletter = $this->newsletter;
        $user->privacy = $this->privacy;        
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
 
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 

        return $user->save() && $this->sendEmail($user);
    }

    public function createCompany($company, $codeCompany){

        $connection =  new Query;

        $connection->createCommand()->insert('companies', [
            'team_code' => $codeCompany,
            'team_name' => $company,
        ])->execute();
    }

    public function stringToCode($str = ''){

        $str = strtolower($str);
        $str = str_replace(' ', '_', $str);


        return $str;
    }

    public function generateRandomString($length = 7) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
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
