<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "penumpang".
 *
 * @property int $id
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $umur
 * @property string $no_kendaraan
 * @property string $posisi
 * @property int $jadwal_id
 *
 * @property Jadwal $jadwal
 * @property Jadwal $jadwal0
 */
class Penumpang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penumpang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['umur', 'jadwal_id'], 'integer'],
            [['nama', 'alamat', 'posisi'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 50],
            [['no_kendaraan'], 'string', 'max' => 200],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
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
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'umur' => 'Umur',
            'no_kendaraan' => 'No Kendaraan',
            'posisi' => 'Posisi',
            'jadwal_id' => 'Jadwal ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id' => 'jadwal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal0()
    {
        return $this->hasOne(Jadwal::className(), ['id' => 'jadwal_id']);
    }
}
