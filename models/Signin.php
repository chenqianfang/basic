<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Signin extends ActiveRecord
{
	//private $username;
    //private $password;
    public static function tableName() {
        return '{{login}}';
    }

    public function rules()
    {
        return [
            [['username', 'password' , 'email'], 'required'],
            ['email','email'],
            
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