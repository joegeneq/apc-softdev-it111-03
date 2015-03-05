<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $member_lastname
 * @property string $member_firstname
 * @property string $member_contactno
 * @property string $member_homeadd
 * @property string $member_emailadd
 * @property string $member_actministry
 * @property string $member_attendance
 * @property string $membercol
 *
 * @property MemberGivesPrayerrequest[] $memberGivesPrayerrequests
 * @property MemberHasEvents[] $memberHasEvents
 * @property Tithe[] $tithes
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['member_lastname', 'member_firstname', 'member_contactno', 'member_homeadd', 'member_emailadd', 'member_actministry', 'membercol'], 'string', 'max' => 45],
            [['member_attendance'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_lastname' => 'Member Lastname',
            'member_firstname' => 'Member Firstname',
            'member_contactno' => 'Member Contactno',
            'member_homeadd' => 'Member Homeadd',
            'member_emailadd' => 'Member Emailadd',
            'member_actministry' => 'Member Actministry',
            'member_attendance' => 'Member Attendance',
            'membercol' => 'Membercol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberGivesPrayerrequests()
    {
        return $this->hasMany(MemberGivesPrayerrequest::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberHasEvents()
    {
        return $this->hasMany(MemberHasEvents::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTithes()
    {
        return $this->hasMany(Tithe::className(), ['member_ID' => 'id']);
    }
}
