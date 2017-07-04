<?php

namespace app\common;
use Yii;

class Common
{
    public static function hashMD5($password){
        return sha1($password,false);
    }
}