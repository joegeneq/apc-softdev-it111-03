<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Member;

/**
 * MemberSearch represents the model behind the search form about `app\models\Member`.
 */
class MemberSearch extends Member
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['member_lastname', 'member_firstname', 'member_contactno', 'member_homeadd', 'member_emailadd', 'member_actministry', 'member_attendance', 'membercol'], 'safe'],
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
        $query = Member::find();

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

        $query->andFilterWhere(['like', 'member_lastname', $this->member_lastname])
            ->andFilterWhere(['like', 'member_firstname', $this->member_firstname])
            ->andFilterWhere(['like', 'member_contactno', $this->member_contactno])
            ->andFilterWhere(['like', 'member_homeadd', $this->member_homeadd])
            ->andFilterWhere(['like', 'member_emailadd', $this->member_emailadd])
            ->andFilterWhere(['like', 'member_actministry', $this->member_actministry])
            ->andFilterWhere(['like', 'member_attendance', $this->member_attendance])
            ->andFilterWhere(['like', 'membercol', $this->membercol]);

        return $dataProvider;
    }
}
