<?php

use \Yii;
use yii\helpers\Url;
use share\models\Style;
?>
<!-- //////////////////////////////////
//////////////MAIN HEADER///////////// 
////////////////////////////////////-->
<div class="top-main-area">
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <a href="<?= Url::base() ?>/" class="logo mt5">
                    <img src="<?= Url::base() ?>/img/logo-small-dark.png" alt="Joma Shop" title="Joma Shop" />
                </a>
            </div>
            <div class="col-md-7 col-md-offset-3 hidden-sm hidden-xs">
                <div class="pull-right col-md-12">
                    <ul class="header-features">
                        <li class="col-md-4"><i class="fa fa-phone"></i>
                            <div class="header-feature-caption">
                                <h5 class="header-feature-title">0999-999-999</h5>
                                <p class="header-feature-sub-title">đường dây nóng 24/7</p>
                            </div>
                        </li>
                        <li class="col-md-4"><i class="fa fa-truck"></i>
                            <div class="header-feature-caption">
                                <h5 class="header-feature-title">giao hãng miễn phí</h5>
                                <p class="header-feature-sub-title">vận chuyển toàn quốc</p>
                            </div>
                        </li>
                        <li class="col-md-4"><i class="fa fa-asterisk"></i>
                            <div class="header-feature-caption">
                                <h5 class="header-feature-title">hàng chính hãng</h5>
                                <p class="header-feature-sub-title">100% nhập khẩu từ Mỹ</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
                <nav>
                    <ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
                        <li class="active"><a href="<?= Url::base() ?>/">Trang chủ</a></li>
                        <li><a href="<?= Url::to(['product/browse']) ?>">Sản phẩm</a>
                            <ul>
                                <?php foreach (Style::getAll() as $style) { ?>
                                    <li><a href="<?= Url::to(['product/browse', 'style' => $style->id]) ?>"><?= $style->name ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="<?= Url::to(['news/browse']) ?>">Tin tức</a></li>
                        <li><a href="<?= Url::to(['site/about']) ?>">Giới thiệu</a></li>
                        <li><a href="<?= Url::to(['site/contact']) ?>">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <ul class="login-register">
                    <li class="shopping-cart"><a href="<?= Url::to(['order/cart']) ?>"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
                        <div class="shopping-cart-box">
                            <ul class="shopping-cart-items">
                                <li>
                                    <a><h5>Bạn chưa chọn mua sản phẩm nào</h5></a>
                                </li>
                            </ul>
                            <ul class="list-inline text-center">
                                <li><a href="<?= Url::to(['order/cart']) ?>"><i class="fa fa-shopping-cart"></i> Xem giỏ hàng</a>
                                </li>
                                <li><a href="<?= Url::to(['order/checkout']) ?>"><i class="fa fa-check-square"></i> Thanh toán</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="popup-text" href="#login-dialog" data-effect="mfp-move-from-top"><i class="fa fa-sign-in"></i>Đăng nhập</a>
                    </li>
                    <li><a class="popup-text" href="#register-dialog" data-effect="mfp-move-from-top"><i class="fa fa-edit"></i>Đăng ký</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- SEARCH AREA -->
<form class="search-area form-group search-area-white">
    <div class="container">
        <div class="row">
            <div class="col-md-11 clearfix">
                <label><i class="fa fa-search"></i><span>Tôi muốn tìm</span>
                </label>
                <div class="search-area-division search-area-division-input">
                    <input class="form-control" type="text" placeholder="Nhập từ khóa..." />
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-block btn-white search-btn" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>
</form>
<!-- END SEARCH AREA -->

<div class="gap"></div>
<!-- //////////////////////////////////
//////////////END MAIN HEADER////////// 
////////////////////////////////////-->

<!-- LOGIN REGISTER LINKS CONTENT -->
<div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="fa fa-sign-in dialog-icon"></i>
    <h3>Đăng nhập</h3>
    <h5>Xin chào, mời bạn điền thông tin đăng nhập</h5>
    <form class="dialog-form">
        <div class="form-group">
            <label>Địa chỉ email</label>
            <input type="text" placeholder="Nhập địa chỉ email của bạn" class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" placeholder="Mật khẩu của bạn" class="form-control">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox">Tự đăng nhập lần sau
            </label>
        </div>
        <input type="submit" value="Đăng nhập" class="btn btn-primary">
    </form>
    <ul class="dialog-alt-links">
        <li><a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out">Đăng ký thành viên</a>
        </li>
        <li><a class="popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out">Quên mật khẩu</a>
        </li>
    </ul>
</div>


<div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="fa fa-edit dialog-icon"></i>
    <h3>Đăng ký</h3>
    <h5>Trở thành thành viên của Joma Shop để mua hàng thuận tiện và nhận nhiều ưu đãi!</h5>
    <form class="dialog-form">
        <div class="form-group">
            <label>Địa chỉ email</label>
            <input type="text" placeholder="Nhập địa chỉ email của bạn" class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" placeholder="Mật khẩu của bạn" class="form-control">
        </div>
        <div class="form-group">
            <label>Gõ lại mật khẩu</label>
            <input type="password" placeholder="Gõ lại mật khẩu của bạn" class="form-control">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" placeholder="Số điện thoại di động của bạn" class="form-control">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox">Tôi muốn nhận thông báo từ Joma Shop
            </label>
        </div>
        <input type="submit" value="Đăng ký" class="btn btn-primary">
    </form>
    <ul class="dialog-alt-links">
        <li><a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out">Đăng nhập</a>
        </li>
    </ul>
</div>


<div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="icon-retweet dialog-icon"></i>
    <h3>Lấy lại mật khẩu</h3>
    <h5>Bạn quên mật khẩu? Nhập thông tin dưới đây để được hỗ trợ</h5>
    <form class="dialog-form">
        <div class="form-group">
            <label>Địa chỉ email</label>
            <input type="text" placeholder="Địa chỉ email của bạn" class="form-control">
        </div>
        <input type="submit" value="Lấy lại mật khẩu" class="btn btn-primary">
    </form>
</div>
<!-- END LOGIN REGISTER LINKS CONTENT -->
