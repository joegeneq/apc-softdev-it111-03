<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $city_code
 * @property string $city_description
 * @property integer $Province_id
 * @property integer $Province_Region_id
 *
 * @property Province $province
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Province_id', 'Province_Region_id'], 'required'],
            [['id', 'Province_id', 'Province_Region_id'], 'integer'],
            [['city_code', 'city_description'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_code' => 'City Code',
            'city_description' => 'City Description',
            'Province_id' => 'Province ID',
            'Province_Region_id' => 'Province  Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'Province_id', 'Region_id' => 'Province_Region_id']);
    }
}