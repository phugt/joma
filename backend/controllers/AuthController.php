<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use backend\models\Signin;

class AuthController extends Controller {

    public function actionSignin() {
        $form = new Signin();

        if ($form->load(Yii::$app->request->post()) && $form->signIn()) {
            $this->goBack(Url::toRoute('site/index'));
        }

        $this->view->title = 'Đăng nhập trang quản trị Joma Shop';
        $this->layout = 'empty';
        return $this->render('signin', ['form' => $form]);
    }

    public function actionSignout() {
        Yii::$app->user->logout();
        $this->goHome();
    }

}
