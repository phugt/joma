<?php

namespace console\controllers;

use yii\console\Controller;
use Goutte\Client;
use share\models\Item;

/**
 * Crawl item from jomashop.com
 */
class TestController extends Controller {

    public function actionLock() {
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        $connection->createCommand("START TRANSACTION")->execute();
        $return = $connection->createCommand("SELECT * FROM items ORDER BY updateTime ASC limit 1 FOR UPDATE")->queryAll();
        echo $return[0]['id'] . "\n";
        sleep(1);
        echo $connection->createCommand("UPDATE items set updateTime = " . time() . " WHERE id='" . $return[0]['id'] . "'")->execute();
        $transaction->commit();
    }

    public function actionSelect() {
        $transaction = Item::getDb()->beginTransaction();
        $items = Item::findBySql("SELECT * FROM items ORDER BY updateTime ASC limit 100 FOR UPDATE")->all();
        foreach ($items as $item) {
            echo "{$item->id}\n";
            $item->updateTime = time();
            $item->update(false);
        }
        $transaction->commit();
    }

    public function actionTest() {
        \share\models\Image::download("https://pbs.twimg.com/profile_images/938549302/maria_ozawa.jpg", "1", "1");
    }

}
