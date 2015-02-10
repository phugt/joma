<?php

namespace share\models;

use Yii;

/**
 * This is the model class for table "styles".
 *
 * @property string $id
 * @property string $name
 * @property integer $position
 * @property integer $isActive
 */
class Style extends \yii\db\ActiveRecord {

    private static $_all;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'styles';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'position', 'isActive'], 'required'],
            ['id', 'unique'],
            [['position', 'isActive'], 'integer'],
            [['id', 'name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'Mã kiểu',
            'name' => 'Tên kiểu',
            'position' => 'Thứ tự',
            'isActive' => 'Kích hoạt',
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

    public function countItem($counts) {
        foreach ($counts as $c) {
            if ($this->id == $c['styleId']) {
                return $c['styleCount'];
            }
        }
    }

}
