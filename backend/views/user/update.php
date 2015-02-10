<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJsFile('@web/js/location-select.js', ['depends' => ['yii\web\YiiAsset']]);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin người dùng</h1>
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
                <div class="panel-heading">Nhập thông tin người dùng cần thay đổi</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin();
                            ?>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'email') ?>
                                <?= $form->field($model, 'password')->hint("Nhập nếu muốn thay đổi, bỏ trống nếu giữ nguyên") ?>
                                <?= $form->field($model, 'phone') ?>
                                <?= $form->field($model, 'status')->dropDownList(['-1' => 'Tất cả', '0' => 'Chưa kích hoạt', '1' => 'Đang hoạt động', '2' => 'Bị khóa']) ?>
                                <?= $form->field($model, 'role')->dropDownList(['0' => 'Người dùng', '1' => 'Quản trị', '2' => 'Nhân viên']) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'name') ?>
                                <?= $form->field($model, 'gender')->dropDownList(['0' => 'Không xác định', '1' => 'Nam', '2' => 'Nữ']) ?>
                                <?= $form->field($model, 'address') ?>
                                <?= $form->field($model, 'provinceId', ['inputOptions' => ['for' => 'province']])->dropDownList($provinces) ?>
                                <?= $form->field($model, 'districtId', ['inputOptions' => ['for' => 'district']])->dropDownList($districts) ?>
                            </div>
                            <div class="col-lg-12">
                                <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Quay lại danh sách', Url::to(['index']), ['class' => 'btn btn-default']) ?>
                            </div>
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
</div>