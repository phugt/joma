<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use share\models\Style;
use share\models\Brand;
use share\models\Item;
use share\models\Image;

class ProductController extends Controller {

    public function actionBrowse($style = null, $brand = null, $gender = null, $from = null, $to = null, $order = null) {
        $style = Style::getById($style);
        $activeBrands = Brand::getByIds(explode('+', $brand));

        $styles = Style::getAll();
        $brands = Brand::getAll();

        $query = Item::find()->where('styleId is not null and brandId is not null')->andWhere(['isComplete' => true, 'isActive' => true]);

        $countQuery = clone($query);
        $styleCounts = $countQuery->select('count(DISTINCT id) as styleCount, styleId')->groupBy('styleId')->asArray()->all();
        $countQuery = clone($query);
        $brandCounts = $countQuery->select('count(DISTINCT id) as brandCount, brandId')->groupBy('brandId')->asArray()->all();

        $items = $query->select('id, name, startPrice, sellPrice, shippingFee')->orderBy('listTime')->limit(30)->all();

        $itemIds = [];
        foreach ($items as $item) {
            $itemIds[] = $item->id;
        }
        $images = Image::getByTargets(Image::TARGET_ITEM, $itemIds);

        return $this->render('browse', [
                    'style' => $style,
                    'activeBrands' => $activeBrands,
                    'styles' => $styles,
                    'brands' => $brands,
                    'styleCounts' => $styleCounts,
                    'brandCounts' => $brandCounts,
                    'items' => $items,
                    'images' => $images
        ]);
    }

}
