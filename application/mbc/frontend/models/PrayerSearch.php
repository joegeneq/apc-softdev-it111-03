<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prayer;

/**
 * PrayerSearch represents the model behind the search form about `app\models\Prayer`.
 */
class PrayerSearch extends Prayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prayer_code'], 'integer'],
            [['prayer_type', 'prayer_description'], 'safe'],
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
            'prayer_code' => $this->prayer_code,
        ]);

        $query->andFilterWhere(['like', 'prayer_type', $this->prayer_type])
            ->andFilterWhere(['like', 'prayer_description', $this->prayer_description]);

        return $dataProvider;
    }
}
