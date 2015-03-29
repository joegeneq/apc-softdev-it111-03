<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $user_lastname
 * @property string $user_firstname
 * @property string $user_contactno
 * @property string $user_homeadd
 * @property string $user_actministry
 * @property string $user_attendance
 * @property string $user_type
 *
 * @property MemberGivesPrayerrequest[] $memberGivesPrayerrequests
 * @property MemberHasEvents[] $memberHasEvents
 * @property Tithe[] $tithes
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['user_lastname', 'user_firstname', 'user_contactno', 'user_homeadd', 'user_actministry', 'user_attendance'], 'string', 'max' => 45],
            [['user_type'], 'string', 'max' => 20],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_lastname' => 'User Lastname',
            'user_firstname' => 'User Firstname',
            'user_contactno' => 'User Contactno',
            'user_homeadd' => 'User Homeadd',
            'user_actministry' => 'User Actministry',
            'user_attendance' => 'User Attendance',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberGivesPrayerrequests()
    {
        return $this->hasMany(MemberGivesPrayerrequest::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberHasEvents()
    {
        return $this->hasMany(MemberHasEvents::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTithes()
    {
        return $this->hasMany(Tithe::className(), ['user_id' => 'id']);
    }
}
