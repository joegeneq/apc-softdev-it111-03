<?php

namespace frontend\models;

use common\models\User;

use Yii;

/**
 * This is the model class for table "prayer".
 *
 * @property integer $id
 * @property string $prayer_desc
 * @property string $prayer_type
 * @property string $prayer_code
 * @property string $prayer_schedule
 * @property integer $user_id
 *
 * @property User $user
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
            [['prayer_code'], 'required'],
            [['prayer_schedule', 'user_id'], 'safe'],
         //   [['user_id'], 'integer'],
            [['prayer_desc'], 'string', 'max' => 100],
            [['prayer_type'], 'string', 'max' => 45],
            [['prayer_code'], 'string', 'max' => 10],
            [['user_id'], 'default', 'value'=> yii::$app->user->identity->id]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Name',
            'prayer_desc' => 'Prayer Description',
            'prayer_type' => 'Prayer Type',
            'prayer_code' => 'Prayer Code',
            'prayer_schedule' => 'Prayer Schedule',
            //'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
