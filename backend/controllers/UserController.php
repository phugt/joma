<?php

namespace backend\controllers;

use Yii;
use backend\models\UserSearch;
use yii\web\Controller;
use share\models\User;
use share\models\Province;
use share\models\District;

class UserController extends Controller {

    public function actionIndex() {
        $this->view->title = 'Quản trị người dùng | Joma.vn';
        $search = new UserSearch();
        $search->load(Yii::$app->request->get());

        return $this->render('index', [
                    'model' => $search,
                    'data' => $search->search(),
        ]);
    }

    public function actionUpdate($id) {
        $this->view->title = 'Sửa thông tin người dùng | Joma.vn';

        $this->view->registerJs("var districts=" . \yii\helpers\Json::encode(District::getAll()) . ";", \yii\web\View::POS_END);
        $provinces = ['0' => 'Không rõ'];
        $districts = ['0' => 'Không rõ'];

        foreach (Province::getAll() as $province) {
            $provinces[$province->id] = $province->name;
        }
        foreach (District::getAll() as $district) {
            $districts[$district->id] = $district->name;
        }

        $user = User::findIdentity($id);
        if (!isset($user)) {
            Yii::$app->session->setFlash('error', 'Người dùng không tồn tại, không thể sửa!');
            return $this->redirect(['index']);
        }

        $newUser = new User();
        if ($newUser->load(Yii::$app->request->post())) {
            if ($newUser->validate()) {
                if ($user->email != $newUser->email && User::findByEmail($newUser->email) != null) {
                    $user->addError('email', 'Địa chỉ email đã được sử dụng');
                } else {
                    if (isset($newUser->password) && $newUser->password != '') {
                        $user->password = Yii::$app->security->generatePasswordHash($newUser->password);
                    }

                    $user->phone = $newUser->phone;
                    $user->name = $newUser->name;
                    $user->gender = $newUser->gender;
                    $user->address = $newUser->address;
                    $user->provinceId = $newUser->provinceId;
                    $user->districtId = $newUser->districtId;
                    $user->status = $newUser->status;
                    $user->role = $newUser->role;
                    $user->updateTime = time();

                    if ($user->update(false)) {
                        Yii::$app->session->setFlash('success', 'Sửa thông tin người dùng thành công!');
                    } else {
                        Yii::$app->session->setFlash('error', 'Sửa người dùng thất bại!');
                    }
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('update', ['model' => $newUser, 'provinces' => $provinces, 'districts' => $districts]);
            }
        }

        $user->password = '';
        return $this->render('update', ['model' => $user, 'provinces' => $provinces, 'districts' => $districts]);
    }

    public function actionDelete($id) {
        $user = User::findIdentity($id);
        if (isset($user)) {
            Yii::$app->session->setFlash('success', 'Xóa người dùng thành công!');
            $user->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Người dùng không tồn tại, không thể xóa!');
        }
        $this->redirect(['index']);
    }

}
