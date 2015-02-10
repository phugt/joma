<?php

namespace share\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property integer $position
 */
class Province extends ActiveRecord {

    private static $_all;

    public static function tableName() {
        return 'provinces';
    }

    public function rules() {
        return [
            [['id', 'name', 'position'], 'required'],
            [['name'], 'string', 'max' => '25'],
            [['id', 'position'], 'integer']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'Mã tỉnh / thành',
            'name' => 'Tên tỉnh / thành',
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
