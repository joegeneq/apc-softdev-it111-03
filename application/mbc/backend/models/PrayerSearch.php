<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prayer;

/**
 * PrayerSearch represents the model behind the search form about `backend\models\Prayer`.
 */
class PrayerSearch extends Prayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['prayer_desc', 'prayer_type', 'prayer_code', 'prayer_schedule'], 'safe'],
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
        $query = Prayer::find();

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
            'prayer_schedule' => $this->prayer_schedule,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'prayer_desc', $this->prayer_desc])
            ->andFilterWhere(['like', 'prayer_type', $this->prayer_type])
            ->andFilterWhere(['like', 'prayer_code', $this->prayer_code]);

        return $dataProvider;
    }
}
