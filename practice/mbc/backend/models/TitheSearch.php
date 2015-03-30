<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tithe;

/**
 * TitheSearch represents the model behind the search form about `backend\models\Tithe`.
 */
class TitheSearch extends Tithe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tithe_amount'], 'integer'],
            [['tithe_date', 'tithe_envno','user_id'], 'safe'],
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
        $query = Tithe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinwith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'tithe_date' => $this->tithe_date,
            'tithe_amount' => $this->tithe_amount,
            //'user_id' => $this->user_id
        ]);

        $query->andFilterWhere(['like', 'tithe_envno', $this->tithe_envno])
                ->andFilterWhere(['like', 'user.user_name', $this->user_id]);

        return $dataProvider;
    }
}
