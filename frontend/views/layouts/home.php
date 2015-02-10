<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use frontend\widgets\Header;
use frontend\widgets\Footer;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= Yii::$app->language ?>" lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name="description" content="Default Description"/>
        <meta name="keywords" content="Varien, E-commerce"/>
        <link href="http://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900,1000&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext" rel="stylesheet" type="text/css"/>
    </head>
    <body class="cms-index-index cms-galabigshop-home adapt-3">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="page one-column">
                <?= Header::widget() ?>
                <?= $content ?>
                <?= Footer::widget() ?>
            </div>
        </div>
        </div>
        <script type="text/javascript">
            //<![CDATA[
            var review = 'Write Your Own Review';
            var isMobile = /iPhone|iPod|iPad|Phone|Mobile|Android|hpwos/i.test(navigator.userAgent);
            var isPhone = /iPhone|iPod|Phone|Android/i.test(navigator.userAgent);
            var product_zoom = null;
            var urlsite = './';
            var PRODUCTSGRID_POSITION_ABSOLUTE = 'masonry';
            var AJAXCART_AUTOCLOSE = 0;
            var FREEZED_TOP_MENU = 1;
            var PRODUCTSGRID_ITEM_WIDTH = 200;
            var PRODUCTSGRID_ITEM_SPACING = 20;
            var CROSSSELL_ITEM_WIDTH = 210;
            var CROSSSELL_ITEM_SPACING = 30;
            var UPSELL_ITEM_WIDTH = 209;
            var UPSELL_ITEM_SPACING = 30;
            var DETAILS_TAB = 1;
            //]]>
        </script>
        <script type="text/javascript">
            var ADAPT_CONFIG = {
                path: "<?= Url::base() ?>/skin/galabigshop/css/",
                dynamic: true,
                range: [
                    '0px    to 760px  = mobile.css',
                    '760px  to 980px  = 720.css',
                    '980px  to 1200px = 960.css',
                    '1200px   		  = 1200.css'
                ]
            };
        </script>
        <?php $this->endBody(); ?>
        <!--[if lt IE 7]>
        <script type="text/javascript">
           //<![CDATA[
               var BLANK_URL = '<?= Url::base() ?>/js/blank.html';
               var BLANK_IMG = '<?= Url::base() ?>/js/spacer.gif';
           //]]>
        </script>
        <![endif]-->
        <!--[if lt IE 8]>
        < link rel = "stylesheet" type = "text/css" href = "<?= Url::base() ?>/skin/default/css/styles-ie.css" media = "all" / >
        < script type = "text/javascript" src = "<?= Url::base() ?>/skin/galabigshop/em_megamenupro/js/ie7.js" ></script>
        <![endif]-->
        <!--[if lt IE 7]>
        <script type="text/javascript" src="<?= Url::base() ?>/js/lib/ds-sleight.js"></script>
        <script type="text/javascript" src="<?= Url::base() ?>/skin/galabigshop/js/ie6.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var urlSkinsite = '<?= Url::base() ?>/skin/galabigshop/';
            LightboxOptions = Object.extend({
                fileLoadingImage: urlSkinsite + 'images/loading.gif',
                fileBottomNavCloseImage: urlSkinsite + 'images/closelabel.png',
                overlayOpacity: 0.8,
                animate: true,
                resizeSpeed: 7,
                borderSize: 10,
                labelImage: "Image",
                labelOf: "of"
            }, window.LightboxOptions || {});
        </script>
        <script type="text/javascript">
            if (typeof EM == 'undefined')
                EM = {};
            EM.QuickShop = {
                BASE_URL: '<?= Url::base() ?>',
                QS_FRM_TYPE: 1,
                QS_FRM_WIDTH: 900,
                QS_FRM_HEIGHT: 650,
                QS_TEXT: 'QUICK SHOP',
                QS_BTN_WIDTH: 96,
                QS_BTN_HEIGHT: 25
            };
            if (EM.QuickShop.QS_FRM_TYPE == 0) {
                EM.QuickShop.QS_FRM_WIDTH = EM.QuickShop.QS_FRM_WIDTH + "%";
                EM.QuickShop.QS_FRM_HEIGHT = EM.QuickShop.QS_FRM_HEIGHT + "%";
            }
        </script>
        </div>
    </body>
</html>
<?php $this->endPage(); ?>