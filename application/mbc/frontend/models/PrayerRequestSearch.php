<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PrayerRequest;

/**
 * PrayerRequestSearch represents the model behind the search form about `app\models\PrayerRequest`.
 */
class PrayerRequestSearch extends PrayerRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prayerrequest_code'], 'integer'],
            [['prayerrequest_type', 'prayerrequest_description'], 'safe'],
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
        $query = PrayerRequest::find();

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
            'prayerrequest_code' => $this->prayerrequest_code,
        ]);

        $query->andFilterWhere(['like', 'prayerrequest_type', $this->prayerrequest_type])
            ->andFilterWhere(['like', 'prayerrequest_description', $this->prayerrequest_description]);

        return $dataProvider;
    }
}
