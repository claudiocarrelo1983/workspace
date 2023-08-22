<?php

namespace common\models;

use common\Helpers\Helpers;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $guid
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $title
 * @property string|null $dob
 * @property string|null $company_code
 * @property string|null $company
 * @property string|null $starting_date
 * @property string|null $payment_month_fee
 * @property string|null $payment_year_fee
 * @property string|null $role
 * @property string|null $level
 * @property string|null $sublevel
 * @property int $status
 * @property string|null $language
 * @property string $email
 * @property string|null $nif
 * @property string|null $contact_number
 * @property int|null $terms_and_conditions
 * @property int|null $gdpr
 * @property int|null $privacy
 * @property int|null $newsletter
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int|null $active
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $subscription
 * @property string|null $subscription_startingdate
 * @property string $created_date
 */
class Clients extends \yii\db\ActiveRecord
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public $password;

    public $company_code_url;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['username', 'email'], 'required'],
            //[['dob'], 'safe'],
            [['terms_and_conditions','privacy', 'newsletter', 'active'], 'integer'],
            [['dob','privacy','language','level','password_reset_token', 'guid','auth_key', 'username', 'first_name', 'last_name', 'full_name', 'gender', 'title', 'company_code',  'level', 'language', 'email', 'nif', 'contact_number', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            [['guid'], 'unique'], 
            [['password_reset_token'], 'unique'],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'title' => 'Title',
            'dob' => 'Dob',
            'company_code' => 'Company Code',
            'company' => 'Company',
            'starting_date' => 'Starting Date',
            'payment_month_fee' => 'Payment Month Fee',
            'payment_year_fee' => 'Payment Year Fee',
            'role' => 'Role',
            'level' => 'Level',
            'sublevel' => 'Sublevel',
            'status' => 'Status',
            'language' => 'Language',
            'email' => 'Email',
            'nif' => 'Nif',
            'contact_number' => 'Contact Number',
            'terms_and_conditions' => 'Terms And Conditions',
            'gdpr' => 'Gdpr',
            'privacy' => 'Privacy',
            'newsletter' => 'Newsletter',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'subscription' => 'Subscription',
            'subscription_startingdate' => 'Subscription Startingdate',
            'created_date' => 'Created Date',
        ];
    }


     /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup($model)
    {       

        $user = new User();   
        
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken(); 

           

        if (!$this->validate()) {
            return null;
        }            

        $companyModel = new Company();

        $companyResult = $companyModel::find('id')->orderBy("id desc")->where(['company_code' => $model->company_code])->limit(1)->one();
        $model->company =  $companyResult->company_name;
     
        $model->setPassword($model->password);
        $model->generateAuthKey();
        $model->generateEmailVerificationToken();       

        //return $this->sendEmail($model);
        return $model->save() && $this->sendEmail($model);
    }
    
    
}
