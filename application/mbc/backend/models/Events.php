<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $events_date
 * @property string $events_location
 * @property string $events_prioritylevel
 * @property string $event_desc
 * @property integer $no_of_attendees
 *
 * @property UserHasEvents[] $userHasEvents
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
            [['events_date'], 'safe'],
            [['no_of_attendees'], 'integer'],
            [['events_location'], 'string', 'max' => 100],
            [['events_prioritylevel'], 'string', 'max' => 10],
            [['event_desc'], 'string', 'max' => 255]
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
            'events_prioritylevel' => 'Events Priority Level',
            'event_desc' => 'Event Desccription',
            'no_of_attendees' => 'No of Attendees',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasEvents()
    {
        return $this->hasMany(UserHasEvents::className(), ['events_id' => 'id']);
    }
}
