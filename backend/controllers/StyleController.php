<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use share\models\Style;

class StyleController extends Controller {

    public function actionIndex() {
        $this->view->title = 'Quản trị kiểu đồng hồ | Joma.vn';

        $dataProvider = new ActiveDataProvider([
            'query' => Style::find(),
            'pagination' => [
                'pageSize' => 500
            ],
            'sort' => [
                'defaultOrder' => [
                    'position' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
        ]);
    }

    public function actionNew() {
        $new = new Style();
        if ($new->load(Yii::$app->request->post()) && $new->save()) {
            Yii::$app->session->setFlash('success', 'Thêm kiểu đồng hồ thành công!');
            return $this->redirect(['index']);
        }

        return $this->render('new', ['model' => $new]);
    }

    public function actionUpdate($id) {
        $this->view->title = 'Sửa thông tin kiểu đồng hồ | Joma.vn';

        $old = Style::findOne($id);
        if (!isset($old)) {
            Yii::$app->session->setFlash('error', 'Kiểu đồng hồ không tồn tại, không thể sửa!');
            return $this->redirect(['index']);
        }

        $new = new Style();
        if ($new->load(Yii::$app->request->post())) {
            $new->id = $old->id;
            if ($new->validate()) {
                $old->name = $new->name;
                $old->position = $new->position;
                $old->isActive = $new->isActive;

                $old->update(false);
                Yii::$app->session->setFlash('success', 'Sửa thông tin kiểu đồng hồ thành công!');

                return $this->redirect(['index']);
            } else {
                return $this->render('update', ['model' => $new]);
            }
        }

        return $this->render('update', ['model' => $old]);
    }

    public function actionDelete($id) {
        $old = Style::findOne($id);
        if (isset($old)) {
            Yii::$app->session->setFlash('success', 'Xóa kiểu đồng hồ thành công!');
            $old->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Kiểu đồng hồ không tồn tại, không thể xóa!');
        }
        $this->redirect(['index']);
    }

}
