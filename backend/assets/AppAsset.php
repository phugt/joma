<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/sb-admin-2.css',
        'css/plugins/dataTables.bootstrap.css',
        'css/plugins/morris.css',
        'css/plugins/social-buttons.css',
        'css/plugins/timeline.css',
        'css/plugins/metisMenu.css',
    ];
    public $js = [
        'js/plugins/metisMenu/metisMenu.js',
        'js/plugins/morris/raphael.min.js',
        'js/plugins/morris/morris.min.js',
        'js/plugins/bootbox.js',
        'js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];

}
