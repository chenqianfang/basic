<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Signin;
use app\models\Contact;
use app\models\UploadFrom;
use yii\web\UploadedFile;
use app\common\Common;

class SiteController extends Controller
{
   
    //验证码
    public function actions()
    {
        return [
             'captcha' => [
                  'class' => 'yii\captcha\CaptchaAction',
                  'maxLength' => 5,
                  'minLength' => 5
             ],
         ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index', 'signin','lognin','contact'],
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    return $q->from('user')->max('updated_at');
                    },
            ],
        ];
    }

	public $layout = 'common';
	
	 public function actionIndex()
    {
        return $this->render('index'); //content
    }

    public function actionUpload()
    {
    
        $model = new UploadFrom();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 
                'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                return $this->render('uploadsucc');
            }else{
            	return $this->render('uploadfail');
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    

     public function actionContact()
    {
        $model = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
     public function actionAbout()
    {
        return $this->render('about'); //content
    }

    //登录
     public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $username = $model->username;
            $password = $model->password;
            
            $query = Login::find()
            ->where('username = :username and password = :password',[':username' => $username,':password' => Common::hashMD5($password)]);
            $count = $query->count();
            if($count == 0){
               return $this->render('fail'); 
            }else{
               return $this->render('success'); 
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    //第一种注册
    public function actionSignin(){
        $model = new Signin();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $sign = new Signin();
            $sign->username = $model->username;
             
            $newpassword = $model->password;

            $sign->password = Common::hashMD5($newpassword);
            
            $sign->email = $model->email;
            if($sign->save()){
                return $this->render('signsucc',['model' => $sign]);
            }else{
                return $this->render('signfail');
            }
        }
        return $this->render('signin', [
            'model' => $model,
        ]);

    }
    
}