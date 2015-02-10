<?php

namespace frontend\widgets;

use yii\base\Widget;

class Menu extends Widget {

    public function run() {
        return $this->render('menu');
    }

}
