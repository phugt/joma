<?php

use yii\helpers\Url;
?>
<div class="wrapper_content">
    <div class="container_24 ">
        <div class="grid_24 em-breadcrumbs">
            <div class="breadcrumbs">
                <ul>
                    <li class="home">
                        <a href="<?= Url::base() ?>" title="Trang chủ">Trang chủ</a>
                        <span class="separator">/ </span>
                    </li>
                    <li class="login">
                        <strong>Đăng nhập</strong>
                    </li>
                </ul>
            </div>
        </div>
        <div class="grid_18 em-main-wrapper">
            <div class="account-login">
                <div class="page-title">
                    <h1>Đăng nhập hoặc Đăng ký tài khoản mới</h1>
                </div>
                <form method="post">
                    <div class="col2-set">
                        <div class="col-1 new-users">
                            <div class="content">
                                <h2>Bạn là khách hàng mới?</h2>
                                <p>Đăng ký là thành viên Joma Shop ngay để việc mua sắm và theo dõi hóa đơn mua hàng của bạn được thuận tiện hơn, cũng như được hưởng các ưu đãi cho khách hàng trung thành của Joma.</p>
                            </div>
                            <div class="buttons-set">
                                <button type="button" title="Đăng ký" class="button" onclick="window.location = '<?= Url::to(['signup']) ?>';"><span><span>Đăng ký thành viên</span></span></button>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <div class="content">
                                <h2>Đã đăng ký</h2>
                                <p>Nếu bạn đã có tài khoản trên Joma Shop, đăng nhập ở đây.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email" class="required"><em>*</em>Địa chỉ email</label>
                                        <div class="input-box">
                                            <input type="text" name="login[username]" class="input-text" title="Email Address">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass" class="required"><em>*</em>Mật khẩu</label>
                                        <div class="input-box">
                                            <input type="password" name="login[password]" class="input-text" title="Password">
                                        </div>
                                    </li>
                                </ul>
                                <p class="required">* Bắt buộc phải nhập</p>
                            </div>
                            <div class="buttons-set">
                                <button type="submit" class="button" title="Đăng nhập" name="send" id="send2"><span><span>Đăng nhập</span></span></button>
                                <a href="./login.html" class="f-left">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid_6 em-col-right em-sidebar">
            <div class="block-banner">
                <div class="widget widget-static-block ">
                    <p class="block">Your account are being protected by</p>
                    <p class="block"><a title="sample_banner" href="#"><img class="fluid" src="<?= Url::base() ?>/media/wysiwyg/banner_ad.png" alt="sample_banner"></a></p>
                    <p><a title="sample_banner" href="#"><img class="fluid" src="<?= Url::base() ?>/media/wysiwyg/banner_login.png" alt="sample_banner"></a></p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>