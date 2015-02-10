<?php

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php $this->beginBody() ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đăng Nhập</h3>
                        </div>
                        <div class="panel-body">
                            <?= Html::beginForm() ?>
                            <fieldset>
                                <div class="form-group <?= $form->hasErrors('email') ? 'has-error' : '' ?>">
                                    <?= Html::activeTextInput($form, 'email', array('class' => 'form-control', 'placeholder' => 'Địa chỉ email')); ?>
                                    <?= Html::error($form, 'email', ['class' => 'help-block']) ?>
                                </div>
                                <div class="form-group <?= $form->hasErrors('password') ? 'has-error' : '' ?>">
                                    <?= Html::activePasswordInput($form, 'password', array('class' => 'form-control', 'placeholder' => 'Mật khẩu')); ?>
                                    <?= Html::error($form, 'password', ['class' => 'help-block']) ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <?= Html::activeCheckBox($form, 'remember') ?>
                                    </label>
                                </div>
                                <input name="submit" type="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập"/>
                            </fieldset>
                            <?= Html::endForm() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>