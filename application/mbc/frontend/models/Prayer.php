<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prayer".
 *
 * @property integer $id
 * @property integer $prayer_code
 * @property string $prayer_type
 * @property string $prayer_description
 *
 * @property FilteredPrayer[] $filteredPrayers
 * @property MemberGivesPrayer[] $memberGivesPrayers
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
            [['prayer_code'], 'integer'],
            [['prayer_type'], 'string', 'max' => 45],
            [['prayer_description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prayer_code' => 'Prayer Code',
            'prayer_type' => 'Prayer Type',
            'prayer_description' => 'Prayer Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilteredPrayers()
    {
        return $this->hasMany(FilteredPrayer::className(), ['prayer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberGivesPrayers()
    {
        return $this->hasMany(MemberGivesPrayer::className(), ['prayer_id' => 'id']);
    }
}
