<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kapal;

/**
 * KapalSearch represents the model behind the search form of `backend\models\Kapal`.
 */
class KapalSearch extends Kapal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kapasitas'], 'integer'],
            [['nama', 'gt', 'jenis'], 'safe'],
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
        $query = Kapal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'kapasitas' => $this->kapasitas,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'gt', $this->gt])
            ->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}