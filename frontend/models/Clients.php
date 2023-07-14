<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $guid
 * @property string $username
 * @property string|null $contact_number
 * @property string $email
 * @property string|null $nif
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $title
 * @property string|null $path
 * @property string|null $dob
 * @property string|null $image
 * @property string|null $company_code
 * @property string|null $starting_date
 * @property string|null $payment_month_fee
 * @property string|null $payment_year_fee
 * @property string|null $offer
 * @property int $status
 * @property string|null $language
 * @property string|null $address
 * @property string|null $postcode
 * @property string|null $location
 * @property string|null $country
 * @property string|null $voucher
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
            [['username', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['dob', 'starting_date', 'subscription_startingdate', 'created_date'], 'safe'],
            [['status', 'terms_and_conditions', 'gdpr', 'privacy', 'newsletter', 'active', 'created_at', 'updated_at'], 'integer'],
            [['guid', 'username', 'contact_number', 'email', 'nif', 'first_name', 'last_name', 'full_name', 'gender', 'title', 'path', 'image', 'company_code', 'payment_month_fee', 'payment_year_fee', 'offer', 'language', 'address', 'postcode', 'location', 'country', 'voucher', 'password_hash', 'password_reset_token', 'subscription'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
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
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'nif' => 'Nif',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'title' => 'Title',
            'path' => 'Path',
            'dob' => 'Dob',
            'image' => 'Image',
            'company_code' => 'Company Code',
            'starting_date' => 'Starting Date',
            'payment_month_fee' => 'Payment Month Fee',
            'payment_year_fee' => 'Payment Year Fee',
            'offer' => 'Offer',
            'status' => 'Status',
            'language' => 'Language',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'location' => 'Location',
            'country' => 'Country',
            'voucher' => 'Voucher',
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
}
