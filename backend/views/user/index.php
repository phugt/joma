<?php

use share\models\User;
use share\models\District;
use share\models\Province;
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\grid\Column;
use yii\grid\ActionColumn;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách người dùng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tìm kiếm người dùng</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin(['method' => 'GET', 'action' => Url::to([Yii::$app->controller->route])]);
                            ?>
                            <div class="col-lg-3">
                                <?= $form->field($model, 'email') ?>
                            </div>
                            <div class="col-lg-3">
                                <?= $form->field($model, 'phone') ?>
                            </div>
                            <div class="col-lg-3">
                                <?= $form->field($model, 'name') ?>
                            </div>
                            <div class="col-lg-3">
                                <?= $form->field($model, 'status')->dropDownList(['-1' => 'Tất cả', '0' => 'Chưa kích hoạt', '1' => 'Đang hoạt động', '2' => 'Bị khóa']) ?>
                            </div>
                            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Làm lại', Url::to([Yii::$app->controller->route]), ['class' => 'btn btn-default']) ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <?php

                function displayInfo($model) {
                    $district = District::getById($model->districtId);
                    $dis = '';
                    if (isset($district)) {
                        $dis.=', ' . $district->name;
                    }

                    $province = Province::getById($model->provinceId);
                    $pro = '';
                    if (isset($province)) {
                        $pro.=', ' . $province->name;
                    }
                    $status = 'Chưa kích hoạt';
                    if ($model->status == User::STATUS_ACTIVE) {
                        $status = 'Đang hoạt động';
                    }
                    if ($model->status == User::STATUS_BANNED) {
                        $status = 'Đang bị khóa';
                    }

                    return "<p><strong>Tên thật:</strong> {$model->name}</p>"
                            . "<p><strong>Email:</strong> {$model->email}</p>"
                            . "<p><strong>Điện thoại:</strong> {$model->phone}</p>"
                            . "<p><strong>Địa chỉ:</strong> {$model->address}{$dis}{$pro}</p>"
                            . "<p><strong>Trạng thái:</strong> {$status}</p>";
                }

                echo GridView::widget([
                    'dataProvider' => $data,
                    'columns' => [
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'id',
                            'format' => 'text',
                            'label' => 'ID',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'class' => Column::className(),
                            'header' => 'Thông tin',
                            'content' => 'displayInfo'
                        ],
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'joinTime',
                            'format' => ['date', 'php:H:i:s d/m/Y'],
                            'label' => 'Ngày tham gia',
                        ],
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'activeTime',
                            'format' => ['date', 'php:H:i:s d/m/Y'],
                            'label' => 'Đăng nhập lần cuối',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'contentOptions' => ['class' => 'text-center'],
                            'template' => '{update} {delete}',
                        ]
                    ],
                ])
                ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>