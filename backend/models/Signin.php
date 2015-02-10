<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use share\models\User;

class Signin extends Model {

    public $email;
    public $password;
    public $remember = false;

    public function rules() {
        return [
            ['email', 'email'],
            [['email', 'password'], 'required'],
            ['remember', 'boolean'],
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'remember' => 'Ghi nhớ'
        ];
    }

    public function signIn() {
        if ($this->validate()) {
            $user = User::findByEmail($this->email);
            if (isset($user)) {
                if ($user->validatePassword($this->password)) {
                    return Yii::$app->user->login($user, $this->remember ? 3600 * 24 * 30 : 0);
                } else {
                    $this->addError('password', 'Sai mật khẩu');
                }
            } else {
                $this->addError('email', 'Tài khoản không tồn tại hoặc bị khóa');
            }
        }
        return false;
    }

}
