<?php

namespace share\models;

use ImboClient\ImboClient;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $targetType
 * @property integer $targetId
 * @property string $imageId
 * @property integer $position
 */
class Image extends \yii\db\ActiveRecord {

    const TARGET_ITEM = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['targetType', 'targetId', 'imageId', 'position'], 'required'],
            [['targetType', 'targetId', 'position'], 'integer'],
            [['imageId'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'targetType' => 'Target Type',
            'targetId' => 'Target ID',
            'imageId' => 'Image ID',
            'position' => 'Position',
        ];
    }

    public static function getByTargets($targetType, $targetIds) {
        return self::find()->andWhere(['targetId' => $targetIds, 'targetType' => $targetType])->all();
    }

    public static function download($url, $targetType, $targetId, $position = 0) {
        $config = [
            'serverUrls' => ['http://image.donghohieu.org/'],
            'publicKey' => 'jomashop',
            'privateKey' => 'fuck@jomashop@s3cr3t',
        ];
        $client = ImboClient::factory($config);
        $resp = $client->addImageFromUrl($url);

        $imageId = $resp['imageIdentifier'];

        $image = new Image();
        $image->imageId = $imageId;
        $image->targetId = $targetId;
        $image->targetType = $targetType;
        $image->position = $position;
        $image->insert(false);
    }

    public static function get($imageId) {
        $config = [
            'serverUrls' => ['http://image.donghohieu.org/'],
            'publicKey' => 'jomashop',
            'privateKey' => 'fuck@jomashop@s3cr3t',
        ];
        $client = ImboClient::factory($config);
        return $client->getImageUrl($imageId);
    }

}
