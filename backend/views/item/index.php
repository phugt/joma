<?php

use yii\grid\GridView;
use yii\grid\Column;
use yii\grid\DataColumn;
use yii\grid\ActionColumn;
use yii\helpers\Url;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
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
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <?php

                function displayActive($model) {
                    $status = '';
                    if ($model->isActive) {
                        $status.= '<span class="label label-success">Đang kích hoạt</span>';
                    } else {
                        $status.= '<span class="label label-danger">Không kích hoạt</span>';
                    }
                    if ($model->isComplete) {
                        $status.= '<br/><span class="label label-success">Đã crawl chi tiết</span>';
                    } else {
                        $status.= '<br/><span class="label label-danger">Chưa crawl chi tiết</span>';
                    }
                    return $status;
                }

                echo GridView::widget([
                    'dataProvider' => $data,
                    'columns' => [
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'id',
                            'format' => 'text',
                        ],
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'name',
                            'format' => 'text',
                        ],
                        [
                            'class' => Column::className(),
                            'header' => 'Kích hoạt',
                            'content' => 'displayActive'
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'header' => '<a href="' . Url::to(['new']) . '" class="btn btn-success">Thêm mới</a>',
                            'headerOptions' => ['class' => 'text-center'],
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