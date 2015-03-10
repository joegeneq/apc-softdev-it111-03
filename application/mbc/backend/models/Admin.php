<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property integer $admin_filterprayer
 * @property string $admin_postprayer
 *
 * @property FilteredPrayerrequest[] $filteredPrayerrequests
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_filterprayer'], 'integer'],
            [['admin_postprayer'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_filterprayer' => 'Admin Filterprayer',
            'admin_postprayer' => 'Admin Postprayer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilteredPrayerrequests()
    {
        return $this->hasMany(FilteredPrayerrequest::className(), ['admin_id' => 'id']);
    }
}
