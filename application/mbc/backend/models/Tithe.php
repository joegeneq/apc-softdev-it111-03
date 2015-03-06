<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tithe".
 *
 * @property integer $id
 * @property string $tithe_date
 * @property string $tithe_envno
 * @property integer $tithe_amount
 * @property integer $tithe_total
 * @property integer $member_ID
 *
 * @property Member $member
 */
class Tithe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tithe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tithe_date'], 'safe'],
            [['tithe_amount', 'tithe_total', 'member_ID'], 'integer'],
            [['member_ID'], 'required'],
            [['tithe_envno'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tithe_date' => 'Tithe Date',
            'tithe_envno' => 'Tithe Envno',
            'tithe_amount' => 'Tithe Amount',
            'tithe_total' => 'Tithe Total',
            'member_ID' => 'Member  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_ID']);
    }
}
