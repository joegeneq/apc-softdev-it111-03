<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Province;

/**
 * CitySearch represents the model behind the search form about `app\models\City`.
 */
class CitySearch extends City
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
<<<<<<< HEAD
            [['city_code', 'province_description', 'province_id'], 'safe'],
=======
            [['city_code', 'city_description', 'province_id'], 'safe'],
>>>>>>> 8df53a651c1914bf9baed69a72817ceedfa02979
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
        $query = City::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith('province');
		
        $query->andFilterWhere([
            'id' => $this->id,

        ]);

        $query->andFilterWhere(['like', 'city_code', $this->city_code])
            ->andFilterWhere(['like', 'city_description', $this->city_description])
			->andFilterWhere(['like', 'province.province_description', $this->province_id]);

        return $dataProvider;
    }
}