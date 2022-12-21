<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $name
 * @property string|null $email
 * @property string|null $dob
 * @property string|null $company
 * @property string|null $gender
 * @property string|null $level
 * @property string|null $sublevel
 * @property string|null $contact_number
 * @property string|null $auth_key
 * @property string|null $password_hash
 * @property string|null $password_reset_token
 * @property int|null $active
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
            [['dob', 'created_date'], 'safe'],
            [['active'], 'integer'],
            [['first_name'], 'required'],
            [['username', 'first_name', 'last_name', 'name', 'email', 'company', 'level', 'sublevel', 'contact_number', 'auth_key', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
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
            'email' => 'Email',
            'dob' => 'Dob',
            'company' => 'Company',
            'gender' => 'Gender',
            'level' => 'Level',
            'sublevel' => 'Sublevel',
            'contact_number' => 'Contact Number',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
