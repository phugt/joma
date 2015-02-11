<?php

namespace console\controllers;

use yii\console\Controller;
use Goutte\Client;
use share\models\Item;
use share\models\Brand;
use share\models\Style;
use share\models\Image;
use Yii;
use yii\helpers\Json;
use share\components\TextUtils;

/**
 * Crawl item from jomashop.com
 */
class JomashopController extends Controller {

    public $client;
    public $itemCount = 0;
    public $pageItemCount;
    public $pageSize = 100;
    public $pageIndex = 0;
    public $tmpItem;
    public $tmpImages;

    public function init() {
        parent::init();
        $this->client = new Client();
    }

    public function actionList() {
        while (true) {
            echo "Get more 100 item...\n";
            $crawler = $this->client->request('GET', 'http://search.jomashop.com/search?p=Q&srid=S1-USWSD01&lbc=jomashop&ts=ajax&w=*&uid=561361982&cnt=' . $this->pageSize . '&method=and&isort=date&view=grid&srt=' . $this->pageSize * $this->pageIndex);
            $this->pageItemCount = 0;
            $crawler->filter('b > a')->each(function ($node) {
                $this->itemCount++;
                $this->pageItemCount++;
                $url = $node->attr('href');
                $url = explode("&", $url)[4];
                $url = explode("=", $url)[1];
                $url = urldecode($url);

                $item = Item::findOne(['sourceUrl' => $url]);
                if (isset($item)) {
                    $item->listTime = time();
                    $item->update(false);

                    echo "Updated {$item->id}: {$item->sourceUrl}, total {$this->itemCount} items.\n";
                } else {
                    $item = new Item();
                    $item->sourceId = "jomashop";
                    $item->sourceUrl = $url;
                    $item->isActive = true;
                    $item->isComplete = false;
                    $item->listTime = time();
                    $item->insert(false);

                    echo "Added {$item->id}: {$item->sourceUrl}, total {$this->itemCount} items.\n";
                }
            });
            if ($this->pageItemCount == 0) {
                echo "End with total {$this->itemCount} items!";
                break;
            }
            $this->pageIndex++;
        }
    }

    public function actionDetail() {
        echo "Running: " . Yii::$app->cache->get('joma_detail_running') . "\n";
        if (Yii::$app->cache->get('joma_detail_running') == 'true') {
            return;
        }

        Yii::$app->cache->set('joma_detail_running', 'true');

        try {
            $items = Item::findBySql("SELECT * FROM items WHERE isActive = true AND sourceId ='jomashop' AND listTime >= " . ( time() - (72 * 3600)) . " ORDER BY updateTime, listTime")->all();

            foreach ($items as $item) {
                try {
                    echo "Geting detail of: {$item->sourceUrl}\n";
                    $crawler = $this->client->request('GET', $item->sourceUrl);
                    $item->name = $crawler->filter("div.breadcrumb-name-one-up > h1.htag-name")->text();
                    $item->detail = $crawler->filter("div#fragment-1")->html();
                    $item->startPrice = doubleval(preg_replace('/[\$,]/', '', $crawler->filter('span.price-cell-r')->getNode(0)->textContent));
                    $item->shippingFee = doubleval(preg_replace('/[\$,]/', '', $crawler->filter('span.price-cell-r')->getNode(2)->textContent));
                    $item->sellPrice = doubleval(preg_replace('/[\$,]/', '', $crawler->filter('span.price-cell-r')->getNode(3)->textContent));
                    $item->isAvailable = true;
                    try {
                        if ($crawler->filter('span.availability-out-stock-text')->text() == 'OUT OF STOCK') {
                            $item->isAvailable = false;
                        }
                    } catch (\InvalidArgumentException $ex) {
                        
                    }
                    $this->tmpImages = [];
                    $crawler->filter('div#big_images_holder img')->each(function($node) {
                        $this->tmpImages[] = $node->attr('src');
                    });
                    $this->tmpItem = $item;
                    $crawler->filter('div#fragment-1 tr')->each(function($node) {
                        try {
                            $key = $node->filter('td')->getNode(0)->textContent;
                            $value = $node->filter('td')->getNode(1)->textContent;
                            if (TextUtils::createAlias($key) == 'brand') {
                                $brand = Brand::getById(TextUtils::createAlias($value));
                                if ($brand != null) {
                                    $this->tmpItem->brandId = $brand->id;
                                }
                            }
                            if (TextUtils::createAlias($key) == 'watch-style') {
                                $style = Style::getById(TextUtils::createAlias($value));
                                if ($style != null) {
                                    $this->tmpItem->styleId = $style->id;
                                }
                            }
                            if (TextUtils::createAlias($key) == 'gender') {
                                switch (TextUtils::createAlias($value)) {
                                    case 'men':
                                        $this->tmpItem->gender = Item::GENDER_MALE;
                                        break;
                                    case 'women':
                                        $this->tmpItem->gender = Item::GENDER_FEMALE;
                                        break;
                                    case 'unisex':
                                        $this->tmpItem->gender = Item::GENDER_UNISEX;
                                        break;
                                }
                            }
                        } catch (\Exception $ex) {
                            
                        }
                    });

                    if (!$item->isComplete) {
                        $item->isComplete = true;
                        $i = 0;
                        foreach ($this->tmpImages as $img) {
                            echo "Geting image: {$img}";
                            Image::download($img, Image:: TARGET_ITEM, $item->id, $i);
                            $i++;
                        }
                    }

                    $item->updateTime = time();
                    $item->update(false);
                } catch (\Exception $ex) {
                    echo $ex->getMessage() . "\n";
                }
            }
        } catch (Exception $e) {
            Yii::$app->cache->set('joma_detail_running', 'false');
        }

        Yii::$app->cache->set('joma_detail_running', 'false');
    }

}
