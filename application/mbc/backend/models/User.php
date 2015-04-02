<?php

namespace backend\models;

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
 * @property string $user_name
 * @property string $user_contactno
 * @property string $user_homeadd
 * @property string $user_actministry
 * @property string $user_attendance
 *
 * @property Tithe[] $tithes
 * @property UserGivesPrayer[] $userGivesPrayers
 * @property UserHasEvents[] $userHasEvents
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
            [['username', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['user_name', 'user_contactno', 'user_homeadd', 'user_actministry', 'user_attendance'], 'string', 'max' => 45]
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
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_name' => 'User Complete Name',
            'user_contactno' => 'User Contact Number',
            'user_homeadd' => 'User Home Address',
            'user_actministry' => 'User Actministry',
            'user_attendance' => 'User Attendance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTithes()
    {
        return $this->hasMany(Tithe::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGivesPrayers()
    {
        return $this->hasMany(UserGivesPrayer::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasEvents()
    {
        return $this->hasMany(UserHasEvents::className(), ['user_id' => 'id']);
    }
}
