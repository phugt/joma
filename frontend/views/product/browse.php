<?php

use yii\helpers\Url;

$this->registerJsFile('@web/js/product-browse.js', ['depends' => ['yii\web\YiiAsset']]);
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="sidebar-left">
                <ul class="nav nav-tabs nav-stacked nav-coupon-category">
                    <?php foreach ($styles as $s) { ?>
                        <li <?= isset($style) ? ($s->id == $style->id ? 'class="active"' : '') : '' ?>>
                            <a href="<?= Url::to(['product/browse', 'style' => $s->id]) ?>"><?= $s->name ?>
                                <span>(<?= $s->countItem($styleCounts) ?>)</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="sidebar-box">
                    <h5>Tìm theo giá</h5>
                    <input type="text" id="price-slider">
                </div>
                <div class="sidebar-box">
                    <h5>Lọc theo giới tính</h5>
                    <ul class="checkbox-list">
                        <li class="checkbox">
                            <label><input name="gender" type="radio" class="i-check">Tất cả</label>
                        </li>
                        <li class="checkbox">
                            <label><input name="gender" type="radio" class="i-check">Đồng hồ nam</label>
                        </li>
                        <li class="checkbox">
                            <label><input name="gender" type="radio" class="i-check">Đồng hồ nữ</label>
                        </li>
                        <li class="checkbox">
                            <label><input name="gender" type="radio" class="i-check">Unisex</label>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-box">
                    <h5 id="brand-filter">Thương hiệu<i class="fa fa-bars pull-right visible-sm visible-xs"></i></h5>
                    <ul class="checkbox-list hidden-sm hidden-xs">
                        <?php foreach ($brands as $b) { ?>
                            <?php if ($b->countItem($brandCounts) > 0) { ?>
                                <li class="checkbox">
                                    <label><input type="checkbox" class="i-check"><?= $b->name ?><span style="font-size: 10px" class="text-muted">&nbsp;(<?= $b->countItem($brandCounts) ?>)</span></label>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>

                </div>
            </aside>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-sort">
                        <span class="product-sort-selected">Sắp xếp theo <b>Hàng mới về</b></span>
                        <a href="#" class="product-sort-order fa fa-angle-down"></a>
                        <ul>
                            <li><a href="#">Hàng mới về</a>
                            </li>
                            <li><a href="#">Giá rẻ nhất</a>
                            </li>
                            <li><a href="#">Xem nhiều nhất</a>
                            </li>
                            <li><a href="#">Mua nhiều nhất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-7">
                    <div class="product-view pull-right">
                        <a class="fa fa-th-large active" href="#"></a>
                        <a class="fa fa-list" href="category-page-thumbnails-shop-horizontal.html"></a>
                    </div>
                </div>
            </div>
            <div class="row row-wrap">
                <?php foreach ($items as $item) { ?>
                    <div class="col-md-4">
                        <div class="product-thumb">
                            <header class="product-header">
                                <img src="<?= $item->getThumb($images) ?>" alt="<?= $item->name ?>" title="<?= $item->name ?>" />
                            </header>
                            <div class="product-inner">
                                <h5 class="product-title"><?= \yii\helpers\StringHelper::truncate($item->name, 32) ?></h5>
                                <div class="product-meta">
                                    <ul class="product-price-list">
                                        <li><span class="product-price">$<?= $item->sellPrice ?></span>
                                        </li>
                                        <li><span class="product-old-price">$<?= $item->startPrice ?></span>
                                        </li><br/>
                                        <li><span class="product-save">Save 42%</span>
                                        </li>
                                    </ul>
                                    <ul class="product-actions-list">
                                        <li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
                                        </li>
                                        <li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <ul class="pagination">
                <li class="prev disabled">
                    <a href="#"></a>
                </li>
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li class="next">
                    <a href="#"></a>
                </li>
            </ul>
            <div class="gap"></div>
        </div>
    </div>

</div>