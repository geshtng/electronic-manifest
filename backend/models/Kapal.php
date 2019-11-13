<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kapal".
 *
 * @property int $id
 * @property string $nama
 * @property string $gt
 * @property int $kapasitas
 * @property string $jenis
 *
 * @property Jadwal[] $jadwals
 */
class Kapal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kapal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kapasitas'], 'integer'],
            [['nama', 'gt', 'jenis'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'gt' => 'Gt',
            'kapasitas' => 'Kapasitas',
            'jenis' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['kapal_id' => 'id']);
    }
}
