<?php

namespace frontend\controllers;

use yii\web\Controller;

class AuthController extends Controller {

    public function actionSignin() {
        return $this->render('signin');
    }

    public function actionSignup() {
        return $this->render('signup');
    }

    public function actionSignout() {
        return $this->goHome();
    }

}
