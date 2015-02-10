<?php

namespace share\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property string $id
 * @property string $name
 * @property integer $isActive
 */
class Brand extends \yii\db\ActiveRecord {

    private static $_all;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'isActive'], 'required'],
            [['isActive'], 'integer'],
            [['id', 'name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'Mã thương hiệu',
            'name' => 'Tên thương hiệu',
            'isActive' => 'Kích hoạt',
        ];
    }

    public static function getAll() {
        if (!isset(self::$_all)) {
            self::$_all = self::find()->all();
        }
        return self::$_all;
    }

    public static function getById($id) {
        foreach (self::getAll() as $item) {
            if ($item->id == $id) {
                return $item;
            }
        }

        return null;
    }

    public static function getByIds($ids) {
        $items = [];
        foreach (self::getAll() as $item) {
            foreach ($ids as $id) {
                if ($item->id == $id) {
                    $items[] = $item;
                }
            }
        }

        return $items;
    }

    public function countItem($counts) {
        foreach ($counts as $c) {
            if ($this->id == $c['brandId']) {
                return $c['brandCount'];
            }
        }
    }

}
