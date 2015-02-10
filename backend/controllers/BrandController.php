<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use share\models\Brand;

class BrandController extends Controller {

    public function actionIndex() {
        $this->view->title = 'Quản trị Thương hiệu | Joma.vn';

        $dataProvider = new ActiveDataProvider([
            'query' => Brand::find(),
            'pagination' => [
                'pageSize' => 500
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
        ]);
    }

    public function actionNew() {
        $new = new Brand();
        if ($new->load(Yii::$app->request->post()) && $new->save()) {
            Yii::$app->session->setFlash('success', 'Thêm Thương hiệu thành công!');
            return $this->redirect(['index']);
        }

        return $this->render('new', ['model' => $new]);
    }

    public function actionUpdate($id) {
        $this->view->title = 'Sửa thông tin Thương hiệu | Joma.vn';

        $old = Brand::findOne($id);
        if (!isset($old)) {
            Yii::$app->session->setFlash('error', 'Thương hiệu không tồn tại, không thể sửa!');
            return $this->redirect(['index']);
        }

        $new = new Brand();
        if ($new->load(Yii::$app->request->post())) {
            $new->id = $old->id;
            if ($new->validate()) {
                $old->name = $new->name;
                $old->isActive = $new->isActive;

                $old->update(false);
                Yii::$app->session->setFlash('success', 'Sửa thông tin Thương hiệu thành công!');

                return $this->redirect(['index']);
            } else {
                return $this->render('update', ['model' => $new]);
            }
        }

        return $this->render('update', ['model' => $old]);
    }

    public function actionDelete($id) {
        $old = Brand::findOne($id);
        if (isset($old)) {
            Yii::$app->session->setFlash('success', 'Xóa Thương hiệu thành công!');
            $old->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Thương hiệu không tồn tại, không thể xóa!');
        }
        $this->redirect(['index']);
    }

}
