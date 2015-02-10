<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use share\models\Item;

class ItemController extends Controller {

    public function actionIndex() {
        $this->view->title = 'Quản trị sản phẩm | Joma.vn';

        $dataProvider = new ActiveDataProvider([
            'query' => Item::find(),
            'pagination' => [
                'pageSize' => 500
            ],
            'sort' => [
                'defaultOrder' => [
                    'updateTime' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
        ]);
    }

    public function actionNew() {
        $new = new Item();
        if ($new->load(Yii::$app->request->post()) && $new->save()) {
            Yii::$app->session->setFlash('success', 'Thêm sản phẩm thành công!');
            return $this->redirect(['index']);
        }

        return $this->render('new', ['model' => $new]);
    }

    public function actionUpdate($id) {
        $this->view->title = 'Sửa thông tin sản phẩm | Joma.vn';

        $old = Item::findOne($id);
        if (!isset($old)) {
            Yii::$app->session->setFlash('error', 'Sản phẩm không tồn tại, không thể sửa!');
            return $this->redirect(['index']);
        }

        $new = new Item();
        if ($new->load(Yii::$app->request->post())) {
            $new->id = $old->id;
            if ($new->validate()) {
                $old->name = $new->name;
                $old->position = $new->position;
                $old->isActive = $new->isActive;

                $old->update(false);
                Yii::$app->session->setFlash('success', 'Sửa thông tin sản phẩm thành công!');

                return $this->redirect(['index']);
            } else {
                return $this->render('update', ['model' => $new]);
            }
        }

        return $this->render('update', ['model' => $old]);
    }

    public function actionDelete($id) {
        $old = Item::findOne($id);
        if (isset($old)) {
            Yii::$app->session->setFlash('success', 'Xóa sản phẩm thành công!');
            $old->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Sản phẩm không tồn tại, không thể xóa!');
        }
        $this->redirect(['index']);
    }

}
