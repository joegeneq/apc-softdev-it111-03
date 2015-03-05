<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $events_date
 * @property string $events_location
 * @property integer $events_prioritylevel
 * @property integer $no_of_attendees
 *
 * @property MemberHasEvents[] $memberHasEvents
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'events_prioritylevel', 'no_of_attendees'], 'integer'],
            [['events_date'], 'safe'],
            [['events_location'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'events_date' => 'Events Date',
            'events_location' => 'Events Location',
            'events_prioritylevel' => 'Events Prioritylevel',
            'no_of_attendees' => 'No Of Attendees',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberHasEvents()
    {
        return $this->hasMany(MemberHasEvents::className(), ['events_id' => 'id']);
    }
}
