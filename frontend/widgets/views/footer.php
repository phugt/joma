<?php

use yii\helpers\Url;
?>

<!-- //////////////////////////////////
//////////////MAIN FOOTER////////////// 
////////////////////////////////////-->
<footer class="main">
    <div class="footer-top-area">
        <div class="container">
            <div class="row row-wrap">
                <div class="col-md-3">
                    <h4>Tin mới nhất</h4>
                    <ul class="thumb-list">
                        <li>
                            <a href="#">
                                <img src="<?= Url::base() ?>/img/70x70.png" alt="Image Alternative text" title="Urbex Esch/Lux with Laney and Laaaaag" />
                            </a>
                            <div class="thumb-list-item-caption">
                                <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                <h5 class="thumb-list-item-title"><a href="#">Adipiscing magna</a></h5>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?= Url::base() ?>/img/70x70.png" alt="Image Alternative text" title="AMaze" />
                            </a>
                            <div class="thumb-list-item-caption">
                                <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                <h5 class="thumb-list-item-title"><a href="#">Euismod ullamcorper</a></h5>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?= Url::base() ?>/img/70x70.png" alt="Image Alternative text" title="The Hidden Power of the Heart" />
                            </a>
                            <div class="thumb-list-item-caption">
                                <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                <h5 class="thumb-list-item-title"><a href="#">Torquent molestie</a></h5>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Nhận thông tin khuyến mại mới nhất từ Joma Shop</h4>
                    <div class="box">
                        <form>
                            <div class="form-group mb10">
                                <label>Địa chỉ email của bạn</label>
                                <input type="text" class="form-control" />
                            </div>
                            <p class="mb10">Nhập địa chỉ email của bạn để chúng tôi có thể gửi cho bạn những thông tin khuyến mại hấp dẫn</p>
                            <input type="submit" class="btn btn-primary" value="Đăng ký" />
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fb-like-box" data-href="https://www.facebook.com/pages/Jomavn/714672425275625?fref=ts" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright © 2014, Joma Shop, All Rights Reserved</p>
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <div class="pull-right">
                        <ul class="list-inline list-payment">
                            <li>
                                <img src="<?= Url::base() ?>/img/payment/american-express-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                            </li>
                            <li>
                                <img src="<?= Url::base() ?>/img/payment/mastercard-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                            </li>
                            <li>
                                <img src="<?= Url::base() ?>/img/payment/visa-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //////////////////////////////////
//////////////END MAIN  FOOTER///////// 
////////////////////////////////////-->