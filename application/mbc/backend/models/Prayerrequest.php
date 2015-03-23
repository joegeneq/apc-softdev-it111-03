<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prayerrequest".
 *
 * @property integer $id
 * @property integer $prayerrequest_code
 * @property string $prayerrequest_type
 * @property string $prayerrequest_description
 *
 * @property FilteredPrayerrequest[] $filteredPrayerrequests
 * @property MemberGivesPrayerrequest[] $memberGivesPrayerrequests
 */
class PrayerRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prayerrequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prayerrequest_code'], 'integer'],
            [['prayerrequest_type'], 'string', 'max' => 45],
            [['prayerrequest_description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prayerrequest_code' => 'Prayerrequest Code',
            'prayerrequest_type' => 'Prayerrequest Type',
            'prayerrequest_description' => 'Prayerrequest Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilteredPrayerrequests()
    {
        return $this->hasMany(FilteredPrayerrequest::className(), ['prayerrequest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberGivesPrayerrequests()
    {
        return $this->hasMany(MemberGivesPrayerrequest::className(), ['prayerrequest_id' => 'id']);
    }
}
