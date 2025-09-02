<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Attendance;

/**
 * AttendanceSearch represents the model behind the search form of `common\models\Attendance`.
 */
class AttendanceSearch extends Attendance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'training_id', 'fee', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Attendance::find();
//        $query->groupBy('training_id');

//        if (array_key_exists('training_id', $params)) {
//            $query->where(['event_id' => $params['training_id']]);
//        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => \Yii::$app->params['pageSize'],
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'training_id' => $this->training_id,
            'fee' => $this->fee,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id]);
        $query->groupBy('training_id');

        return $dataProvider;
    }
}
