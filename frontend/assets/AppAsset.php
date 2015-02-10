<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300',
        'http://fonts.googleapis.com/css?family=Roboto:400,100,300',
        'css/styles.css',
        'css/mystyles.css',
    ];
    public $js = [
        'js/jquery-migrate-1.2.1.js',
        'js/countdown.min.js',
        'js/flexnav.min.js',
        'js/magnific.js',
        'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',
        'js/fitvids.min.js',
        'js/ionrangeslider.js',
        'js/icheck.js',
        'js/fotorama.js',
        'js/card-payment.js',
        'js/owl-carousel.js',
        'js/masonry.js',
        'js/nicescroll.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];

}
