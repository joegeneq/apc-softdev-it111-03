<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tithe".
 *
 * @property integer $id
 * @property string $tithe_date
 * @property string $tithe_envno
 * @property integer $tithe_amount
 * @property integer $user_id
 *
 * @property User $user
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
            [['tithe_amount', 'user_id'], 'integer'],
            [['user_id'], 'required'],
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
            'user_id' => 'User ID',
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
