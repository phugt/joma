<?php

use yii\helpers\Url;
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= Url::toRoute('site/index') ?>">Trang quản trị JomaShop</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-shopping-cart fa-fw"></i> 99 đơn hàng mới
                            <span class="pull-right text-muted small">1 phút trước</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-support fa-fw"></i> 3 đơn hàng chờ chăm sóc
                            <span class="pull-right text-muted small">12 phút trước</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-money fa-fw"></i> 10 đơn hàng mới tt
                            <span class="pull-right text-muted small">14 phút trước</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> 2 kiện hàng về chậm
                            <span class="pull-right text-muted small">20 phút trước</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Xem tất cả thông báo</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?= Url::toRoute('auth/profile') ?>"><i class="fa fa-user fa-fw"></i> Hồ sơ</a>
                </li>
                <li><a href="<?= Url::toRoute('auth/setting') ?>"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= Url::toRoute('auth/signout') ?>"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= Url::toRoute('site/index') ?>"><i class="fa fa-dashboard fa-fw"></i> Tổng quan</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Giao dịch<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= Url::toRoute('index/order') ?>">Đơn hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('index/sales') ?>">Bán hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('index/import') ?>">Mua hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('index/stock') ?>">Hàng về</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('index/delivery') ?>">Giao hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('index/issue') ?>">Rủi ro</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-tasks fa-fw"></i> Nội dung<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= Url::toRoute('style/index') ?>">Phân loại</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('brand/index') ?>">Thương hiệu</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('item/index') ?>">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('menu/index') ?>">Menu chính</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('homemenu/index') ?>">Menu trang chủ</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('homebanner/index') ?>">Banner trang chủ</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('homeitem/index') ?>">Sản phẩm trang chủ</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Khách hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= Url::toRoute('customer/index') ?>">Danh sách</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('contact/index') ?>">Liên hệ</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('customercare/index') ?>">Chăm sóc</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('email/index') ?>">Gửi email</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('sms/delivery') ?>">Gửi sms</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= Url::toRoute('stats/transaction') ?>">Doanh số</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('stats/sales') ?>">Bán hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('stats/customer') ?>">Khách hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('stats/issue') ?>">Rủi ro</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('stats/delivery') ?>">Giao hàng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('stats/content') ?>">Nội dung</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-cogs fa-fw"></i> Hệ thống<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= Url::toRoute('user/index') ?>">Người dùng</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('role/index') ?>">Phân quyền</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('log/index') ?>">Lịch sử hoạt động</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>