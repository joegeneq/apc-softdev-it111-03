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
            [['id'], 'integer'],
            [['prayerrequest_code', 'prayerrequest_type', 'prayerrequest_description'], 'safe'],
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
        ]);

        $query->andFilterWhere(['like', 'prayerrequest_code', $this->prayerrequest_code])
            ->andFilterWhere(['like', 'prayerrequest_type', $this->prayerrequest_type])
            ->andFilterWhere(['like', 'prayerrequest_description', $this->prayerrequest_description]);

        return $dataProvider;
    }
}
