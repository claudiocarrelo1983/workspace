<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public $password;

    public $surname;

    public $text;

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
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['surname','text'],'string'],
            [
                ['sheddule_array',
                    'monday_starting_hour','monday_end_hour','monday_starting_break','monday_end_break','monday_open_checkbox',
                    'tuesday_starting_hour','tuesday_end_hour','tuesday_starting_break','tuesday_end_break','tuesday_open_checkbox',
                    'wednesday_starting_hour','wednesday_end_hour','wednesday_starting_break','wednesday_end_break','wednesday_open_checkbox',
                    'thursday_starting_hour','thursday_end_hour','thursday_starting_break','thursday_end_break','thursday_open_checkbox',
                    'friday_starting_hour','friday_end_hour','friday_starting_break','friday_end_break','friday_open_checkbox',
                    'saturday_starting_hour','saturday_end_hour','saturday_starting_break','saturday_end_break','saturday_open_checkbox',
                    'sunday_starting_hour','sunday_end_hour','sunday_starting_break','sunday_end_break','sunday_open_checkbox'
                ], 
            'string'],
        ];
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

    public function defaultSheddulle($model)
    {

        $weekDays = array('monday', 'tuesday', 'wednesday','thursday','friday', 'saturday','sunday');

        foreach($weekDays as $dayWeek){

            $sh = $dayWeek.'_starting_hour';
            $eh = $dayWeek.'_end_hour';
            $bs = $dayWeek.'_starting_break';
            $be = $dayWeek.'_end_break';                

            $model->$sh = strtotime('9:00');
            $model->$eh = strtotime('18:00');
            $model->$bs = strtotime('12:00');
            $model->$be = strtotime('13:00');          
   
        }

    }
}
