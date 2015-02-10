<?php

namespace share\models;

use yii\helpers\Url;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property integer $styleId
 * @property integer $brandId
 * @property integer $gender
 * @property string $name
 * @property string $vnsName
 * @property string $sourceId
 * @property string $sourceUrl
 * @property string $detail
 * @property string $vnsDetail
 * @property double $startPrice
 * @property double $sellPrice
 * @property double $shippingFee
 * @property integer $isAvailable
 * @property string $listTime
 * @property string $updateTime
 * @property integer $isActive
 * @property integer $isComplete
 */
class Item extends \yii\db\ActiveRecord {

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_UNISEX = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['gender', 'listTime', 'updateTime', 'isActive', 'isComplete', 'isAvailable'], 'integer'],
            [['sourceId', 'sourceUrl', 'listTime', 'updateTime', 'isActive', 'isComplete', 'isAvailable'], 'required'],
            [['detail', 'vnsDetail'], 'string'],
            [['startPrice', 'sellPrice', 'shippingFee'], 'number'],
            [['name', 'vnsName'], 'string', 'max' => 150],
            [['styleId', 'brandId', 'sourceId'], 'string', 'max' => 25],
            [['sourceUrl'], 'string', 'max' => 250],
            [['sourceUrl'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'Mã sản phẩm',
            'styleId' => 'Mã kiểu',
            'brandId' => 'Mã thương hiệu',
            'gender' => 'Giới tính',
            'name' => 'Tên sản phẩm',
            'vnsName' => 'Tên tiếng Việt',
            'sourceId' => 'Nguồn',
            'sourceUrl' => 'Link nguồn',
            'detail' => 'Chi tiết',
            'vnsDetail' => 'Chi tiết tiếng Việt',
            'startPrice' => 'Giá gốc',
            'sellPrice' => 'Giá bán',
            'shippingPrice' => 'Phí vận chuyển',
            'isAvailable' => 'Còn hàng',
            'listTime' => 'Thời gian cập nhật list',
            'updateTime' => 'Thời gian cập nhật chi tiết',
            'isActive' => 'Kích hoạt',
            'isComplete' => 'Hoàn chỉnh',
        ];
    }

    public function getThumb($images) {
        if (isset($images)) {
            foreach ($images as $image) {
                if ($this->id == $image->targetId) {
                    return Image::get($image->imageId)->thumbnail(400, 300, 'inset')->canvas(400, 300, 'center')->png()->compress(100);
                }
            }
        }
        return Url::base() . '/img/400x300.jpg';
    }

}
