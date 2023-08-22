<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\Helpers\Helpers;

/**
 * Login form
 */
class LoginForm extends Model
{
    const LEVEL_ATIVE = 'admin';
    public $username;
    public $password;

    public $field;

    public $voucher;

    public $voucher_parent;

    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            ['field', 'string'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],    
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $user = $this->getUser();  
        
        $page = Helpers::decrypt($this->field,10);

        /*
        if(!empty($user->voucher_parent)){
            $userFound = User::findOne(['voucher' => $user->voucher_parent]);

            if(empty($userFound)){
                $this->addError($attribute, 'Voucher not found.');  
            }
    
            if(isset($userFound->status)){
                if($userFound->status != '10'){                  
                    $this->addError($attribute, 'Voucher not valid please speak with who gave you.');  
                }
            }   
        }
        */       

        if(isset($user->level)){
            if($page == 'frontend' && $user->level == 'client'){                       
                $this->addError($attribute, 'You have no permission'); 
            }    

            if($page == 'client' && $user->level == 'admin'){                       
                $this->addError($attribute, 'You have no permission'); 
            }
        }

        if(isset($user->status)){
            if (strtolower($user->status) !== '10') {        
                $this->addError($attribute, 'Please check the validation email.');          
            }
        }

      /*
        if(isset($user->status) && isset($user->level)){
            if (strtolower($user->status) !== '10') {        
                $this->addError($attribute, 'You have no permission');          
            }

            if (strtolower($user->level) !== '10') {        
                $this->addError($attribute, 'You have no permission');          
            }
        }

        //$decrypt = Helpers::decrypt($model->field, '10');
       

      
       
        if(isset($user->level)){
            if (strtolower($user->level) !== 'admin') {        
                $this->addError($attribute, 'You have no permission');          
           }
        }
      
        if(isset($user->active)){
            if ($user->active == false) {        
                $this->addError($attribute, 'You user is not active.');          
        }
        }
        */

        if (!$this->hasErrors()) {      
          
            if (!$user || !$user->validatePassword($this->password)) {
          
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
   
        if ($this->validate()) {   
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
    
        if ($this->_user === null) {
            $this->_user = User::findOne(['username' => $this->username]);
        }

        return $this->_user;
    }
}
