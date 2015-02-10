<?php

namespace share\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property integer $gender
 * @property string $phone
 * @property string $address
 * @property integer $provinceId
 * @property integer $districtId
 * @property integer $status
 * @property integer $role
 * @property integer $joinTime
 * @property integer $updateTime
 * @property integer $activeTime
 */
class User extends ActiveRecord implements IdentityInterface {

    const GENDER_UNKNOWN = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 2;
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_STAFF = 2;

    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return [
            [['email', 'name', 'gender', 'phone', 'address', 'provinceId', 'districtId', 'status', 'role'], 'required'],
            ['gender', 'in', 'range' => [self::GENDER_UNKNOWN, self::GENDER_MALE, self::GENDER_FEMALE]],
            ['status', 'in', 'range' => [self::STATUS_INACTIVE, self::STATUS_ACTIVE, self::STATUS_BANNED]],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN, self::ROLE_STAFF]],
            [['gender', 'provinceId', 'districtId', 'status', 'joinTime', 'updateTime', 'activeTime'], 'integer'],
            [['email'], 'string', 'max' => 150],
            ['email', 'email'],
            [['password'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 250]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'name' => 'Tên thật',
            'gender' => 'Giới tính',
            'phone' => 'Điện thoại',
            'address' => 'Địa chỉ',
            'provinceId' => 'Tỉnh / thành',
            'districtId' => 'Quận / huyện',
            'status' => 'Trạng thái',
            'role' => 'Quyền hạn',
            'joinTime' => 'Thời gian đăng ký',
            'updateTime' => 'Thời gian cập nhật',
            'activeTime' => 'Lần cuối hoạt động'
        ];
    }

    public function getAuthKey() {
        return md5($this->password . $this->id);
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function validateAuthKey($authKey) {
        return $authKey == $this->getAuthKey();
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByEmail($email) {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

}
