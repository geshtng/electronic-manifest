<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Penumpang;

/**
 * PenumpangSearch represents the model behind the search form of `backend\models\Penumpang`.
 */
class PenumpangSearch extends Penumpang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur', 'jadwal_id'], 'integer'],
            [['nama', 'jenis_kelamin', 'alamat', 'no_kendaraan', 'posisi'], 'safe'],
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
        $query = Penumpang::find();

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
            'umur' => $this->umur,
            'jadwal_id' => $this->jadwal_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_kendaraan', $this->no_kendaraan])
            ->andFilterWhere(['like', 'posisi', $this->posisi]);

        return $dataProvider;
    }

    public function searchByPosisiPenumpang($params, $jadwal_id)
    {
        $query = Penumpang::find()->where(['jadwal_id' => $jadwal_id]);

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
            'umur' => $this->umur,
            'jadwal_id' => $this->jadwal_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_kendaraan', $this->no_kendaraan])
            ->andFilterWhere(['like', 'posisi', $this->posisi])
            ->andFilterWhere(['like', 'posisi', 2]);

        return $dataProvider;
    }

    public function searchByPosisiKru($params, $jadwal_id)
    {
        $query = Penumpang::find()->where(['jadwal_id' => $jadwal_id]);

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
            'umur' => $this->umur,
            'jadwal_id' => $this->jadwal_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_kendaraan', $this->no_kendaraan])
            ->andFilterWhere(['in', 'posisi', [0,1]]);

        return $dataProvider;
    }
}