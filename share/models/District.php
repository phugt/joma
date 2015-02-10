<?php

namespace share\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $provinceId
 * @property string $name
 * @property integer $position
 */
class District extends ActiveRecord {

    private static $_all;

    public static function tableName() {
        return 'districts';
    }

    public function rules() {
        return [
            [['id', 'provinceId', 'name', 'position'], 'required'],
            [['name'], 'string', 'max' => '25'],
            [['id', 'provinceId', 'position'], 'integer']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'Mã quận / huyện',
            'provinceId' => 'Tỉnh / thành',
            'name' => 'Tên quận / huyện',
            'position' => 'Thứ tự'
        ];
    }

    public static function getAll() {
        if (!isset(self::$_all)) {
            self::$_all = self::find()->orderBy('position')->all();
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

}
