<?php

namespace backend\models;

use yii\base\Model;
use share\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends Model {

    const STATUS_ALL = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 2;

    public $email, $phone, $name, $status;

    public function rules() {
        return[
            [['email', 'phone', 'name'], 'string', 'max' => 50],
            ['status', 'in', 'range' => [self::STATUS_ALL, self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_BANNED]]
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'Địa chỉ email',
            'phone' => 'Số điện thoại',
            'name' => 'Họ tên',
            'status' => 'Trạng thái'
        ];
    }

    public function search() {
        $query = User::find();
        if ($this->validate()) {
            if (isset($this->status) && $this->status != -1) {
                $query->andWhere(['status' => $this->status]);
            }
            if (isset($this->email) && $this->email != '') {
                $query->andWhere(['LIKE', 'email', $this->email]);
            }
            if (isset($this->phone) && $this->phone != '') {
                $query->andWhere(['LIKE', 'phone', $this->phone]);
            }
            if (isset($this->name) && $this->name != '') {
                $query->andWhere(['LIKE', 'name', $this->name]);
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'updateTime' => SORT_DESC,
                ]
            ],
        ]);

        return $dataProvider;
    }

}
