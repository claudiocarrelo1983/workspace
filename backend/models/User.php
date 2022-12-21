<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $name
 * @property string|null $company
 * @property string|null $level
 * @property string|null $sublevel
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int|null $active
 * @property int|null $terms_and_conditions
 * @property int|null $privacy
 * @property int|null $newsletter
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'active', 'terms_and_conditions', 'privacy', 'newsletter', 'updated_at'], 'integer'],
            [['username', 'first_name', 'last_name', 'name', 'company', 'level', 'sublevel', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
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
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'name' => 'Name',
            'company' => 'Company',
            'level' => 'Level',
            'sublevel' => 'Sublevel',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'active' => 'Active',
            'terms_and_conditions' => 'Terms And Conditions',
            'privacy' => 'Privacy',
            'newsletter' => 'Newsletter',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }
}
