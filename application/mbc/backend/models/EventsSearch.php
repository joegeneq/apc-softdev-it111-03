<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Events;

/**
 * EventsSearch represents the model behind the search form about `backend\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_of_attendees'], 'integer'],
            [['events_date', 'events_location', 'events_prioritylevel', 'event_desc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Events::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'events_date' => $this->events_date,
            'no_of_attendees' => $this->no_of_attendees,
        ]);

        $query->andFilterWhere(['like', 'events_location', $this->events_location])
            ->andFilterWhere(['like', 'events_prioritylevel', $this->events_prioritylevel])
            ->andFilterWhere(['like', 'event_desc', $this->event_desc]);

        return $dataProvider;
    }
}
