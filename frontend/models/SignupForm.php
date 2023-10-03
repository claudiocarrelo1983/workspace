<?php

namespace frontend\models;

use common\Helpers\Helpers;
use common\models\Company;
use common\models\Team;
use common\models\CompanyLocations;


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

    public $job_title;

    public $guid;

    public $nif;

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

    public $location_code;

    public $country;

    public $contact_number;

    public $title;

    public $role;

    public $coin;

    public $gender;

    public $dob;

    public $company_code;

    public $voucher;

    public $voucher_parent;

    public $rememberMe;

    public $page_code_title;

    public $page_code_text;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public $updated_at;

    public $surname;

    public $text;

    public $title_pt;

    public $title_en;

    public $time_window;

    public $website;

    public $facebook;

    public $pinterest;

    public $instagram;

    public $twitter;

    public $tiktok;

    public $linkedin;

    public $youtube;

    public $address_line_1;

    public $address_line_2;

    public $imageFile;
    public $monday_open_checkbox;
    public $monday_starting_hour;
    public $monday_end_hour;
    public $monday_starting_break;
    public $monday_end_break;
    public $tuesday_open_checkbox;
    public $tuesday_starting_hour;
    public $tuesday_end_hour;
    public $tuesday_starting_break;
    public $tuesday_end_break;
    public $wednesday_open_checkbox;
    public $wednesday_starting_hour;
    public $wednesday_end_hour;
    public $wednesday_starting_break;
    public $wednesday_end_break;
    public $thursday_open_checkbox;
    public $thursday_starting_hour;
    public $thursday_end_hour;
    public $thursday_starting_break;
    public $thursday_end_break;
    public $friday_open_checkbox;
    public $friday_starting_hour;
    public $friday_end_hour;
    public $friday_starting_break;
    public $friday_end_break;
    public $saturday_open_checkbox;
    public $saturday_starting_hour;
    public $saturday_end_hour;
    public $saturday_starting_break;
    public $saturday_end_break;
    public $sunday_open_checkbox;
    public $sunday_starting_hour;
    public $sunday_end_hour;
    public $sunday_starting_break;
    public $sunday_end_break;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            //['voucher', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This voucher has already been taken.'], 
            ['voucher', 'validateVoucher'],   
            ['voucher_parent', 'validateVoucherParent'],  
            //['voucher', 'required'],
            [['nif','dob','voucher','username','adress_line_1','adress_line_2','city','location','country','postcode','contact_number', 'title', 'role','coin','gender','voucher_parent','job_title'], 'string', 'min' => 2, 'max' => 255],
             ['email', 'trim'],
            [['email','contact_number','gender', 'title'], 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['terms_and_conditions','newsletter','privacy','first_name','last_name','company'], 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function validateVoucher($attribute, $params, $validator)
    {
        if(!empty($this->$attribute) && $this->$attribute != 'null'){
            $userFound = User::findOne(['voucher' => $this->$attribute]);
            if(!empty($userFound)){
                $this->addError($attribute, 'This voucher has already been taken.');
            }         
        }
    }

    public function validateVoucherValidation($attribute)
    {
        $valid = 1;

        if(!empty($this->$attribute) && $this->$attribute != 'null'){
            $userFound = User::findOne(['voucher' => $this->$attribute]);
            if(!empty($userFound)){
                 $valid = 0;
            }         
        }

        return $valid;
    }
    
    public function validateVoucherParent($attribute, $params, $validator)
    {
        if(!empty($this->$attribute)){
            $userFound = User::findOne(['voucher' => $this->$attribute]);
            if(empty($userFound)){
                $this->addError($attribute, 'Voucher not valid.');
            }         
        }
    }


      /**
     * Signs Resseller.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signUpReseller($model)
    {        

        if (!$this->validate()) {
            return null;
        }   
        
        $companyModel = new Company();
        $user = new User();   
      
        $companyModel = new Company();
        $code = 'c'.Helpers::generateRandowHumber(20);
        $companyResult = $companyModel::find('id')->orderBy("id desc")->where(['company_code' => $model->company_code])->limit(1)->one();
  
        $user->level = 'reseller';
        $user->guid = Helpers::GUID();
        $user->company_code = $code;
        $user->company_code_url = $code;
        $user->username = $this->username;     
        $user->contact_number = $this->contact_number;   
        $user->email = $this->email;
        $user->nif = $this->nif;
        $user->voucher = ((empty($this->voucher)) ? 'v'.strtotime(date('Y-m-d H:m:s')) : $this->voucher);

        
        $user->terms_and_conditions = $this->terms_and_conditions;
        $user->newsletter = $this->newsletter;
        $user->privacy = $this->privacy;        
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;  
        $user->full_name =  $this->first_name.' '.$this->last_name;
        $user->active = true; 
        
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 


        //return $this->sendEmail($model);
        return $user->save() && $this->sendEmail($model);
    }


         /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signUpClient($model)
    {        
         
        if (!$this->validate()) {
            return null;
        }   
        
        $companyModel = new Company();
        $user = new User();   
      
        $companyModel = new Company();
        $code = Yii::$app->request->get('code');
        $companyResult = $companyModel::find('id')->orderBy("id desc")->where(['company_code' => $model->company_code])->limit(1)->one();
  
        $user = new User();  

        $title = 'company_location_title_1';   
        $description = 'company_location_description_1';

        $count = $user::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'company_location_title_'.bcadd($count->id, 1); 
         $description = 'company_location_description_'.bcadd($count->id, 1);            
       }    

        $user->level = 'client';
        $user->guid = Helpers::GUID();
        $user->company_code = $code;
        $user->company_code_url = $code;
        $user->username = $this->username;      
        $user->email = $this->email;
        $user->gender = $this->gender;      
        $user->title = $this->title;
        $user->nif = $this->nif;
        $user->contact_number = $this->contact_number;   
        $user->voucher = $this->voucher;
        $user->page_code_title = $title;
        $user->dob = $this->dob;
        $user->page_code_title = $title;
        $user->page_code_text = $description;
        $user->company = $companyResult->company_name;
        $user->terms_and_conditions = $this->terms_and_conditions;
      
        $user->newsletter = $this->newsletter;
        $user->privacy = $this->privacy;        
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->full_name =  $this->first_name.' '.$this->last_name;
        $user->active = true; 
        
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 

        //return $this->sendEmail($model);
        return $user->save() && $this->sendEmail($model);
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
  
        $code = 'c'.Helpers::generateRandowHumber(20);
        $companyLocationRandom = 'cl'.Helpers::generateRandowHumber(20);

        $user = new User();  

        $title = 'company_location_title_1';   
        $description = 'company_location_description_1';

        $count = $user::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'company_location_title_'.bcadd($count->id, 1); 
         $description = 'company_location_description_'.bcadd($count->id, 1);            
       }    
      
        $user->level = 'admin';
        $user->guid = Helpers::GUID();
        $user->company_code = $code;
        $user->job_title = $this->job_title;
        $user->company_code_url = $code;
        $user->username = $this->username;      
        $user->email = $this->email;
        $user->company = $this->company;
        $user->voucher_parent = $this->voucher_parent;
        $user->terms_and_conditions = $this->terms_and_conditions;
        $user->newsletter = $this->newsletter;
        $user->privacy = $this->privacy;        
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->full_name =  $this->first_name.' '.$this->last_name;
        $user->page_code_title = $title;
        $user->page_code_text = $description;
        $user->active = true;
        $user->nif = $this->nif;
        $user->voucher = ((empty($this->voucher)) ? 'null' : $this->voucher);
        $user->voucher_parent = ((empty($this->voucher_parent)) ? 'null' : $this->voucher_parent);
        $user->contact_number = $this->contact_number;   
        $user->adress_line_1 = $this->adress_line_1;
        $user->adress_line_2 = $this->adress_line_2;
        $user->city = $this->city;
        $user->postcode = $this->postcode;
        $user->location_code = $companyLocationRandom;
        $user->location = $this->location;
        $user->country = $this->country;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 

       if($this->validateVoucherValidation($user->voucher)){          

            $model = new Company();
            $text = 'company_text_1';     
            $teamTitle = 'company_team_title_1'; 
            $teamText = 'company_team_text_1'; 
            $teamManteinance = 'company_manteinance_text_1';    
            $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

            if(!empty($count->id)){
                $text = 'company_text_'.bcadd($count->id, 1);   
                $teamTitle = 'company_team_title_'.bcadd($count->id, 1);  
                $teamText = 'company_team_text_'.bcadd($count->id, 1);    
                $teamManteinance = 'company_manteinance_text_'.bcadd($count->id, 1);   
            }

            $arrTeam = [

            ];

            $arrTeam = [
                'company_code' => $code,
                'username_code' => $user->guid,
                'username' => $this->username,
                'page_code_title' => $teamTitle,
                'page_code_text' => $teamText,         
                'title' => $this->title,
                'first_name' => $this->first_name,
                'surname' => $this->last_name,       
                'contact_number' => $this->contact_number,  
                'email' => $this->email,   
                'location' => $this->location,  
                'job_title' => $this->job_title, 
                'active' => $this->job_title,           

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
                'page_code_manteinance' => $teamManteinance,
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
        }
        
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
        //$username = 'c'.Helpers::generateRandowHumber(20);

        $count = $model::find('id')->orderBy("id desc")->limit(1)->one();

       if(!empty($count->id)){
         $title = 'team_title_'.bcadd($count->id, 1); 
         $description = 'team_description_'.bcadd($count->id, 1);     
       }

       
       $arrValues = [
            'page_code_title' => $title,
            'page_code_text' => $description,                  
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

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

  

        /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmailClient($user)
    {        
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailClientVerify-html', 'text' => 'emailClientVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    
}
