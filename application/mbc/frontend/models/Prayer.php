<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "prayer".
 *
 * @property integer $id
 * @property string $prayerrequest_code
 * @property string $prayerrequest_type
 * @property string $prayerrequest_description
 *
 * @property UserGivesPrayer[] $userGivesPrayers
 */
class Prayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prayer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prayerrequest_type', 'prayerrequest_description'], 'required'],
            [['prayerrequest_code'], 'string', 'max' => 10],
            [['prayerrequest_type', 'prayerrequest_description'], 'string', 'max' => 45]
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
    public function getUserGivesPrayers()
    {
        return $this->hasMany(UserGivesPrayer::className(), ['prayerrequest_id' => 'id']);
    }
}
