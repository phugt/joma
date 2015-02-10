<?php

namespace backend\controllers;

use Yii;
use \yii\web\Controller;
use yii\helpers\Url;

class SiteController extends Controller {

    public function actionIndex() {
        $this->view->title = 'Trang quản trị Joma Shop';
        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::toRoute('auth/signin'));
        }
        return $this->render('index');
    }

}
