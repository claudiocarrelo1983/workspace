<?php

namespace frontend\models;

use common\Helpers\Helpers;
use frontend\models\Company;

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

    public $guid;

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

    public $adress_line_1;

    public $adress_line_2;

    public $city;

    public $postcode;

    public $location;

    public $country;

    public $contact_number;

    public $title;

    public $role;

    public $coin;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['username','adress_line_1','adress_line_2','city','location','country','postcode','contact_number', 'title', 'role','coin'], 'string', 'min' => 2, 'max' => 255],

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
      
        $user->level = 'admin';
        $user->guid = Helpers::GUID();
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
        $user->active = true;
 
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 


        $model = new Company();
        $text = 'company_text_1';       
        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $text = 'company_text_'.bcadd($count->id, 1);       
       }

       $arrTeam = [
            'title' => $this->title, 
            'job_title' =>  $this->role, 
            'title_pt' => $this->role, 
            'title_en' => $this->role, 
            'company_code' => $code,
            'username' => $this->username,        
            'first_name' => $this->first_name,
            'surname' => $this->last_name, 
            'email' => $this->email,  
            'contact_number' => $this->contact_number,  
            'location' => $this->location,
            'active' => 1,      
        ];

        $this->createTeam($arrTeam);

        $arrCompany = [
            'company_code' => $code,
            'coin' => $this->coin,
            'company_code_url' => $code,
            'company_name' => $this->company,
            'page_code_text' => $text,
            'email_1' => $this->email,   
            'contact_number_1' => $this->contact_number,   
            'address_line_1' => $this->adress_line_1,
            'address_line_2' => $this->adress_line_2,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'location' => $this->location,
            'country' => $this->country,
        ];

        $this->createCompany($arrCompany);

        $arrCompanyLocation = [
            'company_code' => $code,
            'full_name' => $this->company,    
            'email' => $this->email,   
            'contact_number' => $this->contact_number,          
            'address_line_1' => $this->adress_line_1,
            'address_line_2' => $this->adress_line_2,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'location' => $this->location,
            'country' => $this->country,
        ];

        $this->createCompanyLocation($arrCompanyLocation);

        return $user->save() && $this->sendEmail($user);
    }

    public function createCompany($arrCompany){

        $connection =  new Query;

        $connection->createCommand()->insert('company', 
            $arrCompany
        )->execute();
    }

    public function createTeam($arrTeam){

        $connection =  new Query;

        $model = new Team;

        $title = 'team_title_1';   
        $description = 'team_description_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'team_title_'.bcadd($count->id, 1); 
         $description = 'team_description_'.bcadd($count->id, 1);            
       }

       
       $arrValues = [
            'page_code_title' => $title,
            'page_code_text' => $description          
        ];

       $arrTeam = array_merge($arrTeam, $arrValues);

        $connection->createCommand()->insert('team', 
            $arrTeam
        )->execute();
    }
    
    public function createCompanyLocation($arrCompanyLocation){

        $connection =  new Query;

        $model = new CompanyLocations;

        $title = 'company_location_title_1';   
        $description = 'company_location_description_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'company_location_title_'.bcadd($count->id, 1); 
         $description = 'company_location_description_'.bcadd($count->id, 1);            
       }

       $arrValues = [
            'page_code_title' => $title,
            'page_code_description' => $description,
            'location_code' => 'company_location_'.Helpers::generateRandowHumber(),        
       ];

       $arrCompanyLocation = array_merge($arrCompanyLocation, $arrValues);

        $connection->createCommand()->insert('company_locations', 
            $arrCompanyLocation
        )->execute();
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
