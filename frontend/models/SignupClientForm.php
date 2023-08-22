<?php

namespace frontend\models;

use common\Helpers\Helpers;
use common\models\Company;

use Yii;
use yii\base\Model;
use common\models\Clients;
use yii\db\Query;

/**
 * Signup form
 */
class SignupClientForm extends Model
{

    
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    
    public $username;

    public $dob;
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

    public $gender;

    public $company_code;

    public $payment_month_fee;

    public $payment_year_fee;

    public $language;

    public $nif;

    public $subscription;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'auth_key', 'password_hash'], 'required'],
            [['dob', 'starting_date', 'subscription_startingdate', 'created_date'], 'safe'],
            [['status', 'terms_and_conditions', 'privacy', 'newsletter', 'active'], 'integer'],
            [['guid', 'username', 'first_name', 'last_name', 'gender', 'title',  'company', 'payment_month_fee', 'payment_year_fee', 'role', 'level', 'sublevel', 'language', 'email', 'nif', 'contact_number', 'password_hash', 'password_reset_token', 'subscription'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['guid'], 'unique'],           
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {       
 
        die(':::');

        if (!$this->validate()) {
            return null;
        }        
         
        $code = 'c'.Helpers::generateRandowHumber(20);
        $companyLocationRandom = 'cl'.Helpers::generateRandowHumber(20);;

        $clients = new Clients();   

        print"<pre>";
        print_r($clients);
        die();
      
        $clients->level = 'admin';
        $clients->guid = Helpers::GUID();
        $clients->company_code = $code;
        $clients->company_code_url = $code;
        $clients->username = $this->username;      
        $clients->email = $this->email;
        $clients->company = $this->company;
        $clients->terms_and_conditions = $this->terms_and_conditions;
        $clients->newsletter = $this->newsletter;
        $clients->privacy = $this->privacy;        
        $clients->first_name = $this->first_name;
        $clients->last_name = $this->last_name;
        $clients->active = true;
 
        $clients->setPassword($this->password);
        $clients->generateAuthKey();
        $clients->generateEmailVerificationToken(); 


        $model = new Company();
        $text = 'company_text_1';     
        $teamTitle = 'company_team_title_1'; 
        $teamText = 'company_team_text_1'; 
        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $text = 'company_text_'.bcadd($count->id, 1);   
         $teamTitle = 'company_team_title_'.bcadd($count->id, 1);  
         $teamText = 'company_team_text_'.bcadd($count->id, 1);    
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
            'location' =>  $companyLocationRandom,
            'active' => 1,             
        ];

        $this->createTeam($arrTeam);

        $arrCompany = [
            'company_code' => $code,
            'coin' => $this->coin,
            'company_code_url' => $code,
            'company_name' => $this->company,
            'page_code_text' => $text,
            'page_code_team_title' => $teamTitle,
            'page_code_team_text' => $teamText,
            'team_title_pt' => 'Conheça a equipa',
            'team_title_en' => 'Meet Our Team',    
            'team_text_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget urna odio. Proin mollis placerat massa feugiat dapibus. Curabitur sit amet ante vel odio auctor sollicitudin. Proin consequat velit vel fringilla viverra. Vestibulum tellus eros, faucibus et tellus non, accumsan ornare mauris. Etiam varius, turpis ac laoreet vehicula, odio diam fringilla magna.',
            'team_text_pt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget urna odio. Proin mollis placerat massa feugiat dapibus. Curabitur sit amet ante vel odio auctor sollicitudin. Proin consequat velit vel fringilla viverra. Vestibulum tellus eros, faucibus et tellus non, accumsan ornare mauris. Etiam varius, turpis ac laoreet vehicula, odio diam fringilla magna.',        
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
            'location_code' => $companyLocationRandom,
            'active' => 1       
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
        $username = 'username_1';

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'team_title_'.bcadd($count->id, 1); 
         $description = 'team_description_'.bcadd($count->id, 1);      
         $username = 'username_'.bcadd($count->id, 1);
       }

       
       $arrValues = [
            'page_code_title' => $title,
            'page_code_text' => $description,
            'username_code' => $username,          
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
            'page_code_description' => $description                 
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
