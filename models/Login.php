<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Login extends ActiveRecord
{
	//private $username;
    //private $password;


    public function rules()
    {
        return [
            [['username', 'password','verifyCode'], 'required'],
  
            ['verifyCode', 'captcha'],   // 验证码
        ];
    }

	public function login()
    {
        if ($this->validate()) {
            return true;
        }
        return false;
    }  
}